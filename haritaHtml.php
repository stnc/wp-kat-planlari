<?php 
$stncForm_wp_stnc_map_floors = $wpdb->prefix . 'stnc_map_floors';
$map = $wpdb->get_row($wpdb->prepare("SELECT *  FROM " . $stncForm_wp_stnc_map_floors . "  WHERE id = %d", $_GET['teknoid']));
        //    print_r( $thepost );
        //   $floor_no = isset($_POST["floor_no"]) ? sanitize_text_field($_POST["floor_no"]) : "0";
        $scheme = $map->scheme;

?>
<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-secondary fixed-top bg-secondary">
        <div class="container-fluid">
            <img class="d-block mx-auto mb-1" src="<?php echo plugins_url('assets/images/erciyes-logo.svg', __FILE__) ?>" alt="" width="100" height="50">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/wp-admin">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/wp-admin/admin.php?page=stncEditorHarita&add=ok">editor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/wp-admin/admin.php?page=stncSabitHarita">sabit harita</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Settings</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
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

        <div class="row">





            <div class="col-lg-9">


                <div id="ex-040-stage" class="stage-m stage-m-size">


                    <div id="ex-040-wall1"><img class="img-fluid-" src="<?php echo plugin_dir_url(__FILE__) . 'assets/teknokat/'.   $scheme  ?>" alt=""></div>


                    <?php
                    global $wpdb;
                    global $stncForm_tableNameMain;
                    $sql = "SELECT * FROM " . $stncForm_tableNameMain . " ";
                    $results = $wpdb->get_results($sql);
                    foreach ($results as $result) :
                    ?>
                        <div id="ex-<?php echo $result->id; ?>-draggable" data-id="<?php echo $result->id; ?>" class="draggable">
                            <?php echo $result->company_name; ?></div>
                    <?php
                    endforeach
                    ?>
                </div>


            </div><!-- /.col-lg-Z -->


            
            <?php if ((isset($_GET['edit'])) || (isset($_GET['add']))  ) : ?>
            <div class="col-lg-3">

                <div id="primary" class="content-area">



                         <?php 
                        //   $form='<form action="/wp-admin/admin.php?page=stncEditorHarita" method="post"> ';
                         if ((isset($_GET['add']))  ) : 
                            $title=' <h5 class="card-title">Firma Ekleme</h5>';
                            endif ?>

                           <?php if ((isset($_GET['edit'])) ) {
                             $title=' <h5 class="card-title">Firma duzenleme</h5>';
                             $form='    <form action="/wp-admin/admin.php?page=stncEditorHarita&show=ok&edit='.$_GET['edit'].'" method="post"> ';
                           } else {
                            $form='    <form action="/wp-admin/admin.php?page=stncEditorHarita" method="post"> ';
                           }
                         
                           
                           
                           ?>


                       <?php    echo $form  ?> 
                  

                        <div class="card">
                            <div class="card-body">
                        
                            <?php    echo $title  ?> 


                                <div class="form-group">
                                    <label for="floor_no">Kat Numarasi</label>
                                    <input type="number" name="floor_no" value="<?php echo $floor_no ?>" class="form-control" id="floor_no" min="1" max="50">
                                    <small id="kat_numarasiHelp" class="form-text text-muted">kat numarasi sayisal
                                        olmalidir</small>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="company_name">Firma adi</label>
                                    <input type="text" name="company_name" value="<?php echo $company_name ?>" class="form-control" id="company_name" min="1" max="50">
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label for="square_meters">Bina metrekare</label>
                                    <input type="text" name="square_meters" value="<?php echo $square_meters ?>" class="form-control" id="square_meters" min="1" max="50">
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label for="email">Firma email adresi</label>
                                    <input type="text" name="email" value="<?php echo $email ?>" class="form-control" id="email">
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label for="phone">Firma telefon </label>
                                    <input type="text" name="phone" value="<?php echo $phone ?>" class="form-control" id="phone">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="mobile_phone">Firma cep telefon </label>
                                    <input type="text" name="mobile_phone" value="<?php echo $mobile_phone ?>" class="form-control" id="mobile_phone">
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label for="web_site">Firma WEB sitesi </label>
                                    <input type="text" name="web_site" value="<?php echo $web_site ?>" class="form-control" id="web_site">
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label for="company_description">Firma hakkında detaylı bilgi </label>
                                    <textarea class="form-control" name="company_description" id="company_description" rows="3"><?php echo $company_description ?></textarea>
                                </div>

                                <hr>
                                <div class="form-group">
                                    <label for="address">adress</label>
                                    <input type="text" name="address" value="<?php echo $address ?>" class="form-control" id="address">
                                </div>
                                <hr>

                                <div class="form-group">      
              <input type="hidden"  value="<?php echo $media_id ?>" name="media_id" id="media_id">
              <input id="stnc_wp_kiosk_Metabox_video_extra" class="page_upload_trigger_element button button-primary button-large" name="stnc_wp_kiosk_Metabox_video_extra" type="button" value="Video Yükle / Seç" style="">
        <br>
        <div class="background_attachment_metabox_container"></div>
        </div>


                                <button type="submit" value="Kaydet" class="btn btn-primary">Kaydet</button>


                                <?php
                                if ((isset($_GET['edit']))) : ?>
                                    <input type="hidden" name="kaydet" value="guncelle" />
                                    <input type="hidden" name="id" value="<?php echo $id ?>" />
                                <?php else : ?>
                                    <input type="hidden" name="kaydet" value="yeniKaydet" />
                                <?php endif ?>



                            </div>
                        </div>




                    </form>

                </div>
            </div>
            <?php endif ?>
        </div>
    </div>







</main><!-- .site-main -->


<div class="dropdown-menu dropdown-menu-sm" id="context-menu">
    <a class="dropdown-item edit" href="#">Düzenle</a>
    <!-- <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a> -->
</div>
</main>

<script>
    window.addEventListener('load', function() {
        'use strict';
        <?php


        global $wpdb;
        global $stncForm_tableNameMain;
        $sql = "SELECT * FROM " . $stncForm_tableNameMain . " ";
        $results = $wpdb->get_results($sql);
        foreach ($results as $key => $result) :
            $data =  str_replace([" ", '\\'], null, $result->map_location);
            $position =  json_decode($data, true, JSON_UNESCAPED_SLASHES);

        ?>
            var draggable<?php echo $result->id; ?> = new PlainDraggable(document.getElementById(
                'ex-<?php echo $result->id; ?>-draggable'), {
                leftTop: false,
                onDragEnd: function(moveTo) {
                    var rect = this.rect,
                        moveToRect = {
                            left: 0,
                            top: 0,
                            right: moveTo.left + rect.width,
                            bottom: moveTo.top + rect.height
                        }

                    ajaxCall(<?php echo $result->id; ?>, rect)
                    console.log(rect)

                    // Check confliction if it's possible.
                },
                bottom: <?php echo  $position["bottom"] != "" ? $position["bottom"] : '0'; ?>,
                left: <?php echo  $position["left"] != "" ? $position["left"] : '0'; ?>,
                right: <?php echo  $position["right"] != "" ? $position["right"] : '0'; ?>,
                top: <?php echo  $position["top"] != "" ? $position["top"] : '0'; ?>,
            });
        <?php endforeach ?>

        //    #ex-040-draggable bunu ayni zamanda css ile de yapabilirsin 
        //    draggable2.bottom = 648;
        //    draggable2.left = 88;
        //    draggable2.right = 154;
        //    draggable2.top = 627;


    });



    function ajaxCall(id, location) {

        const ajax_obj = {
            nonce: "<?php echo wp_create_nonce('stnc-kiosk-ajax-script') ?>",
            ajaxurl: "<?php echo admin_url('admin-ajax.php') ?>",
        };

        const data = new FormData();
        data.append('action', 'stnc_wp_floor_stncStatus_ajax_request');
        data.append('nonce', ajax_obj.nonce);
        data.append('id', id);
        data.append('location', JSON.stringify(location));

        fetch(ajax_obj.ajaxurl, {
                method: "POST",
                credentials: 'same-origin',
                // headers: new Headers({'content-type': 'application/json'}),
                body: data,
            })
            .then(response => {
                if (response.ok) {
                    return response.json()
                } else {
                    console.log("error")
                }
            })
            .then(data => {
                // console.log(data)
                // console.log(data.renewal)
                // $('#jsonDolarData').html(data.jsonData.dolar);


            })
            .catch((error) => {
                console.log("error2")
            });
    }

    var editId = 0;

    jQuery(document).ready(function($) {
        $('.draggable').on('contextmenu', function(e) {
            $("#context-menu a.edit").attr("href",
                "/wp-admin/admin.php?page=stncEditorHarita&show=ok&edit=" + $(
                    this).data('id'))
            var top = e.pageY - 1;
            var left = e.pageX - 90;
            $("#context-menu").css({
                display: "block",
                top: top,
                left: left
            }).addClass("show");
            return false; //blocks default Webbrowser right click menu
        }).on("click", function() {

            $("#context-menu").removeClass("show").hide();

        });

        $("#context-menu a").on("click", function() {
            $(this).parent().removeClass("show").hide();

        });
    })
</script>