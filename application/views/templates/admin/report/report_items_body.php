<h2 class="sub-header">Report Items</h2>
<div class="table-responsive">
<?php 
if($allitems){	
?>
<table class="table table-striped">
  <thead>
	<tr>
	  <th>Nama Items</th>
	  <th>Kategori</th>
	  <th>Harga</th>
	  <th>Deskripsi</th>
	  <th>Tanggal</th>
	  <th>Actions</th>
	</tr>
  </thead>
  <tbody>
  <?php 
	foreach($allitems as $key => $value){
  ?>
	<tr>
	  <td><?php echo $value->nama;?></td>
	  <td>
		<?php
			if($value->kategori == 1){
				echo "Accessories";
			}
			elseif($value->kategori == 2){
				echo "Camera";
			}
			elseif($value->kategori == 3){
				echo "Computer";
			}
			elseif($value->kategori == 4){
				echo "Furniture";
			}
			elseif($value->kategori == 5){
				echo "Laptop";
			}
			elseif($value->kategori == 6){
				echo "Printer";
			}
			elseif($value->kategori == 7){
				echo "Smartphone";
			}
			elseif($value->kategori == 8){
				echo "Smartwatch";
			}
			elseif($value->kategori == 9){
				echo "Tablet";
			}
			elseif($value->kategori == 10){
				echo "Tv";
			}
		?>
	  </td>
	  <td><?php echo "Rp.".$value->harga;?></td>
	  <td><?php echo $value->deskripsi;?></td>
	  <td><?php echo $value->date_create;?></td>
	  <td>
		<a href="<?php echo site_url('apps/edit/items/id/'.$value->id_items.'');?>" class="btn btn-warning">Edit</a>
		<a href="<?php echo site_url('apps/delete/items/id/'.$value->id_items.'');?>" class="btn btn-danger">Delete</a>
	  </td>
	</tr>
  <?php } ?>
	
  </tbody>
</table>
<?php } else { ?>
Tidak ada data
<?php } ?>

</div>