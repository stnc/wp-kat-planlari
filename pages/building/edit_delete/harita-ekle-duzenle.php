<?php
session_start();

$katId=$_GET['katid'];

    $wp_stnc_map_floors =$wpdb->prefix . 'stnc_map_floors';

   
$map = $wpdb->get_row($wpdb->prepare("SELECT *  FROM ".   $wp_stnc_map_floors." AS kat where id=%d",$katId));

         $scheme = $map->scheme;
         $katadi  = $map->name;
         $tekno_id  = $map->tekno_id;
         $scheme_media_id  = $map->scheme_media_id;
    
  
    
      
         $title ="Ekleme";
         $form = '<form action="/wp-admin/admin.php?page=map_editor_stnc&st_trigger=add_save&&kat='. $_GET['katid'] .'" method="post">';

         if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'show')) {
            $title ="Düzenleme";
            $form = '<form action="/wp-admin/admin.php?page=map_editor_stnc&st_trigger=update&kat='. $_GET['katid'] .'" method="post">';
         }

?>

<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-secondary fixed-top bg-secondary">
        <div class="container-fluid">
            <img class="d-block mx-auto mb-1"
                src="<?php echo plugins_url('../../assets/images/erciyes-logo.svg', __FILE__) ?>" alt="" width="100"
                height="50">
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
                        <a class="nav-link" href="/wp-admin/admin.php?page=map_homepage_stnc">Genel harita</a>
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
    <?php
                if (isset($_SESSION['stnc_map_flash_msg'] )) {
                ?>
        <p class="alert alert-danger">
            <?php echo $_SESSION['stnc_map_flash_msg']; ?>
        </p>
        <?php unset($_SESSION['stnc_map_flash_msg']); ?>
        <?php } ?>

        <div> <span style="color:red"> <?php echo $tekno_id ?>. Bina / <?php echo $katadi ?> </span> için firma
            <?php  echo $title?> işlemi

        </div>



        <?php echo $form  ?>

        <div class="row">

            <div class="col-md-4">
            <div class="form-group">
                    <input type="hidden" value="<?php echo $scheme_media_id ?>" name="scheme_media_id" id="scheme_media_id">

                </br>
                </br>
                </br>
                </br>


                    <input id="stnc_wp_kiosk_Metabox_video_extra"
                        class="page_upload_trigger_element button button-primary button-large"
                        name="stnc_wp_kiosk_Metabox_video_extra" type="button" value="Harita Yükle / Seç" style="">
                    <br>
                    <br>
                   <?php  if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'show')) :  ?>
                    <div class="background_attachment_metabox_container2">  <img src=" <?php echo $scheme_media_id[0]; ?> " alt="">  </div>
                    <?php else : ?>
                    <div class="background_attachment_metabox_container2">  </div>
                    <?php endif ; ?>
                </div>
                <div class="card">
                    <div class="card-body">

                        <h5 class="card-title">Firma <?php  echo $title?></h5>


        
                        <div class="form-group">
                            <label for="company_name">name</label>
                            <input type="text" name="name" value="<?php echo $name ?>"
                                class="form-control" id="name" min="1" max="50">
                        </div>
                        <hr>

                   





                    </div>
                </div>

            </div>




            <div class="col-md-4">
            <br>    <br>    <br>
 
                <br>
                    <div class="form-group">
                     <button type="submit" value="Kaydet" class="btn btn-primary">Kaydet</button>
                    </div>
                    <br>    <br>
                    <a style="color:orange"
                href="/wp-admin/admin.php?page=building_map_editor_stnc&st_trigger=show&binaid=<?php echo $_GET['binaid']?>&kat=<?php echo $_GET['kat']?>">Bina
                Haritası</a>
                <br>
                <br>
              
            <a style="color:blue"
                href="/wp-admin/admin.php?page=building_map_editor_stnc&st_trigger=map_editor&binaid=<?php echo $_GET['binaid']?>&kat=<?php echo $_GET['kat']?>">Bina
                Harita Editörü</a>
            </div>
        </div>

        <?php echo   '</form>' ?>









    </div>


</main>