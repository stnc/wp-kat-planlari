  https://www.pngtosvg.com/ -->
  https://code-boxx.com/drag-drop-sortable-list-javascript/#sec-download -->
  https://github.com/eyeofchaos/eocjsNewsticker -->
 https://www.freecodecamp.org/news/use-svg-images-in-css-html/ -->

 https://xd.adobe.com/view/8af0288c-7757-49d4-9de4-0439f021d723-dfa3/ -->
https://stackoverflow.com/questions/29991284/php-get-svg-tag-from-svg-file-and-show-it-in-html-in-div -->





<?php 

global $wpdb;
        $sql = "SELECT * FROM wp_stnc_floor ";
        $results = $wpdb->get_results($sql);
        $i=0;  
        $top=88;  
     foreach( $results as $key =>$result ):
$data=  str_replace([" ", '\\'], null, $result->location);
$position=  json_decode( $data, true, JSON_UNESCAPED_SLASHES);
?>

            
          
          

            <div style="bottom: <?php  echo  $position["bottom"]!="" ? $position["bottom"] : '0'; ?>px;
              left:  <?php  echo  $position["left"]!="" ? $position["left"] : '0'; ?>px;
              right:  <?php  echo  $position["right"]!="" ? $position["right"] : '0'; ?>px;
            top:  <?php  echo  $position["top"]!="" ? $position["top"] : '0'; ?>px;
            " id="ex-<?php  echo $result->name;?>-draggable" data-bs-toggle="tooltip"  class="draggable">eleman <?php  echo $result->name;?></div>



        <?php  endforeach ?>