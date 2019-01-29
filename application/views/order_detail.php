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
    	$hak = $row['privileges'];
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="header">
	<h1>
        Pesanan
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('timeline') ?>"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="<?php echo site_url('order') ?>"><i class="fa fa-shopping-cart"></i> Order</a></li>
		<li class="active">Edit</li>
    </ol>
	</div>
</section>

<!-- Main content -->
<section class="content">
<?php
	foreach($order_view as $u){ 
?>
	<div class="form-group">
		<label class="col-sm-1 control-label">Nomor Meja</label>		
		<label class="col-sm-1 control-label">: <?php echo $u -> nomer_meja ?></label>
	</div><br>
	<div class="form-group">
		<label class="col-sm-1 control-label">Status</label>		
		<label class="col-sm-1 control-label">: <?php echo $u -> status ?></label>
	</div><br>
	<div class="form-group">
		<label class="col-sm-1 control-label">Pelayan</label>		
		<label class="col-sm-1 control-label">: <?php echo $u -> nama ?></label>
	</div>
<?php
		break;
	}
?>
	
    <div class="box-body">
		<table id="menu" class="table table-bordered table-striped">
			<thead>
				<tr class="text-blue">
					<th class="col-sm-0">No</th>
					<th class="col-sm-0">Menu</th>
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
						<td><?php echo $no++; ?></td>
						<td><?php echo $u -> nama_menu ?></td>
						<td><?php echo $u -> jumlah_pesan ?></td>
						<td><?php echo $u -> keterangan ?></td>
					<?php
					}
					?><div class="pull-right">
					<?php if($u -> status == 'Aktif'){ if($hak != 'pelayan'){?>
					<a href="<?php echo site_url('order/bayar/'.$u->id_pesan) ?>" class="btn btn-primary btn-flat"><i class="fa fa-dollar"></i> Bayar</a> <?php } ?>
					<a href="<?php echo site_url('order/edit/'.$u->id_pesan) ?>" class="btn btn-primary btn-flat"><i class="fa fa-edit"></i> Edit</a>
					</div>
	<?php }}
					?>
			</tbody>
		</table>
	</div>
</section><!-- /.content -->


<?php				
$this->load->view('template/js');
$this->load->view('template/foot');
?>