<?php

// load css into the website's front-end
function stncForm_enqueue_style3()
{
//    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    wp_enqueue_style('stnc-style-boot', plugins_url('assets/css/bootstrap.min.css', __FILE__));
    wp_enqueue_style('stnc-style-style2', plugins_url('assets/css/stnc.css', __FILE__));
 //   wp_enqueue_style('stnc-style-animate', plugins_url('assets/css/animate.css', __FILE__));
  //  wp_enqueue_style('stnc-style-kat', plugins_url('assets/css/kat-plani.css', __FILE__));

  wp_enqueue_style( 'add_google_fonts ', 'https://fonts.googleapis.com/css?family=Montserrat', false );

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
</style>



<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-secondary fixed-top bg-secondary">
        <div class="container-fluid">
            <img class="d-block mx-auto mb-1" src="<?php echo plugins_url('assets/images/erciyes-logo.svg', __FILE__)?>"
                alt="" width="100" height="50">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
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





            <div class="col-lg-2">

                <div class=" card-cover h-100 overflow-hidden rounded-5 shadow-lg stnc-card"
                    style="background-color: #7066D1;">
                    <div class="d-flex flex-column h-100  text-white text-center text-shadow-1">
                        <h2 class="pt-5  display-6 lh-1 fw-bold text-center "
                            style="color:#4A3EA5  ;  font-size: 100px; font-family:Montserrat">1. </h2>
                        <h3 class=" fw-bold text-center " style="    color: #c4bdfa; font-family: Montserrat; ">Bina
                        </h3>

                        <div class="d-flex list-unstyled mt-auto ">

                            <svg class="bd-placeholder-img rounded-circle mt-auto" width="140" height="140"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                                preserveAspectRatio="xMidYMid slice" focusable="false">

                                <rect width="100%" height="100%" fill="#fff"></rect>
                                <text x="10%" y="40%" fill="#7066D1" dy=".3em" font-size="1.5em"> %</text>
                                <text x="30%" y="40%" fill="#7066D1" dy=".3em"
                                    font-family="Montserrat,Arial, Helvetica, sans-serif" font-size="3.5em"
                                    font-weight="bold">85</text>
                                <text x="25%" y="75%" fill="#7066D1" dy=".3em" font-size="2em"
                                    font-weight="bold">Dolu</text>

                            </svg>
                        </div>
                     
                    </div>
               
                </div>

                <div class="d-flex list-unstyled mt-auto ">
                          <h2  style="    color: #c4bdfa;
    font-family: Montserrat;
    font-weight: bold;
    font-size: 32px; ">Tekno 1 </h2>
    <br>
                          <span>Binası</span>
                        </div>
                        
            </div><!-- /.col-lg-2 -->


            <div class="col-lg-2">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777"
                        dy=".3em">140x140</text>
                </svg>

                <h2>Heading</h2>
                <p>And lastly this, the third column of representative placeholder content.</p>
                <p><a class="btn btn-secondary" href="#">View details »</a></p>
            </div><!-- /.col-lg-2 -->

            <div class="col-lg-2">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777"
                        dy=".3em">140x140</text>
                </svg>

                <h2>Heading</h2>
                <p>And lastly this, the third column of representative placeholder content.</p>
                <p><a class="btn btn-secondary" href="#">View details »</a></p>
            </div><!-- /.col-lg-2 -->

            <div class="col-lg-2">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777"
                        dy=".3em">140x140</text>
                </svg>

                <h2>Heading</h2>
                <p>And lastly this, the third column of representative placeholder content.</p>
                <p><a class="btn btn-secondary" href="#">View details »</a></p>
            </div><!-- /.col-lg-2 -->

            <div class="col-lg-2">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777"
                        dy=".3em">140x140</text>
                </svg>

                <h2>Heading</h2>
                <p>And lastly this, the third column of representative placeholder content.</p>
                <p><a class="btn btn-secondary" href="#">View details »</a></p>
            </div><!-- /.col-lg-2 -->

            <div class="col-lg-2">
                <svg class="bd-placeholder-img rounded-circle" width="140" height="140"
                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                    preserveAspectRatio="xMidYMid slice" focusable="false">
                    <title>Placeholder</title>
                    <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777"
                        dy=".3em">140x140</text>
                </svg>

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

define('CHfw_Staff_PATH', plugin_dir_path(__FILE__) . 'includes/');

// Load plugin text-domain

$locale = apply_filters('plugin_locale', get_locale(), 'CHfw-staff');

load_textdomain('CHfw-staff', WP_LANG_DIR . 'CHfw-staff/CHfw-staff-' . $locale . '.mo');
load_plugin_textdomain('CHfw-staff', false, plugin_basename(dirname(__FILE__)) . '/languages');


function CHfw_register_post_type_staff()
{
    $singular = 'Staff';
    $plural = __('Kat', 'CHfw-Staff');
    $slug = str_replace(' ', '_', strtolower($singular));
    $labels = array(
        'name' => $plural,
        'singular_name' => $singular,
        'add_new' => __('Add New', 'CHfw-staff'),
        'add_new_item' => __('Add New Staff ', 'CHfw-staff'),
        'edit' => __('Edit', 'CHfw-staff'),
        'edit_item' => __('Edit Staff ', 'CHfw-staff'),
        'new_item' => __('New Staff ', 'CHfw-staff'),
        'view' => __('View Staff ', 'CHfw-staff'),
        'view_item' => __('View Staff ', 'CHfw-staff'),
        'search_term' => __('Search Staff ', 'CHfw-staff'),
        'parent' => __('Parent Staff ', 'CHfw-staff'),
        'not_found' => 'No Staff  found',
        'not_found_in_trash' => 'No Staff in Trash',

    );
    $args = array(
        'label' => 'Staff',
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 10,
        'menu_icon' => 'dashicons-businessman',
        'can_export' => true,
        'delete_with_user' => false,
        'hierarchical' => true,
        'show_in_nav_menus' => false,
        'has_archive' => true,
        'query_var' => true,
        'map_meta_cap' => true,
        'rewrite' => array(
            'slug' => 'staff',
        ),

        'supports' => array(
            'title',
            'excerpt',
            'editor',
            'thumbnail',
        )
    );

    register_post_type($slug, $args);

}

add_action('init', 'CHfw_register_post_type_staff');


require(CHfw_Staff_PATH . "class-staff-member.php");


$CHfw_staff_ch_postID = isset($_GET['post']) ? $_GET['post'] : null;//post  id  for edit

$CHfw_staff_post_type_ch = get_post_type($CHfw_staff_ch_postID);//get type

$CHfw_staff_post_type_post = isset($_REQUEST['post_type']) ? $_REQUEST['post_type'] : 'post';//for new

if ($CHfw_staff_post_type_post == 'staff' or $CHfw_staff_post_type_ch == 'staff') {
    if (is_admin()) {
        add_action('load-post.php', 'CHfw_staff_init_metabox');
        add_action('load-post-new.php', 'CHfw_staff_init_metabox');
    }
}

/*
 * Staff Languages Support add 09-09-2017
 * */
function CHfw_create_language_taxonomies()
{
    // Add new taxonomy, make it hierarchical (like categories)
    $labels = array(
        'name' => __('Languages', 'CHfw-staff'),
        'singular_name' => __('Languages', 'CHfw-staff'),
        'add_new_item' => __('Add New Language ', 'CHfw-staff'),
        'search_items' => __('Search Language', 'CHfw-staff'),
        'popular_items' => __('Popular Language', 'CHfw-staff'),
        'all_items' => __('All Languages', 'CHfw-staff'),
        'parent_item' => __('Parent Language', 'CHfw-staff'),
        'parent_item_colon' => __('Parent Language:', 'CHfw-staff'),
        'edit_item' => __('Edit Language', 'CHfw-staff'),
        'update_item' => __('Update Language', 'CHfw-staff'),

        'new_item_name' => __('New Language Name', 'CHfw-staff'),
    );
    register_taxonomy('staff_languages', array('staff'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,

        'rewrite' => array('slug' => 'staff_languages'),
    ));
}

add_action('init', 'CHfw_create_language_taxonomies', 0);
/*
 * Staff location  Support add 09-09-2017
 * */
function CHfw_create_slocation()
{
    $singular = 'Locations';
    $plural = __('Locations', 'CHfw-Staff');
    $slug = str_replace(' ', '_', strtolower($singular));
    $labels = array(
        'name' => $plural,
        'singular_name' => $singular,
        'add_new' => __('Add Location', 'CHfw-staff'),
        'add_new_item' => __('Add New Location ', 'CHfw-staff'),
        'edit' => __('Edit', 'CHfw-staff'),
        'edit_item' => __('Edit Location ', 'CHfw-staff'),
        'new_item' => __('New Location ', 'CHfw-staff'),
        'view' => __('View Location ', 'CHfw-staff'),
        'view_item' => __('View Location ', 'CHfw-staff'),
        'search_term' => __('Search Location ', 'CHfw-staff'),
        'parent' => __('Parent Location ', 'CHfw-staff'),
        'not_found' => 'No Location  found',
        'not_found_in_trash' => 'No Location in Trash',

    );
    $args = array(
        'label' => 'Location',
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_admin_bar' => true,
        'menu_position' => 10,
        'menu_icon' => 'dashicons-businessman',
        'can_export' => true,
        'delete_with_user' => true,
        'hierarchical' => true,
        'show_in_nav_menus' => false,
        'has_archive' => true,
        'query_var' => true,
        'map_meta_cap' => true,
        'rewrite' => array(
            'slug' => 'locations',
        ),

        'supports' => array(
            'title',
            'excerpt',
            'editor',
            'thumbnail',
        )
    );

    register_post_type($slug, $args);
}

add_action('init', 'CHfw_create_slocation', 0);


/*------------------UPDATE STAFF---------------------*/

//add_action( 'publish_staff', 'Staff_schedule_staff_expiration_event_insert' );
function CHfw_Staff_schedule_staff_expiration_event_insert($post_id)
{
    // Schedule the actual event
    //wp_schedule_single_event( 30 * DAY_IN_SECONDS, 'updateCategories_staff_after_expiration_V1', array( $post_id ) );//insert
    CHfw_updateCategories_staff_after_expiration($post_id);
    write_log("run");

}


add_action('CHfw_updateCategories_staff_after_expiration', 'CHfw_updateCategories_staff_after_expiration', 10, 1);
// This function will run once the 'addCategories_staff_after_expiration' is called


function CHfw_updateCategories_staff_after_expiration($post_id)
{

    global $wpdb;


    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (wp_is_post_autosave($post_id)) {
        return;
    }

    // Check if not a revision.
    if (wp_is_post_revision($post_id)) {
        return;
    }

    $term_cal = term_exists('Auto Draft', 'booked_custom_calendars');
    if ($term_cal !== 0 && $term_cal !== null) {
        wp_delete_term($term_cal['term_id'], 'booked_custom_calendars');
    }


    $post_title = get_the_title($post_id);

    $display_before_title = get_post_meta($post_id, 'wow_BeforeTitle');

    if (count($display_before_title) > 0) {
        $display_before_title = $display_before_title[0];
    } else {
        $display_before_title = null;
    }

        //the purpose of this place looks at If the period has already occurred, if it has occurred does not
    $booked_custom_calendars_term = term_exists($post_title, 'booked_custom_calendars');
    $added_booked_custom_calendars_term = 0;
    if ($booked_custom_calendars_term !== 0 && $booked_custom_calendars_term !== "") {
        $added_booked_custom_calendars_term = isset($booked_custom_calendars_term['term_id']) ? $booked_custom_calendars_term['term_id'] : 0;
    }

        // is the savebefore value where the first insertion also does not occur with wow_befortitle, meaning it has not been added before
    if (empty($display_before_title)) {

        $args = array(
            'description' => "Staff plugin ; Automatic Value: " . $post_title . "",
            'slug' => $post_title,
        );
        //the purpose of this place is to see if the term is more formed if it is formed does not
        $booked_custom_calendars_term = wp_insert_term($post_title, "booked_custom_calendars", $args);
        $added_booked_custom_calendars_term = isset($booked_custom_calendars_term['term_id']) ? $booked_custom_calendars_term['term_id'] : 0;
    }
    //the event will break here here will make insert, so this place will be the first insert event get
    else {



// if you enter here the title has changed post title is the value of changing the old ($display_before_title) to make the term_exist
        if ($display_before_title != $post_title) {
            //booked_custom_calendars taxonomy change
            $term_control_booked_custom_calendars = term_exists($display_before_title, 'booked_custom_calendars');
            wp_update_term($term_control_booked_custom_calendars['term_id'], 'booked_custom_calendars', array(
                'name' => $post_title,
                'slug' => $post_title
            ));
        }
    }


    $selected_departman_id = CHfw_get_meta($post_id, 'display_doctor_department', 'CHfw_DoctorAndDepartmant_ForSingleStaffPage');
    if ($selected_departman_id != false) {//so I used wp_schedule_single_event() so if the value is not empty,
        $selected_departman_id = (int)$selected_departman_id;
    }


// events is also using the metabase (doctor selected) )
    $previously_added_values = get_post_meta($selected_departman_id, 'CHfw_mpevent_departmentForSingleEventPage');
    $dilimler = explode(",", $previously_added_values[0]);
    array_push($dilimler, $added_booked_custom_calendars_term);
    $previously_added_values = implode(",", $dilimler);
    update_post_meta($selected_departman_id, 'CHfw_mpevent_departmentForSingleEventPage', $previously_added_values);
}


//  runs when a Post is update
add_action('publish_staff', 'CHfw_Staff_schedule_staff_expiration_event_update');
function CHfw_Staff_schedule_staff_expiration_event_update($post_id)
{
    // Schedule the actual event
    //updateCategories_staff_after_expiration( $post_id );
    wp_schedule_single_event(strtotime("+2 seconds"), 'CHfw_updateCategories_staff_after_expiration', array($post_id));
}


add_action('pre_post_update', 'CHfw_post_updating_callback');
function CHfw_post_updating_callback($post_id)
{
    global $post;
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (isset($post->post_status)){
        if ($post->post_status == "publish" && $post->post_type == "staff") {
            $display_before_title_read = get_the_title($post_id);
            update_post_meta($post_id, 'wow_BeforeTitle', $display_before_title_read);

        }
    }

}


add_action('pre_delete_term', 'CHfw_prevent_terms_delete', 1, 2);
function CHfw_prevent_terms_delete($term, $taxonomy)
{
    global $wpdb;
    if (!current_user_can('manage_network')) {
        $table = $wpdb->prefix . 'options';
        $wpdb->delete($table, array('option_name' => 'booked_defaults_' . $term));
    }
}


require("includes/CHfw-staff-metabox-options.php");

/*staff image size */
if (function_exists('add_image_size')) {
    add_image_size('CHfw-staffPostSize', 320, 320, false);
}


/*staff pagination fix*/
$scFW_staffLimit_posts = isset($CHfw_rdx_options['staff_limit_posts']) ? $CHfw_rdx_options['staff_limit_posts'] : 5;

function CHfw_mp_staff_posts_per_page($query)
{
    global $scFW_staffLimit_posts;
    if (isset($query->query_vars['post_type'])) {
        if ($query->query_vars['post_type'] == 'staff') {
            $query->query_vars['posts_per_page'] = $scFW_staffLimit_posts;
        }
    }

    return $query;
}

if (!is_admin()) {
    add_filter('pre_get_posts', 'CHfw_mp_staff_posts_per_page');
}


function CHfw_admin_menu()
{
    add_submenu_page("edit.php?post_type=staff", __("Locations", 'mp-timetable'), __("Locations", 'mp-timetable'), "edit_posts", "edit.php?post_type=locations");//chfw condi
    add_submenu_page("edit.php?post_type=staff", __("Add Locations", 'mp-timetable'), __("Add Locations", 'mp-timetable'), "edit_posts", "post-new.php?post_type=locations");//chfw add treatmens

      add_submenu_page( "edit.php?post_type=staff", 'Ayarlar', 'Ayarlar', 'manage_options', 'stncFullPage', 'stncForm_adminMenu_About_contentsTest' ); ////burası alt kısım onun altında olacak olan bolum için 



}

add_action('admin_menu', 'CHfw_admin_menu');


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


/*
add custom_colum
@use http://bit.ly/2zKE0k4
*/
function CHfw_add_img_column($columns)
{
    $columns['img'] = 'Featured Image';
    return $columns;
}

function CHfw_manage_img_column($column_name, $post_id)
{
    if ($column_name == 'img') {
        echo get_the_post_thumbnail($post_id, 'thumbnail');
    }

    return $column_name;
}