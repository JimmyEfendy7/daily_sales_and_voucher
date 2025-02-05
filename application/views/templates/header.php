<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daily Sales</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Pemuatan jQuery  -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap CSS dari CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- Custom CSS -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .navbar {
            margin-bottom: 20px;
        }
        /* Overlay untuk voucher */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.6);
            z-index: 9999;
            display: none;
            align-items: center;
            justify-content: center;
        }
        /* Desain Voucher Card */
        .voucher-card {
            background: linear-gradient(135deg,rgb(195, 228, 7),rgb(194, 207, 71));
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            color: #fff;
            min-width: 300px;
            text-align: center;
            animation: fadeInDown 0.5s;
        }
        .voucher-card h2 {
            font-family: 'Courier New', Courier, monospace;
            font-weight: bold;
        }
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Daily Sales</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" 
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
       <li class="nav-item">
           <a class="nav-link" href="<?php echo base_url('home/poin'); ?>">Poin</a>
       </li>
       <li class="nav-item">
           <a class="nav-link" href="<?php echo base_url('home/report'); ?>">Report</a>
       </li>
    </ul>
  </div>
</nav>
<div class="container">
