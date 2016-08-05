<h2 class="sub-header">Report User</h2>
<div class="table-responsive">
<?php 
if($alluser){	
?>
<table class="table table-striped">
  <thead>
	<tr>
	  <th>Nama</th>
	  <th>Email</th>
	  <th>Username</th>
	  <th>Password</th>
	  <th>Tanggal Bergabung</th>
	</tr>
  </thead>
  <tbody>
  <?php 
	foreach($alluser as $key => $value){
  ?>
	<tr>
	  <td><?php echo $value->nama;?></td>
	  <td>
		<?php
			echo $value->email;
		?>
	  </td>
	  <td><?php echo $value->username;?></td>
	  <td><?php echo $value->password;?></td>
	  <td><?php echo $value->date_join;?></td>
	</tr>
  <?php } ?>
	
  </tbody>
</table>
<?php } else { ?>
Tidak ada data
<?php } ?>

</div>