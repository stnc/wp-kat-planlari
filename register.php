
<?php

// load css into the website's front-end
function stncForm_enqueue_style3()
{
//    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    wp_enqueue_style('stnc-style-boot', plugins_url('assets/css/bootstrap.min.css', __FILE__));
    wp_enqueue_style('stnc-style-style2', plugins_url('assets/css/stnc.css', __FILE__));
 //   wp_enqueue_style('stnc-style-animate', plugins_url('assets/css/animate.css', __FILE__));
  //  wp_enqueue_style('stnc-style-kat', plugins_url('assets/css/kat-plani.css', __FILE__));
    
}

if ((isset($_GET['page'])) && ($_GET['page'] === 'stncFullPage')) {
add_action('admin_enqueue_scripts', 'stncForm_enqueue_style3');
add_action('admin_enqueue_scripts', 'custom_script_in_admin');
}


function custom_script_in_admin($hook) {


    
    wp_register_script( 'stnc-bootstrap',plugin_dir_url( __FILE__ ) . 'assets/js/bootstrap.bundle.min.js', '',true );
    wp_enqueue_script('stnc-bootstrap');   
    
    wp_register_script( 'stnc-my',plugin_dir_url( __FILE__ ) . 'assets/js/my.js', '',true );
    wp_enqueue_script('stnc-my');
}




 function admin_body_class( $classes = '' ) {
    $onboarding_class = isset( $_GET['page'] ) && 'stncFullPage' === $_GET['page'] ? 'stnc-header-page' : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended
    $classes .= ' ' . $onboarding_class . ' ';

    return $classes;

}
add_action( 'admin_body_class',  'admin_body_class' );






function stncForm_adminMenu_About_contentsTest()
{
?>
<style>
    .stnc-header-page #adminmenumain, .stnc-header-page #wpadminbar, .stnc-header-page #adminmenuback, .stnc-header-page #adminmenuwrap, .stnc-header-page #wpfooter {
    display: none;
}

#wpcontent, #wpfooter {
     margin-left: auto!important; 
}

html.wp-toolbar {
    padding-top: 0!important; 
}
</style>


    
<header>
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-secondary fixed-top bg-secondary">
    <div class="container-fluid">
    <img class="d-block mx-auto mb-1" src="<?php echo plugins_url('assets/images/erciyes-logo.svg', __FILE__)?>" alt="" width="100" height="50">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
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
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Settings</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown01">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
      <div class="text-center">
    <h1 class="stnc-title fw-bold">Erciyes Teknopark <span> Kat Planlari </span> ve  <span>Doluluk Oranlari</span></h1>
</div>

      </form>
    </div>
    </div>
  </nav>
</header>

<main class="flex-shrink-0" style="margin-top:88px">


<div class="container-fluid">

<div class="row">
 




<div class="col-lg-2">

<div class=" card-cover h-100 overflow-hidden rounded-5 shadow-lg stnc-card" style="background-color: #7066D1;">
          <div class="d-flex flex-column h-100  text-white text-center text-shadow-1">
            <h2 class="pt-5  display-6 lh-1 fw-bold text-center " style="color:#4A3EA5  ;  font-size: 100px;">1. </h2>
            <h3 class="pt-3 mt-3 lh-1 fw-bold text-center ">Bina  </h3>

            <div class="d-flex list-unstyled mt-auto ">
            <svg class="bd-placeholder-img rounded-circle mt-auto" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
     
     <rect width="100%" height="100%" fill="#fff"></rect>
     <text x="10%" y="40%" fill="#7066D1" dy=".3em " font-size="1.5em"> %</text>
     <text x="30%" y="40%" fill="#7066D1" dy=".3em" font-size="3.5em" font-weight="bold">85</text>
     <text x="25%" y="75%" fill="#7066D1" dy=".3em" font-size="2em" font-weight="bold">Dolu</text>
 
 </svg>
</div>
    
            </ul>
          </div>
        </div>


      </div><!-- /.col-lg-2 -->


      <div class="col-lg-2">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Heading</h2>
        <p>And lastly this, the third column of representative placeholder content.</p>
        <p><a class="btn btn-secondary" href="#">View details »</a></p>
      </div><!-- /.col-lg-2 -->

      <div class="col-lg-2">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Heading</h2>
        <p>And lastly this, the third column of representative placeholder content.</p>
        <p><a class="btn btn-secondary" href="#">View details »</a></p>
      </div><!-- /.col-lg-2 -->

      <div class="col-lg-2">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Heading</h2>
        <p>And lastly this, the third column of representative placeholder content.</p>
        <p><a class="btn btn-secondary" href="#">View details »</a></p>
      </div><!-- /.col-lg-2 -->

      <div class="col-lg-2">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Heading</h2>
        <p>And lastly this, the third column of representative placeholder content.</p>
        <p><a class="btn btn-secondary" href="#">View details »</a></p>
      </div><!-- /.col-lg-2 -->

      <div class="col-lg-2">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        <h2>Heading</h2>
        <p>And lastly this, the third column of representative placeholder content.</p>
        <p><a class="btn btn-secondary" href="#">View details »</a></p>
      </div><!-- /.col-lg-2 -->


    </div>


  </div>


</main>


<footer class="footer mt-auto py-3 bg-light stnc-footer">
  <div class="container">
    <span class="text-muted">Place sticky footer content here.</span>
  </div>
</footer>

<?php

}

/*
// load css into the login page
function mytheme_enqueue_login_style() {
    wp_enqueue_style( 'mytheme-options-style', get_template_directory_uri() . '/css/login.css' ); 
}
add_action( 'login_enqueue_scripts', 'mytheme_enqueue_login_style' );

*/


// Load plugin text-domain

// $locale = apply_filters('plugin_locale', get_locale(), 'CHfw-staff');

// load_textdomain('CHfw-staff', WP_LANG_DIR . 'CHfw-staff/CHfw-staff-' . $locale . '.mo');
// load_plugin_textdomain('CHfw-staff', false, plugin_basename(dirname(__FILE__)) . '/languages');






add_filter('manage_staff_posts_columns', 'CHfw_add_img_column');
add_filter('manage_staff_posts_custom_column', 'CHfw_manage_img_column', 10, 2);



if (isset( $_GET['page'] ) && 'stncFullPage' === $_GET['page'] ){

    add_action('admin_notices', function () {
      echo 'My notice';
    });


    function my_hide_notices_to_all_but_super_admin(){
       
            remove_all_actions( 'user_admin_notices' );
            remove_all_actions( 'admin_notices' );
        
   }
   add_action('in_admin_header', 'my_hide_notices_to_all_but_super_admin', 99);
 
}


require_once "helper.php";
require_once "list_table.php";
require_once "stncForm-adminMenu-About.php";

/** ************************ Menu Defined  ****************************
 *******************************************************************************
 * Now we just need to define an admin page. For this example, we'll add a top-level
 * menu item to the bottom of the admin menus.
 */


 
add_action('admin_menu', 'StncMainMenu');
function StncMainMenu(){
    add_menu_page('Erciyes Teknopark Başvuruları','Teknopark Form', 'manage_options', 'stncTekForm', 'tt_render_list_page','dashicons-networking'); ////burası main menuyu ekler yani üst ksıım 
 //   add_submenu_page( 'stncTekForm', 'Ayarlar', 'Ayarlar', 'manage_options', 'stGnlolOptions', 'stncForm_adminMenu_About_contents' ); ////burası alt kısım onun altında olacak olan bolum için 
 add_submenu_page( "stncTekForm", 'Kat', 'Ayarlar', 'manage_options', 'stncFullPage', 'stncForm_adminMenu_About_contentsTest' ); ////burası alt kısım onun altında olacak olan bolum için 

}