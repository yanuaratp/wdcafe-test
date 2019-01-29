<?php
$this->load->view('template/head');
$this->load->view('template/topbar');
$this->load->view('template/sidebar');
error_reporting(E_ALL ^ E_DEPRECATED);
$user1 = $_SESSION['nama'];
include "template/koneksi.php";
$query = mysql_query("SELECT * from admin where username = '$user1'");
                
if($query === FALSE) { 
die(mysql_error()); // TODO: better error handling
}

                while($row = mysql_fetch_array($query))
                { 
                    $foto = $row['foto'];
                    $idadmin = $row['idadmin'];

?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="header">
	<h1>
        Profile
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('timeline') ?>"><i class="fa fa-user-Home"></i> Home</a></li>
        <li class="active">Profile</li>
    </ol>
	</div>
</section>

<!-- Main content -->
<section class="content">
    <div class="row"><h2 class="col-lg-1 margin text-right">Profile</h2></div>
	<center> <div class="batas"> </div></center>
	            
	<!--<div class="row">
		<center>
			<img src="<?php echo base_url('gambar/'.$foto) ?>" class="img-circle" alt="User Image"/><br>
			<?php } ?>
			<?php echo form_open_multipart('upload/aksi_upload'); ?>
				<div class="col-sm-12 control-label"> <input type="file" name="berkas" /> <br>
				<input type="submit" value="Upload" /></div>
			</form> 
		</center>		
	</div>-->
	<!--<form class="form-horizontal" action="<?php echo form_open_multipart('upload/aksi_upload'); ?>" role="form" method="post">-->
	
	
	<?php echo form_open_multipart('upload/aksi_upload'); ?>
	<div class="form-group">
	<div class="col-sm-8">
	<div class="col-sm-3"><input type="hidden" name="idadmin" value="<?php echo $idadmin; ?>"><br>
	 <img src="<?php echo base_url('gambar/'.$foto) ?>" class="img-circle" alt="User Image" width="160"/><br><br><br>
	</div>
	<div class="col-sm-5">
		<br><br><input type="file" name="berkas"/><br>
	</div>
	<div class="col-sm-5">
		<input type="submit" value="Upload"/>
	</div>
	</div></div>
	</form>
	
	
</section><!-- /.content -->


<?php
$this->load->view('template/js');
$this->load->view('template/foot');
?>