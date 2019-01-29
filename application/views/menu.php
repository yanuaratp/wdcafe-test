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
        Menu
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('timeline') ?>"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Menu</li>
    </ol>
	</div>
</section>

<!-- Main content -->
<section class="content">
	
    <div class="box-body">
		<div class="pull-right">
			<?php if($hak == 'admin'){ ?>
			<a href="<?php echo site_url('menu/tambah') ?>" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Data</a>
			<?php } ?>
		</div>
		<table id="menu" class="table table-bordered table-striped">
			<thead>
				<tr class="text-blue">
					<th class="col-sm-0">No</th>
					<th class="col-sm-0">Nama Menu</th>
					<th class="col-sm-2">Jenis</th>
					<th class="col-sm-0">Harga</th>
					<th class="col-sm-0">Status</th>
					<?php if($hak == 'admin'){ ?>
					<th class="col-sm-2">Opsi</th> <?php } ?>
				</tr>
			</thead>
			<tbody>
				<?php
					$no = 1;
					foreach($menu as $u){ 
				?>
						<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $u -> nama_menu ?></td>
						<td><?php echo $u -> jenis ?></td>
						<td><?php echo $u -> harga ?></td>
						<td><?php if($u -> status == 'Kosong'){ ?>
							<font style="Color:Red;"> 
							<?php } else { ?>
							<font style="Color:Green;">
							<?php } echo $u -> status ?></font></td>
						<td><?php if($hak == 'admin'){ ?>
							<?php echo anchor('menu/edit/'.$u->id_menu,'<i class="fa fa-pencil"></i> Edit'); ?> |
							<?php echo anchor('menu/hapus/'.$u->id_menu,'<i class="fa fa-trash"></i> Hapus'); ?> <?php }} ?>
						</td>
					<?php
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
