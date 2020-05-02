<?php
  $breadcrumb = empty($breadcrumb) ? [] : $breadcrumb;

  if(!empty($home) && $home==true){
    $breadcrumb = array_merge(['Home'=>'/'], $breadcrumb);
  }
?>

<ol class="breadcrumb float-sm-right">
  <?php
    foreach ($breadcrumb as $key => $value) {
      if(is_numeric($key)){
        echo '<li class="breadcrumb-item active">'.$value.'</li>';
      }else{
        echo '<li class="breadcrumb-item">'.$this->Html->link($key, $value, ['escape'=>false]).'</li>';
      }
    }
  ?>
</ol>
