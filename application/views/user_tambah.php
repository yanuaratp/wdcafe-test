<?php
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
error_reporting(E_ALL ^ E_DEPRECATED);
                
	include "template/koneksi.php";
	$query = mysql_query("SELECT * from admin");
	
	if($query === FALSE) { 
		die(mysql_error()); // TODO: better error handling
	}
	$user1 = $_SESSION['nama'];
	$query2 = mysql_query("SELECT * from admin where username = '$user1'");
                
    if($query2 === FALSE) { 
        die(mysql_error()); // TODO: better error handling
    }

    while($row = mysql_fetch_array($query2))
    { 
    	$hak = $row['privileges'];
			if($hak == 'admin'){
?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="header">
	<h1>
        Tambah Admin
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('timeline') ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="<?php echo site_url('user') ?>"><i class="fa fa-user"></i> Admin</a></li>
		<li class="active">Tambah</li>
    </ol>
	</div>
</section>

<!-- Main content -->
<section class="content">
	<h3 class="box-title margin text-center">Tambah Data Admin</h3>
	<center> <div class="batas"> </div></center>
	<hr/>

	<form class="form-horizontal" action="<?php echo site_url(). '/user/tambah_aksi'; ?>" role="form" method="post">             
	<div class="form-group">
		<label class="col-sm-4 control-label">Nama </label>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="nama" placeholder="Nama" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Username</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="username" placeholder="Username" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Password</label>
		<div class="col-sm-5">
			<input type="password" class="form-control" name="password" placeholder="Password" required>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-4 control-label">Privileges </label>
		<div class="col-sm-5">
			<select name="privileges" class="form-control" required>
				<option value="">Pilih Hak Akses</option>
				<option value="admin">admin</option>
				<option value="kasir">kasir</option>
				<option value="pelayan">pelayan</option>
			</select>
		</div>
	</div>
	
	  
	  <div class="form-group">
		<label class="col-sm-4 control-label">  </label>
		<div class="col-sm-5">
			<button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
			<a href="<?php echo site_url('user') ?>" class="btn btn-danger btn-block btn-flat">Cancel</a>
		</div>
	  </div> 
	</form>
</section><!-- /.content -->
			<?php }} ?>

<?php
$this->load->view('template/js');
$this->load->view('template/foot');
?>
