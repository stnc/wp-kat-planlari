<?php
//get event trıgger 
//page=map_view_stnc & st_trigger === 'map_editor' 
?>
<style>
.dragAbsolute {
    padding: 3px 7px;
    font-weight: bold;
    color: white;
    position: absolute;
    height: 26px;
    width: 84px;
    text-align: center;
}

.dragAbsoluteSpan1 {
    border-radius: 78px;
    /* padding: 1px; */
    color: blanchedalmond;
    background-color: blue;
    display: inline-block;
    width: 26px;
    float: left;
    margin: 0;
    padding: 0;
}

.dragAbsoluteSpan2 {
    border-radius: 78px;
    padding: 1px;
    color: #212529;

    display: block;
    width: 90px;

    margin: 0;
    padding: 0;
}
</style>



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
                        <a class="nav-link" href="/wp-admin/admin.php?page=map_homepage_stnc">Tümünü göster</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="/wp-admin/admin.php?page=map_editor_stnc&st_trigger=new&binaid=<?php echo $_GET['binaid']?>&kat=<?php echo $_GET['kat']?>">yeni
                            ekle</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=<?php echo $_GET['binaid']?>&kat=<?php echo $_GET['kat']?>">sabit harita</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown"
                            aria-expanded="false">Settings</a>
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

            <h3><?php echo $binaName ?> / <?php echo $kat_adi ?></h3>



            <div class="col-lg-9">


                <div id="ex-040-stage" class="stage-m stage-m-size">


                    <div id="ex-040-wall1"><img class="img-fluid-"
                            src="<?php echo plugin_dir_url(__FILE__) . '../../assets/teknokat/'.   $scheme  ?>" alt=""></div>


                    <?php
            
                            foreach ($results as $result) :
                            ?>
                    <div id="ex-<?php echo $result->id; ?>-draggable" data-id="<?php echo $result->id; ?>"
                        class="draggable">
                        <?php echo $result->company_name; ?></div>
                    <?php
    endforeach
    ?>
                </div>


            </div><!-- /.col-lg-9 -->

            <div class="col-lg-3">
                <span class="badge bg-secondary">Firma Listesi</span>

                <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Firma</th>
                    <th scope="col">Kapı No</th>
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
                                        <th scope="row"><?php echo  $key?></th>
                                        <td><?php echo $result->company_name; ?></td>
                                        <td><?php echo $result->door_number; ?></td>
     <td><a  href="/wp-admin/admin.php?page=map_editor_stnc&st_trigger=show&binaid=<?php echo $binaId?>&kat=<?php echo $katId?>&id=<?php echo $result->id; ?>">Düzenle</a></td>
                                        </tr>
                            


                            <?php  $key++; endforeach ?>

                            </tbody>
                        </table>

            </div><!-- /.col-lg-3 -->


        </div>


    </div>


</main>

<div class="dropdown-menu dropdown-menu-sm" id="context-menu">
    <a class="dropdown-item edit" href="#">Düzenle</a>
    <!-- <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a> -->
</div>
<script>
jQuery(document).ready(function($) {
    $('[data-toggle="tooltip"]').tooltip()
})

window.addEventListener('load', function() {
    'use strict';
    <?php


  
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
            "/wp-admin/admin.php?page=map_editor_stnc&binaid=<?php echo $binaId?>&kat=<?php echo $katId?>&st_trigger=show&id=" + $( this).data('id'))
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