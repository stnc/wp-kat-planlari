<?php
function stnc_wp_floor_adminMenu_map_sabit()
{
global $wpdb;
?>
<style>
.stnc-header-page #adminmenumain,
.stnc-header-page #wpadminbar,
.stnc-header-page #adminmenuback,
.stnc-header-page #adminmenuwrap,
.stnc-header-page #wpfooter {
    display: none;
}

#wpcontent,
#wpfooter {
    margin-left: auto !important;
}

html.wp-toolbar {
    padding-top: 0 !important;
}


    #ex-040-stage {
        /* width: 100%; */
        position: relative;
        display: block;
    }

    /* kurulumda boyutlandirma buradan da verilebilri  */
    #ex-040-draggable {
        /* bottom: 122px;
        height: 20px;
        left: 30px;
        right: 104.609375px;
        top: 102px;
        width: 74.609375px; */
        border-radius: 20px;
        position: absolute;
    }

    #ex-040-wall2 {
        position: absolute;
        left: 0;
        top: 0;
    }

    .col>.stage-m {
        margin-bottom: 0;
    }

    .stage-m-size {
        width: 1120px;
    height: 924px;

    }

    .draggable {
        display: inline-block;
        padding: 1px 3px;
        font-weight: bold;
        color: white;
        background-color: indianred;
        position: absolute;
    }

    .draggable {
        position: absolute;
    height: 29px;
    width: 85px;
    text-align: center;
    }

    .stage-m {
        background-color: #d4d4d4;
        margin-bottom: 1em;
    }

    #ex-040-wall2 path {
        fill: #fff;
    }


</style>



<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-secondary fixed-top bg-secondary">
        <div class="container-fluid">
            <img class="d-block mx-auto mb-1"
                src="<?php echo plugins_url('assets/images/erciyes-logo.svg', __FILE__) ?>" alt="" width="100"
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
                        <a class="nav-link" href="#">Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Switch account</a>
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
                <form class="d-flex">
                    <div class="text-center">
                        <h1 class="stnc-title fw-bold">Erciyes Teknopark <span> Kat Planlari </span> ve <span>Doluluk
                                Oranlari</span></h1>
                    </div>

                </form>
            </div>
        </div>
    </nav>
</header>

<main class="flex-shrink-0" style="margin-top:88px">


    <div class="container-fluid">

        <div class="row">





            <div class="col-lg-8">

      
            <div id="ex-040-stage" class="stage-m stage-m-size">


<div id="ex-040-wall1"><img class="img-fluid-" src="<?php echo plugin_dir_url( __FILE__ ) . 'assets/map.jpg'?>" alt=""></div>


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
</div>
           

            </div><!-- /.col-lg-2 -->

            <div class="col-lg-4">

  

           

            </div><!-- /.col-lg-4 -->


        </div>


    </div>


</main>

<script>
 jQuery(document).ready(function ($) {

    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<!-- <footer class="footer mt-auto py-3 bg-light stnc-footer">
    <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </div>
</footer> -->

<?php

}