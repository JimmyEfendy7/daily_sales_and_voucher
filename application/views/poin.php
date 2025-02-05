<div class="row">
    <div class="col-md-12">
        <h2 class="mb-4">Data Customer dan Poin</h2>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Poin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($customers as $customer): ?>
                <tr>
                    <td><?php echo $customer->id; ?></td>
                    <td><?php echo $customer->fullname; ?></td>
                    <td><?php echo $customer->point; ?></td>
                    <td>
                        <?php if($customer->point >= 500000): ?>
                            <button class="btn btn-success btn-generate" data-id="<?php echo $customer->id; ?>">
                                <i class="fas fa-ticket-alt"></i> Generate Voucher
                            </button>
                        <?php else: ?>
                            <button class="btn btn-secondary" disabled>
                                <i class="fas fa-ticket-alt"></i> Generate Voucher
                            </button>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Voucher Overlay -->
<div class="overlay" id="voucherOverlay">
    <div class="voucher-card">
        <h4>Selamat!</h4>
        <p>Kode Voucher Anda:</p>
        <h2 id="voucherCode"></h2>
        <p class="small">Klik di mana saja untuk menutup voucher ini.</p>
    </div>
</div>

<!-- Skrip khusus halaman Poin -->
<script>
$(document).ready(function(){
    $('.btn-generate').on('click', function(e){
        e.preventDefault();
        var customerId = $(this).data('id');
        console.log("Generate voucher untuk customer ID: " + customerId);
        $.ajax({
            url: '<?php echo base_url("home/generate_voucher/"); ?>' + customerId,
            type: 'GET',
            dataType: 'json',
            success: function(response){
                console.log("Response AJAX:", response);
                if(response.success){
                    $('#voucherCode').text(response.voucher);
                    $('#voucherOverlay').fadeIn();
                } else {
                    alert(response.message);
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                console.error("AJAX error:", textStatus, errorThrown);
                alert('Terjadi kesalahan. Silahkan coba lagi.');
            }
        });
    });
    
    // Tutup overlay ketika klik di mana saja pada overlay
    $('#voucherOverlay').on('click', function(){
         $(this).fadeOut();
    });
});
</script>
