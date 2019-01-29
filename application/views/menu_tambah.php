<?php
$this->load->view('template/head');
error_reporting(E_ALL ^ E_DEPRECATED);
                
                include "template/koneksi.php";
                $query = mysql_query("SELECT * from admin");
                
                if($query === FALSE) { 
                    die(mysql_error()); // TODO: better error handling
                }
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
                
?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="header">
	<h1>
        Tambah Menu
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('timeline') ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="<?php echo site_url('menu') ?>"><i class="fa fa-tags"></i> Menu</a></li>
		<li class="active">Tambah</li>
    </ol>
	</div>
</section>

<!-- Main content -->
<section class="content">
	<h3 class="box-title margin text-center">Tambah Data Menu</h3>
	<center> <div class="batas"> </div></center>
	<hr/>

	<form class="form-horizontal" action="<?php echo site_url(). '/menu/tambah_aksi'; ?>" role="form" method="post">             
	<div class="form-group">
		<label class="col-sm-4 control-label">Nama Menu</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="nama_menu" placeholder="Nama Menu" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Jenis Menu</label>
		<div class="col-sm-5">
			<select name="jenis" class="form-control" required>
				<option value="">Makanan / Minuman</option>
				<option value="Makanan">Makanan</option>
				<option value="Minuman">Minuman</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Harga</label>
		<div class="col-sm-5">
			<input type="number" class="form-control" name="harga" placeholder="Harga" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Status</label>
		<div class="col-sm-5">
			<select name="status" class="form-control" required>
				<option value="">Ready / Kosong</option>
				<option value="Ready">Ready</option>
				<option value="Kosong">Kosong</option>
			</select>
		</div>
	</div>
	
	  
	  <div class="form-group">
		<label class="col-sm-4 control-label">  </label>
		<div class="col-sm-5">
			<button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
			<a href="<?php echo site_url('menu') ?>" class="btn btn-danger btn-block btn-flat">Cancel</a>
		</div>
	  </div> 
	</form>
</section><!-- /.content -->


<?php
$this->load->view('template/js');
$this->load->view('template/foot');
?>
