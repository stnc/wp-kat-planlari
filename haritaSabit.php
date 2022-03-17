<?php
function stnc_wp_floor_adminMenu_map_sabit()
{
    global $wpdb;

    global $wpdb;
    $stncForm_tableNameMain = $wpdb->prefix . 'stnc_floor_building';
    $sql = "SELECT * FROM " . $stncForm_tableNameMain . "";
    $results = $wpdb->get_results($sql);
    $i = 0;
    $top = 88;

?>
    <style>
.dragAbsolute{
    padding: 3px 7px;
    font-weight: bold;
    color: white;
    position: absolute;
    height: 26px;
    width: 84px;
    text-align: center;
}
.dragAbsoluteSpan1{
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
.dragAbsoluteSpan2{
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


                        <div id="ex-040-wall1">

                            <img class="img-fluid-" src="<?php echo plugin_dir_url(__FILE__) . 'assets/map.jpg' ?>" alt="">

                            <?php


                          
                            foreach ($results as $key => $result) :
                                $data =  str_replace([" ", '\\'], null, $result->map_location);
                                $position =  json_decode($data, true, JSON_UNESCAPED_SLASHES);
                            ?>

                                <div data-toggle="tooltip" data-placement="left" title="<?php echo $result->company_name; ?>" style="left:<?php echo  $position["left"] != "" ? $position["left"] - 32 : '0'; ?>px; top:  <?php echo  $position["top"] != "" ? $position["top"] - 77 : '0'; ?>px;" id="ex-<?php echo $result->floor_no; ?>-draggable" data-bs-toggle="tooltip" class="dragAbsolute">
                                    <span class="dragAbsoluteSpan1"><?php echo $result->floor_no; ?></span>
                                    <span class="dragAbsoluteSpan2" ><?php echo $result->square_meters; ?> m2</span>

                                </div>



                            <?php endforeach ?>
                        </div>








                    </div>


                </div><!-- /.col-lg-2 -->

                <div class="col-lg-3">
                <span class="badge bg-secondary">Firma Listesi</span>

                <ul class="list-group">


  <?php
  foreach ($results as $key => $result) :
                                $data =  str_replace([" ", '\\'], null, $result->map_location);
                                $position =  json_decode($data, true, JSON_UNESCAPED_SLASHES);
                            ?>


                                <li class="list-group-item d-flex justify-content-between align-items-center">
                               <span>  <?php echo $result->company_name; ?></span>
    <span class="badge bg-primary rounded-pill float-start">Bina No: <?php echo $result->floor_no; ?></span>
    <strong  class="float-start"><a href="/wp-admin/admin.php?page=stncEditorHarita&show=ok&edit=<?php echo $result->id; ?>">E</a></strong>
  </li>


                            <?php endforeach ?>


</ul>

                </div><!-- /.col-lg-3 -->


            </div>


        </div>


    </main>

    <script>
        jQuery(document).ready(function($) {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

<?php

}
