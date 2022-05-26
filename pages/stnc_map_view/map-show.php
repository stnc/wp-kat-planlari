<?php
//get event trıgger 
//page=stnc_map_view & st_trigger === 'show'  
?>

<?php include("header-show.php") ?>

<main class="flex-shrink-0" style="margin-top:88px">


    <div class="container-fluid">

        <div class="row">

            <h3><?php echo $binaName ?> / <?php echo $kat_adi ?></h3>
            <div class="col-lg-9">


                <div id="ex-040-stage" class="stage-m stage-m-size">


                    <div id="ex-040-wall1">


                    <img src="<?php
                            
                             $scheme_media_id  = $map->scheme_media_id;
    
                            $scheme_media_id = wp_get_attachment_image_src(    $scheme_media_id  ,'full' );
                         
                            echo $scheme_media_id[0]; ?> " alt="">

                        <?php


                          
                            foreach ($results as $key => $result) :

                                $image="";
                              
                                if (  $result->media_id==""){
                                    $media_id = wp_get_attachment_image_src(    $result->media_id  ,'thumb' );
                                    $image="<img src=''.$media_id[0].'' width='175'>";
                                }
                            
                                $data =  str_replace([" ", '\\'], null, $result->map_location);
                                $position =  json_decode($data, true, JSON_UNESCAPED_SLASHES);
                            ?>

                        <div data-toggle="tooltip" data-placement="left"
                            style="left:<?php echo  $position["left"] != "" ? $position["left"] - 12 : '0'; ?>px; top:  <?php echo  $position["top"] != "" ? $position["top"] - 116 : '0'; ?>px;" title="<h4 class='fer'> <?php echo $result->company_name?> </h4> <br> <span><?php echo $result->phone?></span> <?php echo $result->email?> <br><?php echo $result->company_description?><br>   <?php echo $image?>" data-bs-html="true"
                            id="ex-<?php echo $result->door_number; ?>-draggable" data-bs-toggle="tooltip"
                            class="dragAbsolute">
                            <span class="dragAbsoluteSpan1"><?php echo $result->door_number; ?></span>
                            <span class="dragAbsoluteSpan2"><?php echo $result->square_meters; ?> m2</span>

                        </div>



                        <?php endforeach ?>
                    </div>
                </div>
            </div><!-- /.col-lg-2 -->

            <div class="col-lg-3">
                <span class="badge bg-secondary">Firma Listesi</span>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <!-- <th scope="col">#</th> -->
                            <th scope="col">Kapı No</th>
                            <th scope="col">Firma</th>
                     
                            <th scope="col">Olay</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                              foreach ($results as $key => $result) :
                                $key++;
                                   $data =  str_replace([" ", '\\'], null, $result->map_location);
                                   $position =  json_decode($data, true, JSON_UNESCAPED_SLASHES);
                            ?>

                        <tr>
                         
                            <td><?php echo $result->door_number; ?></td>
                            <td><?php echo $result->company_name; ?></td>
                           
                            <td><a
                                    href="/wp-admin/admin.php?page=stnc_map_company&st_trigger=show&binaid=<?php echo $binaId?>&kat=<?php echo $katId?>&id=<?php echo $result->id; ?>">Düzenle</a>
                            </td>
                        </tr>



                        <?php  $key++; endforeach ?>

                    </tbody>
                </table>

            </div><!-- /.col-lg-3 -->


        </div>


    </div>


</main>

<script>
jQuery(document).ready(function($) {
    $('[data-toggle="tooltip"]').tooltip()
})
</script>