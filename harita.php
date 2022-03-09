<?php
function stnc_wp_floor_adminMenu_map()
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
        padding: 3px 7px;
        font-weight: bold;
        color: white;
        background-color: indianred;
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
                        <a class="nav-link" href="/wp-admin/admin.php?page=stncTekmap">editor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/wp-admin/admin.php?page=stncTekSabit">sabit harita</a>
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
     foreach( $results as $result ):            
?>

<div id="ex-<?php  echo $result->name;?>-draggable" class="draggable">eleman <?php  echo $result->name;?></div>
<?php 
    endforeach
    ?>
</div>
           

            </div><!-- /.col-lg-2 -->

            <div class="col-lg-4">

            <?php
        if (!empty($_POST)) {
        global $wpdb;
            $table = "wp_stnc_floor";
            $data = array(
                'name'    => $_POST['your-name'],
				'location'    =>'{\"left\":32,\"top\":88,\"width\":74.42500305175781,\"height\":26,\"x\":32,\"y\":88,\"right\":106.42500305175781,\"bottom\":114}',
            );
            $format = array(
                '%s','%s','%s','%s','%s','%s','%s'
            );
            $success=$wpdb->insert( $table, $data, $format );
            if($success){
				echo '<h3>Your request successfully send to HomeFix! Our Staff will contact you!</h3>' ; 
			}
		}
		?>
	<div id="primary" class="content-area">
		<form method="post">
		<p><label> Your Name<br />
			<input type="text" name="your-name" value="test" size="40" /></label></p>
		<p><label> Your Email<br />
			<input type="text" name="your-email" value="ff@fff.com" size="40"/></label></p>

		<p><input type="submit" value="Send" class="wpcf7-form-control wpcf7-submit" /></p>
		</form>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

           

            </div><!-- /.col-lg-2 -->


        </div>


    </div>


</main>

<script>
    window.addEventListener('load', function () {
        'use strict';
<?php 
/*
global $wpdb;
        $sql = "SELECT * FROM wp_stnc_floor ";
        $results = $wpdb->get_results($sql);
        $i=0;  
        $top=88;  
     foreach( $results as $key =>$result ):
      
        $key=$key+5*7;
?>
        var draggable<?php  echo $result->name;?> = new PlainDraggable(document.getElementById('ex-<?php  echo $result->name;?>-draggable'), {
            onDragEnd: function (moveTo) {
                var rect = this.rect,
                    moveToRect = {
                        left: 0,
                        top: 0,
                        right: moveTo.left + rect.width,
                        bottom: moveTo.top + rect.height
                    }
                console.log(rect)
                // Check confliction if it's possible.
            },
            bottom: <?php  echo $i;?>,
            left: <?php  echo $i;?>,
            right: <?php  echo $i?>,
            top: <?php  echo   $top+$i*$key;?>,
        });
        <?php 
          $i++;
    endforeach
*/

global $wpdb;
        $sql = "SELECT * FROM wp_stnc_floor ";
        $results = $wpdb->get_results($sql);
        $i=0;  
        $top=88;  
     foreach( $results as $key =>$result ):
$data=  str_replace([" ", '\\'], null, $result->location);
$position=  json_decode( $data, true, JSON_UNESCAPED_SLASHES);

?>
        var draggable<?php  echo $result->name;?> = new PlainDraggable(document.getElementById('ex-<?php  echo $result->name;?>-draggable'), {
            leftTop:true,
            onDragEnd: function (moveTo) {
                var rect = this.rect,
                    moveToRect = {
                        left:0,
                        top: 0,
                        right: moveTo.left + rect.width,
                        bottom: moveTo.top + rect.height
                    }
             
                ajaxCall(<?php  echo $result->id;?>,  rect)
             
                // Check confliction if it's possible.
            },
            bottom: <?php  echo  $position["bottom"]!="" ? $position["bottom"] : '0'; ?>,
            left:  <?php  echo  $position["left"]!="" ? $position["left"] : '0'; ?>,
            right:  <?php  echo  $position["right"]!="" ? $position["right"] : '0'; ?>,
            top:  <?php  echo  $position["top"]!="" ? $position["top"] : '0'; ?>,
        });
        <?php  endforeach ?>

        //    #ex-040-draggable bunu ayni zamanda css ile de yapabilirsin 
        //    draggable2.bottom = 648;
        //    draggable2.left = 88;
        //    draggable2.right = 154;
        //    draggable2.top = 627;


    });



function ajaxCall(id,location) {

            const ajax_obj = {
                nonce: "<?php echo wp_create_nonce('stnc-kiosk-ajax-script')?>",
                ajaxurl: "<?php echo admin_url( 'admin-ajax.php' )?>",
            };

const data = new FormData();
data.append('action', 'stnc_wp_floor_stncStatus_ajax_request');
data.append('nonce', ajax_obj.nonce);
data.append('id', id);
data.append('location',JSON.stringify(location));

fetch(ajax_obj.ajaxurl, {
        method: "POST",
        credentials: 'same-origin',
        // headers: new Headers({'content-type': 'application/json'}),
        body:  data,
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
</script>

<!-- <footer class="footer mt-auto py-3 bg-light stnc-footer">
    <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </div>
</footer> -->

<?php

}