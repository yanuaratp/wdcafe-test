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
?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="header">
	<h1>
        Ubah Order
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('timeline') ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="<?php echo site_url('order') ?>"><i class="fa fa-shopping-cart"></i> Order</a></li>
		<li class="active">Ubah</li>
    </ol>
	</div>
</section>

<!-- Main content -->
<section class="content">
	<h3 class="box-title margin text-center">Ubah Pesanan</h3>
	<center> <div class="batas"> </div></center>
	<hr/>

	<form class="form-horizontal" action="<?php echo site_url(). '/order/update'; ?>" role="form" method="post">             
	<div class="form-group">
		<label class="col-sm-4 control-label">Nomor Meja</label>
		<div class="col-sm-5">
		<?php foreach($order_view as $u){ ?>
			<input type="number" class="form-control" name="nomer_meja" placeholder="Nomer Meja" min="1" max="10" value = "<?php echo $u -> nomer_meja ?>" required>
			<input type="hidden" class="form-control" name="id_pesan" placeholder="Nomer Meja" min="1" max="10" value = "<?php echo $u -> id_pesan ?>" required>
		<?php break;
		} ?>
		</div>
	</div>
	
	<table id="menu" class="table table-bordered table-striped">
			<thead>
				<tr class="text-blue">
					<th class="col-sm-0">No</th>
					<th class="col-sm-0">Nama Menu</th>
					<th class="col-sm-0">Harga Satuan</th>
					<th class="col-sm-2">Jumlah</th>
					<th class="col-sm-0">Keterangan</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					foreach($order_view as $u){ 
				?>
						<tr>
						<td><?php echo $no++; ?>
						<input type="hidden" class="form-control" name="id_menu[]" placeholder="Id Admin" value="<?php echo $u -> id_menu; ?>" required></td>
						<td><?php echo $u -> nama_menu ?></td>
						<td><?php echo $u -> harga ?></td>
						<td><input type="number" class="form-control" name="jumlah[]" placeholder="Jumlah" value="<?php echo $u -> jumlah_pesan; ?>" min="0" required></td>
						<td><input type="text" class="form-control" name="keterangan[]" placeholder="Keterangan" value="<?php echo $u -> keterangan; ?>"></td>
					<?php
					}
					?>
			</tbody>
		</table>
	  
	  <div class="form-group">
		<label class="col-sm-4 control-label">  </label>
		<div class="col-sm-5">
			<button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
			<a href="<?php echo site_url('order') ?>" class="btn btn-danger btn-block btn-flat">Cancel</a>
		</div>
	  </div> 
	</form>
	<?php } ?>
</section><!-- /.content -->


<?php
$this->load->view('template/js');
$this->load->view('template/foot');
?>
