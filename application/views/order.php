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
        <li class="active">Pesanan</li>
    </ol>
	</div>
</section>

<!-- Main content -->
<section class="content">
	
    <div class="box-body">
		<div class="pull-right">
		<?php if($hak != 'kasir') { ?>
			<a href="<?php echo site_url('pdfreport/cetakpdf_order') ?>" class="btn btn-primary btn-flat"><i class="fa fa-download"></i> Cetak</a>
			<a href="<?php echo site_url('order/tambah') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Buat Order</a>
		<?php } ?>
		</div>
		<table id="menu" class="table table-bordered table-striped">
			<thead>
				<tr class="text-blue">
					<th class="col-sm-0">No</th>
					<th class="col-sm-0">ID Order</th>
					<th class="col-sm-2">Meja</th>
					<th class="col-sm-0">Pelayan</th>
					<th class="col-sm-0">Status</th>
					<th class="col-sm-2">Detail</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					foreach($order_view as $u){ 
					?>
						<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $u -> id_pesan ?></td>
						<td><?php echo $u -> nomer_meja ?></td>
						<td><?php echo $u -> nama ?></td>
						<td><?php if($u -> status == 'Aktif'){ ?>
							<font style="Color:Red;"> 
							<?php } else { ?>
							<font style="Color:Green;">
							<?php } echo $u -> status ?></font></td>
						<td><?php echo anchor('order/detail/'.$u->id_pesan,'<i class="fa fa-info"></i> Detail Pesanan'	); ?></td>
					<?php
					}
					}
					?>
			</tbody>
		</table>
	</div>
</section><!-- /.content -->


<?php				
$this->load->view('template/js');
$this->load->view('template/foot');
?>