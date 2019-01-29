<?php
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="header">
	<h1>
        Ubah
        <small>Data Admin</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('timeline') ?>"><i class="fa fa-user"></i> Home</a></li>
        <li><a href="<?php echo site_url('user') ?>"><i class="fa fa-user"></i> Admin</a></li>
		<li class="active">Edit</li>
    </ol>
	</div>
</section>

<!-- Main content -->
<section class="content">
    <?php foreach($admin as $u){ 
    	
	?>
	<h3 class="box-title margin text-center">Edit User</h3>
	<center> <div class="batas"> </div></center>
	<hr/>

	<form class="form-horizontal" action="<?php echo site_url(). '/user/update'; ?>" role="form" method="post">             
	
	<div class="form-group">
		<label class="col-sm-4 control-label">Nama</label>
			<div class="col-sm-5">
				<input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $u->nama ?>" required>
			</div>		
	</div>
	
	<div class="form-group">		
		<label class="col-sm-4 control-label">Username</label>
		<div class="col-sm-5">
			<input type ="hidden" class="form_control" name="idadmin" placeholder="id" value="<?php echo $u->idadmin ?>">
			
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
			<select name="privileges" class="form-control" required>
				<option value="<?php echo $u->privileges ?>"><?php echo $u->privileges ?></option>
				<?php if($u->privileges == 'admin'){ ?>
					<option value="kasir">kasir</option>
					<option value="pelayan">pelayan</option>
				<?php } else if($u->privileges == 'kasir') { ?>
					<option value="admin">admin</option>
					<option value="pelayan">pelayan</option>
				<?php } else { ?>
					<option value="admin">admin</option>
					<option value="kasir">kasir</option> <?php } ?>
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
	<?php } ?>
</section><!-- /.content -->


<?php
$this->load->view('template/js');
$this->load->view('template/foot');
?>
