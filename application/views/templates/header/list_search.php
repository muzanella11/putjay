<ul class="search_result">
<?php if($data_result) {?>
  <?php $x = count($data_result);?>
  <?php foreach ($data_result as $key => $value) {?>
    <?php
      if($value->kategori == 1){
        $c = "Accessories";
      }
      elseif($value->kategori == 2){
        $c = "Camera";
      }
      elseif($value->kategori == 3){
        $c = "Computer";
      }
      elseif($value->kategori == 4){
        $c = "Furniture";
      }
      elseif($value->kategori == 5){
        $c = "Laptop";
      }
      elseif($value->kategori == 6){
        $c = "Printer";
      }
      elseif($value->kategori == 7){
        $c = "Smartphone";
      }
      elseif($value->kategori == 8){
        $c = "Smartwatch";
      }
      elseif($value->kategori == 9){
        $c = "Tablet";
      }
      elseif($value->kategori == 10){
        $c = "Tv";
      }
    ?>
      <li>
        <a href="<?php echo site_url('').'category'.'/'.strtolower($c).'/'.'id'.'/'.$value->id_items;?>">
          <img src="<?php if($value->picture){ } else { echo $no_image; }?>" width="40px" height="40px">
          <span><?php echo $value->nama;?></span>
        </a>
      </li>
  <?php } ?>
  <?php if($x >= 5){?>
    <li class="see_more_result">
      <a href="javascript:;">
        <span>Hasil selengkapnya</span>
      </a>
    </li>
  <?php } ?>
<?php } else {?>
  <li class="no_result">
    Tidak ada hasil
  </li>
<?php } ?>
</ul>