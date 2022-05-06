<?php
//get event trıgger 
//page=map_view_stnc & st_trigger === 'show' 

    
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
.fer {
    color:#fff;
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
.bg-black{
    background-color:#000;
    color:#fff;
}
</style>



<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-secondary fixed-top bg-black">
        <div class="container-fluid">
            <img class="d-block mx-auto mb-1"
                src="<?php
                
                $plugins_url = plugin_dir_url( __FILE__ ) ;
    
                echo $plugins_url ?>" alt="" width="100"
                height="50">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
               
                    <li class="nav-item">
                        <a class="nav-link" href="/wp-admin/admin.php?page=map_homepage_stnc">Bina Listesi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" st_trigger=new
                            href="/wp-admin/admin.php?page=map_editor_stnc&st_trigger=new&binaid=<?php echo $_GET['binaid']?>&kat=<?php echo $_GET['kat']?>">Yeni Firma Ekle</a>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="/wp-admin/admin.php?page=map_view_stnc&st_trigger=map_editor&binaid=<?php echo $_GET['binaid']?>&kat=<?php echo $_GET['kat']?>">Yerleşim Değiştir</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="http://summit.test/wp-admin/admin.php?page=building_map_editor_stnc&st_trigger=show&id=<?php echo $_GET['binaid']?>&kat=<?php echo $_GET['kat']?>">Harita Yükle</a>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown"
                            aria-expanded="false">Diğer Katlar</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                         <?php 
                    
                         foreach ($buildingsList as $building) : ?>
                            <li><a class="dropdown-item" href="/wp-admin/admin.php?page=map_view_stnc&st_trigger=show&binaid=<?php echo $_GET['binaid']?>&kat=<?php echo $building->id ?>"><?php echo $building->name ?></a></li>
                        <?php endforeach ?>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/wp-admin">Wordpess Panel</a>
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

