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
        <small>Data Menu</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('timeline') ?>"><i class="fa fa-user"></i> Home</a></li>
        <li><a href="<?php echo site_url('menu') ?>"><i class="fa fa-tags"></i> Menu</a></li>
		<li class="active">Edit</li>
    </ol>
	</div>
</section>

<!-- Main content -->
<section class="content">
    <?php foreach($menu as $u){ 
    	
	?>
	<h3 class="box-title margin text-center">Edit Menu</h3>
	<center> <div class="batas"> </div></center>
	<hr/>

	<form class="form-horizontal" action="<?php echo site_url(). '/menu/update'; ?>" role="form" method="post">             
	
	<div class="form-group">
		<label class="col-sm-4 control-label">Nama Menu</label>
			<div class="col-sm-5">
				<input type ="hidden" class="form_control" name="id_menu" placeholder="id" value="<?php echo $u->id_menu ?>">
				<input type="text" class="form-control" name="nama_menu" placeholder="Nama Menu" value="<?php echo $u->nama_menu ?>" required>
			</div>		
	</div>
	
	<div class="form-group">
		<label class="col-sm-4 control-label">Jenis </label>
		<div class="col-sm-5">
			<select name="jenis" class="form-control" required>
				<option value="<?php echo $u->jenis ?>"><?php echo $u->jenis ?></option>
				<?php if($u->jenis == 'Makanan'){ ?>
					<option value="Minuman">Minuman</option>
				<?php } else if($u->jenis == 'Minuman') { ?>
					<option value="Makanan">Makanan</option>
				<?php } ?>
			</select>
		</div>
	</div>
	
	<div class="form-group">		
		<label class="col-sm-4 control-label">Harga</label>
		<div class="col-sm-5">			
			<input type="number" class="form-control" name="harga" placeholder="Harga" value="<?php echo $u->harga ?>" required>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-4 control-label">Status </label>
		<div class="col-sm-5">
			<select name="status" class="form-control" required>
				<option value="<?php echo $u->status ?>"><?php echo $u->status ?></option>
				<?php if($u->status == 'Ready'){ ?>
					<option value="Kosong">Kosong</option>
				<?php } else if($u->status == 'Kosong') { ?>
					<option value="Ready">Ready</option>
				<?php } ?>
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
	<?php } ?>
</section><!-- /.content -->


<?php
$this->load->view('template/js');
$this->load->view('template/foot');
?>
