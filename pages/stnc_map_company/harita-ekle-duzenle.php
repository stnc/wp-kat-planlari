<?php
session_start();
$binaId=$_GET['binaid'];
$katId=$_GET['kat'];

    $wp_stnc_map_floors =$wpdb->prefix . 'stnc_map_floors';
    $wp_stnc_map_building =$wpdb->prefix . 'stnc_map_building';
   
$map = $wpdb->get_row($wpdb->prepare("SELECT bina.name AS bina,kat.name kat_adi,kat.tekno_id,kat.scheme,bina.id
 AS bina_id,kat.id AS katid  FROM ".   $wp_stnc_map_floors." AS kat INNER JOIN ".$wp_stnc_map_building."  AS bina  ON  bina.id=%d AND kat.id = %d", $binaId,$katId));
        //    print_r( $thepost );
        //   $door_number = isset($_POST["door_number"]) ? sanitize_text_field($_POST["door_number"]) : "0";
         $scheme = $map->scheme;
    
         $binaName = $map->bina;
    
         $kat_adi = $map->kat_adi;

      
         $title ="Ekleme";
         $form = '<form action="/wp-admin/admin.php?page=stnc_map_company&st_trigger=add_save&binaid='. $_GET['binaid'] .'&kat='. $_GET['kat'] .'" method="post">';

         if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'show')) {
            $title ="Düzenleme";
            $form = '<form action="/wp-admin/admin.php?page=stnc_map_company&st_trigger=update&binaid='. $_GET['binaid'] .'&kat='. $_GET['kat'] .'&id='. $_GET['id'] .'" method="post">';
         }

?>

<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-secondary fixed-top bg-secondary">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/wp-admin">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/wp-admin/admin.php?page=stnc_map_homepage">Genel harita</a>
                    </li>

                </ul>

                <div class="text-center">
                    <h1 class="stnc-title fw-bold">Erciyes Teknopark <span> Kat Planlari </span> ve <span>Doluluk
                            Oranlari</span></h1>
                </div>



            </div>
        </div>
    </nav>
</header>

<main class="flex-shrink-0" style="margin-top:88px">


    <div class="container-fluid">


        <div> <span style="color:red"><?php echo $binaName ?> / <?php echo $kat_adi ?> </span> için firma
            <?php  echo $title?> işlemi

        </div>

        <?php
                if (isset($_SESSION['stnc_map_flash_msg'] )) {
                ?>
        <p class="alert alert-danger">
            <?php echo $_SESSION['stnc_map_flash_msg']; ?>
        </p>
        <?php unset($_SESSION['stnc_map_flash_msg']); ?>
        <?php } ?>

        <?php echo $form  ?>

        <div class="row">

            <div class="col-md-4">

                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Firma <?php  echo $title?></h5>


                        <div class="form-group">
                            <label for="door_number">Kapi Numarasi</label>
                            <input type="number" name="door_number" value="<?php echo $door_number ?>"
                                class="form-control" id="door_number" min="1" max="100">
                            <small id="kat_numarasiHelp" class="form-text text-muted">kat numarasi sayisal
                                olmalidir</small>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="company_name">Firma adi</label>
                            <input type="text" name="company_name" value="<?php echo $company_name ?>"
                                class="form-control" id="company_name" min="1" max="50">
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="square_meters">Bina metrekare</label>
                            <input type="text" name="square_meters" value="<?php echo $square_meters ?>"
                                class="form-control" id="square_meters" min="1" max="50">
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="email">Firma email adresi</label>
                            <input type="text" name="email" value="<?php echo $email ?>" class="form-control"
                                id="email">
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="phone">Firma telefon </label>
                            <input type="text" name="phone" value="<?php echo $phone ?>" class="form-control"
                                id="phone">
                        </div>





                    </div>
                </div>

            </div>



            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group">
                            <label for="mobile_phone">Firma cep telefon </label>
                            <input type="text" name="mobile_phone" value="<?php echo $mobile_phone ?>"
                                class="form-control" id="mobile_phone">
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="web_site">Firma WEB sitesi </label>
                            <input type="text" name="web_site" value="<?php echo $web_site ?>" class="form-control"
                                id="web_site">
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="company_description">Firma hakkında detaylı bilgi </label>
                            <textarea class="form-control" name="company_description" id="company_description"
                                rows="3"><?php echo $company_description ?></textarea>
                        </div>

                        <hr>
                        <div class="form-group">
                            <label for="address">adress</label>

                            <textarea class="form-control" name="address" id="address"
                                rows="3"><?php echo $address ?></textarea>
                        </div>
                        <hr>









                    </div>
                </div>
            </div>


            <div class="col-md-4">
            <br>    <br>    <br>
                <div class="form-group">
                    <input type="hidden" value="<?php echo $media_id ?>" name="media_id" id="media_id">
                    <input id="stnc_wp_kiosk_Metabox_video_extra"
                        class="page_upload_trigger_element button button-primary button-large"
                        name="stnc_wp_kiosk_Metabox_video_extra" type="button" value="Resim Yükle / Seç" style="">
                    <br>
                    <br>
                   <?php  if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'show')) :  ?>
                    <div class="background_attachment_metabox_container">  <img src=" <?php echo $image[0]; ?> " alt="">  </div>
                    <?php else : ?>
                    <div class="background_attachment_metabox_container">  </div>
                    <?php endif ; ?>
                </div>
                <br>
                    <div class="form-group">
                     <button type="submit" value="Kaydet" class="btn btn-primary">Kaydet</button>
                    </div>
                    <br>    <br>
                    <a style="color:orange"
                href="/wp-admin/admin.php?page=stnc_map_view&st_trigger=show&binaid=<?php echo $_GET['binaid']?>&kat=<?php echo $_GET['kat']?>">Bina
                Haritası</a>
                <br>
                <br>
              
            <a style="color:blue"
                href="/wp-admin/admin.php?page=stnc_map_view&st_trigger=editor&binaid=<?php echo $_GET['binaid']?>&kat=<?php echo $_GET['kat']?>">Bina
                Harita Editörü</a>
            </div>
        </div>

        <?php echo   '</form>' ?>









    </div>


</main>