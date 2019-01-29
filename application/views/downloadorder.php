<?php 
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
		$nama = $row['nama'];
?>
<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<!--Import materialize.css-->
<link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<!--Let browser know website is optimized for mobile-->
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

<div class="box-body mdl-cell--12-col">

    <h1 class="mdl-cell mdl-cell--12-col">LAPORAN ORDER</h1>
	
	<div class="form-group">
		<label class="col-sm-1 control-label">ID Pegawai</label>		
		<label class="col-sm-1 control-label">: <?php echo $idadmin ?></label>
	</div><br>
	<div class="form-group">
		<label class="col-sm-1 control-label">Nama Pegawai</label>		
		<label class="col-sm-1 control-label">: <?php echo $nama ?></label>
	</div><br>
	

    <div class="mdl-cell--12-col panel panel-default ">
        <div class="panel-body">
         
            <table width="100%"  class="table table-condensed" border ="1" border-collapse="collapse">
                <thead>

                    <tr>   
                        <th data-field="no">No</th>
                        <th data-field="id_pesan">ID Order</th>
                        <th data-field="Menu">Menu</th>
						<th data-field="Jumlah">Jumlah</th>
                        <th data-field="status">Status</th>
                    </tr>    
                </thead>
                <tbody>

                    <?php
					$no = 1;
                    foreach ($order_view->result() as $u) {
                       if($u -> nama == $nama ){
                        ?>
                        <tr><td><?php echo $no++; ?></td>
                            <td><?php echo $u->id_pesan; ?></td>
                            <td><?php echo $u->nama_menu; ?></td>
							<td><?php echo $u->jumlah_pesan; ?></td>
                           <td><?php echo $u->status; ?></td>
                        </tr>

					   <?php }}} ?> 
                </tbody>
            </table>
        </div></div>
</div>  

<div class="box-footer clearfix">
    
</div>
</div>    

<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</body>