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
                        <a class="nav-link" href="/wp-admin/admin.php?page=stncFullPage">Tümünü göster</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="/wp-admin/admin.php?page=stncEditorHarita&add=ok&teknoId=<?php echo $_GET['binaid']?>">yeni
                            ekle</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/wp-admin/admin.php?page=stncSabitHarita">sabit harita</a>
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


        <?php if ((isset($_GET['edit'])) || (isset($_GET['add']))  ) : ?>
        <?php 
                        //   $form='<form action="/wp-admin/admin.php?page=stncEditorHarita" method="post"> ';
                         if ((isset($_GET['add']))  ) : 
                            $title=' <h5 class="card-title">Firma Ekleme</h5>';
                            endif ?>

                  <form action="/wp-admin/admin.php?page=stncEditorHarita&binaid=<?php echo $_GET['binaid'] ?>&kat=<?php echo $_GET['kat'] ?>" method="post">
                         

        <div class="row">

            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">

                        <?php    echo $title  ?>


                        <div class="form-group">
                            <label for="door_number">Kapi  Numarasi</label>
                            <input type="number" name="door_number" value="<?php echo $door_number ?>" class="form-control"
                                id="door_number" min="1" max="50">
                            <small id="kat_numarasiHelp" class="form-text text-muted">kat numarasi sayisal
                                olmalidir</small>
                        </div>
                        <hr>
                        <div class="form-group">
                            <label for="company_name">Firma adi</label>
                            <input type="text" name="company_name" value="<?php echo $company_name ?>"
                                class="form-control" id="company_name" min="1" max="50">
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="square_meters">Bina metrekare</label>
                            <input type="text" name="square_meters" value="<?php echo $square_meters ?>"
                                class="form-control" id="square_meters" min="1" max="50">
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="email">Firma email adresi</label>
                            <input type="text" name="email" value="<?php echo $email ?>" class="form-control"
                                id="email">
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="phone">Firma telefon </label>
                            <input type="text" name="phone" value="<?php echo $phone ?>" class="form-control"
                                id="phone">
                        </div>





                    </div>
                </div>

            </div>



            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                 
                        <div class="form-group">
                            <label for="mobile_phone">Firma cep telefon </label>
                            <input type="text" name="mobile_phone" value="<?php echo $mobile_phone ?>"
                                class="form-control" id="mobile_phone">
                        </div>

                        <hr>

                        <div class="form-group">
                            <label for="web_site">Firma WEB sitesi </label>
                            <input type="text" name="web_site" value="<?php echo $web_site ?>" class="form-control"
                                id="web_site">
                        </div>
                        <hr>

                        <div class="form-group">
                            <label for="company_description">Firma hakkında detaylı bilgi </label>
                            <textarea class="form-control" name="company_description" id="company_description"
                                rows="3"><?php echo $company_description ?></textarea>
                        </div>

                        <hr>
                        <div class="form-group">
                            <label for="address">adress</label>
            
                                <textarea class="form-control" name="address" id="address"       rows="3"><?php echo $address ?></textarea>
                        </div>
                        <hr>

                        <div class="form-group">
                            <input type="hidden" value="<?php echo $media_id ?>" name="media_id" id="media_id">
                            <input id="stnc_wp_kiosk_Metabox_video_extra"
                                class="page_upload_trigger_element button button-primary button-large"
                                name="stnc_wp_kiosk_Metabox_video_extra" type="button" value="Video Yükle / Seç"
                                style="">
                            <br>
                            <div class="background_attachment_metabox_container"></div>
                        </div>


                        <button type="submit" value="Kaydet" class="btn btn-primary">Kaydet</button>


                    
                                
                        <input type="hidden" name="kaydet" value="yeniKaydet" />
                    



                    </div>
                </div>
            </div>

        </div>
        
     </form>
        <?php endif ?>








    </div>


</main>