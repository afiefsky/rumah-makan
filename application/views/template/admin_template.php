<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Rumah Makan</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar-static-top.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="bg-info">

    <!-- Static navbar -->
    <div class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">RUMAH MAKAN</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><?php echo anchor('pegawai', 'Data Pegawai');?></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pembelian <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?php echo anchor('kategori', 'Kategori Belanja');?></li>
                <li><?php echo anchor('barang', 'Perhitungan Belanja');?></li>
                <li><?php echo anchor('pembelian', 'Transaksi Pembelian');?></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Penjualan <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><?php echo anchor('subkategori', 'Kategori Menu');?></li>
                <li><?php echo anchor('menu/index', 'Data Menu');?></li>
                <li><?php echo anchor('penjualan/index', 'Transaksi');?></li>
              </ul>
            </li>
            <li><?php echo anchor('laba', 'Manajemen Laba');?></li>
            
            <!-- <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Laporan <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><?php echo anchor('transaksi/laporan', 'Laporan Transaksi');?></li>
              </ul>
            </li> -->
          </ul>
          <ul class="nav navbar-nav navbar-right">
              <li class="acttive"><?php echo anchor('auth/logout', 'Logout');?></li></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>


    <div class="container">

        <?php echo $contents;?>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url ()?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url ()?>assets/js/bootstrap.min.js"></script>
  </body>
</html>
