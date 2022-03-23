<?php
function stnc_wp_floor_adminMenu_homepage()
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
                        <a class="nav-link active" aria-current="page"
                            href="/wp-admin/admin.php?page=map_homepage_stnc">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
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
                            style="color:#4A3EA5  ;  font-size: 100px;">1. </h2>
                        <h3 class="pt-3 mt-3 lh-1 fw-bold text-center ">Bina </h3>

                        <div class="d-flex list-unstyled mt-auto ">
                            <svg class="bd-placeholder-img rounded-circle mt-auto" width="140" height="140"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                                preserveAspectRatio="xMidYMid slice" focusable="false">

                                <rect width="100%" height="100%" fill="#fff"></rect>
                                <text x="10%" y="40%" fill="#7066D1" dy=".3em" font-size="3.5em"
                                    font-weight="bold">25</text>
                                <text x="60%" y="45%" fill="#7066D1" dy=".3em " font-size="1.5em"> ofis</text>

                                <text x="25%" y="75%" fill="#7066D1" dy=".3em" font-size="2em"
                                    font-weight="bold">BOS</text>

                                <!-- <text x="20%" y="55%" fill="#7066D1" dy=".3em" font-size="2em" font-weight="bold">DOLU</text> -->
                            </svg>
                        </div>


                    </div>
                </div>


                <br>

                <select class="form-select form-select-sm" style="width: 130px;" aria-label=".form-select-sm example"
                    onchange="javascript:handleSelect(this)">
                    <option value="">kat seciniz</option>
                    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=1&kat=1">bodrum kat</option>
                    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=1&kat=2">zemin kat</option>
                    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=1&kat=4">1 kat</option>
                    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=1&kat=5">2 kat</option>
                    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=1&kat=6">3 kat</option>
                    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=1&kat=8">4 kat</option>

                </select>






            </div><!-- /.col-lg-2 -->


            <div class="col-lg-2">

                <div class=" card-cover h-100 overflow-hidden rounded-5 shadow-lg stnc-card"
                    style="background-color: #7066D1;">
                    <div class="d-flex flex-column h-100  text-white text-center text-shadow-1">
                        <h2 class="pt-5  display-6 lh-1 fw-bold text-center "
                            style="color:#4A3EA5  ;  font-size: 100px;">2. </h2>
                        <h3 class="pt-3 mt-3 lh-1 fw-bold text-center ">Bina </h3>

                        <div class="d-flex list-unstyled mt-auto ">
                            <svg class="bd-placeholder-img rounded-circle mt-auto" width="140" height="140"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                                preserveAspectRatio="xMidYMid slice" focusable="false">

                                <rect width="100%" height="100%" fill="#fff"></rect>
                                <text x="10%" y="40%" fill="#7066D1" dy=".3em" font-size="3.5em"
                                    font-weight="bold">25</text>
                                <text x="60%" y="45%" fill="#7066D1" dy=".3em " font-size="1.5em"> ofis</text>

                                <text x="25%" y="75%" fill="#7066D1" dy=".3em" font-size="2em"
                                    font-weight="bold">BOS</text>

                                <!-- <text x="20%" y="55%" fill="#7066D1" dy=".3em" font-size="2em" font-weight="bold">DOLU</text> -->
                            </svg>
                        </div>


                    </div>
                </div>


                <br>

                <select class="form-select form-select-sm" style="width: 130px;" aria-label=".form-select-sm example"
                    onchange="javascript:handleSelect(this)">
                    <option value="">kat seciniz</option>

                    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=2&kat=9">zemin kat</option>
                    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=2&kat=10">1 kat</option>


                </select>






            </div><!-- /.col-lg-2 -->

            <div class="col-lg-2">

                <div class=" card-cover h-100 overflow-hidden rounded-5 shadow-lg stnc-card"
                    style="background-color: #7066D1;">
                    <div class="d-flex flex-column h-100  text-white text-center text-shadow-1">
                        <h2 class="pt-5  display-6 lh-1 fw-bold text-center "
                            style="color:#4A3EA5  ;  font-size: 100px;">3. </h2>
                        <h3 class="pt-3 mt-3 lh-1 fw-bold text-center ">Bina </h3>

                        <div class="d-flex list-unstyled mt-auto ">
                            <svg class="bd-placeholder-img rounded-circle mt-auto" width="140" height="140"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                                preserveAspectRatio="xMidYMid slice" focusable="false">

                                <rect width="100%" height="100%" fill="#fff"></rect>
                                <text x="10%" y="40%" fill="#7066D1" dy=".3em" font-size="3.5em"
                                    font-weight="bold">25</text>
                                <text x="60%" y="45%" fill="#7066D1" dy=".3em " font-size="1.5em"> ofis</text>

                                <text x="25%" y="75%" fill="#7066D1" dy=".3em" font-size="2em"
                                    font-weight="bold">BOS</text>

                                <!-- <text x="20%" y="55%" fill="#7066D1" dy=".3em" font-size="2em" font-weight="bold">DOLU</text> -->
                            </svg>
                        </div>


                    </div>
                </div>


                <br>

                <select class="form-select form-select-sm" style="width: 130px;" aria-label=".form-select-sm example"
                    onchange="javascript:handleSelect(this)">
                    <option value="">kat seciniz</option>
                    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=3&kat=11">bodrum kat</option>
                    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=3&kat=12">zemin kat</option>
                    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=3&kat=13">1 kat</option>
                    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=3&kat=14">2 kat</option>
                    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=3&kat=15">3 kat</option>


                </select>






            </div><!-- /.col-lg-2 -->


            <div class="col-lg-2">

                <div class=" card-cover h-100 overflow-hidden rounded-5 shadow-lg stnc-card"
                    style="background-color: #7066D1;">
                    <div class="d-flex flex-column h-100  text-white text-center text-shadow-1">
                        <h2 class="pt-5  display-6 lh-1 fw-bold text-center "
                            style="color:#4A3EA5  ;  font-size: 100px;">4. </h2>
                        <h3 class="pt-3 mt-3 lh-1 fw-bold text-center ">Bina </h3>

                        <div class="d-flex list-unstyled mt-auto ">
                            <svg class="bd-placeholder-img rounded-circle mt-auto" width="140" height="140"
                                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                                preserveAspectRatio="xMidYMid slice" focusable="false">

                                <rect width="100%" height="100%" fill="#fff"></rect>
                                <text x="10%" y="40%" fill="#7066D1" dy=".3em" font-size="3.5em"
                                    font-weight="bold">25</text>
                                <text x="60%" y="45%" fill="#7066D1" dy=".3em " font-size="1.5em"> ofis</text>

                                <text x="25%" y="75%" fill="#7066D1" dy=".3em" font-size="2em"
                                    font-weight="bold">BOS</text>

                                <!-- <text x="20%" y="55%" fill="#7066D1" dy=".3em" font-size="2em" font-weight="bold">DOLU</text> -->
                            </svg>
                        </div>


                    </div>
                </div>


                <br>

                <select class="form-select form-select-sm" style="width: 130px;" aria-label=".form-select-sm example"
                    onchange="javascript:handleSelect(this)">
                    <option value="">kat seciniz</option>
                    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=4&kat=16">bodrum kat</option>
                    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=4&kat=17">zemin kat</option>
                    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=4&kat=18">1 kat</option>
                    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=4&kat=19">2 kat</option>
                    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=4&kat=20">3 kat</option>


                </select>






            </div><!-- /.col-lg-2 -->


            <div class="col-lg-2">

<div class=" card-cover h-100 overflow-hidden rounded-5 shadow-lg stnc-card"
    style="background-color: #7066D1;">
    <div class="d-flex flex-column h-100  text-white text-center text-shadow-1">
        <h2 class="pt-5  display-6 lh-1 fw-bold text-center "
            style="color:#4A3EA5  ;  font-size: 100px;">5. </h2>
        <h3 class="pt-3 mt-3 lh-1 fw-bold text-center ">Bina </h3>

        <div class="d-flex list-unstyled mt-auto ">
            <svg class="bd-placeholder-img rounded-circle mt-auto" width="140" height="140"
                xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140"
                preserveAspectRatio="xMidYMid slice" focusable="false">

                <rect width="100%" height="100%" fill="#fff"></rect>
                <text x="10%" y="40%" fill="#7066D1" dy=".3em" font-size="3.5em"
                    font-weight="bold">25</text>
                <text x="60%" y="45%" fill="#7066D1" dy=".3em " font-size="1.5em"> ofis</text>

                <text x="25%" y="75%" fill="#7066D1" dy=".3em" font-size="2em"
                    font-weight="bold">BOS</text>

                <!-- <text x="20%" y="55%" fill="#7066D1" dy=".3em" font-size="2em" font-weight="bold">DOLU</text> -->
            </svg>
        </div>


    </div>
</div>


<br>

<select class="form-select form-select-sm" style="width: 130px;" aria-label=".form-select-sm example"
    onchange="javascript:handleSelect(this)">
    <option value="">kat seciniz</option>
    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=5&kat=21">bodrum kat</option>
    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=5&kat=22">zemin kat</option>
    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=5&kat=23">1 kat</option>
    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=5&kat=24">2 kat</option>
    <option value="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=5&kat=25">3 kat</option>


</select>






</div><!-- /.col-lg-2 -->


        </div>


    </div>


</main>

<script type="text/javascript">
function handleSelect(elm) {
    window.location = elm.value;
}
</script>
<footer class="footer mt-auto py-3 bg-light stnc-footer">
    <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </div>
</footer>

<?php

}