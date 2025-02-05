<div class="row">
    <div class="col-md-12">
        <h2 class="mb-4">Laporan Penjualan Harian</h2>
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th>No Invoice</th>
                    <th>Tanggal Invoice</th>
                    <th>Nama Customer</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($sales)): ?>
                    <?php foreach($sales as $sale): ?>
                    <tr>
                        <td><?php echo $sale->invoiceno; ?></td>
                        <td><?php echo date('d-m-Y H:i', strtotime($sale->invoicedate)); ?></td>
                        <td><?php echo $sale->fullname; ?></td>
                        <td>
                            <?php 
                                if($sale->status == 1) {
                                    echo '<span class="badge badge-success">Lunas</span>';
                                } else {
                                    echo '<span class="badge badge-warning">Belum Lunas</span>';
                                }
                            ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data penjualan hari ini.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
