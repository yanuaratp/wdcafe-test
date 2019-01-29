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
    <?php foreach($admin as $u){ if($u->idadmin == $idadmin){ ?>
	
	<div class="row"><h2 class="col-lg-6 margin text-right ">Profile</h2></div>
	<center> <div class="batas"> </div></center>
	<hr/>
	<form class="form-horizontal" action="#" role="form" method="post">             
	<div class="form-group">
	<div class="col-sm-5 control-label"> <img src="<?php echo base_url('gambar/'.$u->foto) ?>" class="img-circle" alt="User Image" width="160"/><br>
		<label class="col-sm-13 control-label"> <?php echo anchor('profile/edit/'.$u->idadmin,'Edit Profile'); ?> | <a href="<?php echo site_url('upload') ?>">Upload Foto</a> </label><br>
	</div>
	<div class="col-sm-5"><br><br>
		<label class="col-sm-2">Username</label>
		<label class="col-sm-5">: <?php echo $u->username ?> </label><br><br>

		<label class="col-sm-2">Nama</label>
		<label class="col-sm-5">: <?php echo $u->nama ?> </label><br><br>

		<label class="col-sm-2">Privileges</label>
		<label class="col-sm-5">: <?php echo $u->privileges ?> </label>
	</div>
	</div>
	
	</form> 
	
	<?php } }?>
</section><!-- /.content -->
<?php } ?>

<?php
$this->load->view('template/js');
$this->load->view('template/foot');
?>