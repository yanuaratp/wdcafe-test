<?php
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="header">
	<h1>
        Profile
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard1') ?>"><i class="fa fa-id-Home"></i> Home</a></li>
        <li><a href="<?php echo site_url('profile') ?>"><i class="fa fa-id-Secret"></i> Profile</a></li>
		<li class="active">Edit</li>
    </ol>
	</div>
</section>

<!-- Main content -->
<section class="content">
    <?php foreach($admin as $u){ 
    	
	?>
	<h3 class="box-title margin text-center">Edit Profile</h3>
	<center> <div class="batas"> </div></center>
	<hr/>

	<form class="form-horizontal" action="<?php echo site_url(). '/profile/update'; ?>" role="form" method="post">             
	<div class="form-group">
		<label class="col-sm-4 control-label">Nama </label>
		<div class="col-sm-5">
			<input type="hidden" class="form-control" name="idadmin" value="<?php echo $u->idadmin ?>" readonly>
			<input type="text" class="form-control" name="nama" value="<?php echo $u->nama ?>" required>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-4 control-label">Username</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $u->username ?>" required>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-4 control-label">Password</label>
		<div class="col-sm-5">
			<input type="password" class="form-control" name="password" placeholder="Password" value="<?php echo $u->password ?>" required>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-4 control-label">Privileges </label>
		<div class="col-sm-5">
			<select name="privileges" class="form-control" readonly>
				<option value="<?php echo $u->privileges ?>"><?php echo $u->privileges ?></option>
			</select>
		</div>
	</div>	
	  
	  <div class="form-group">
		<label class="col-sm-4 control-label">  </label>
		<div class="col-sm-5">
			<button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
			<a href="<?php echo site_url('profile') ?>" class="btn btn-danger btn-block btn-flat">Cancel</a>
		</div>
	  </div> 
	</form> 
	<?php } ?>
</section><!-- /.content -->


<?php
$this->load->view('template/js');
$this->load->view('template/foot');
?>