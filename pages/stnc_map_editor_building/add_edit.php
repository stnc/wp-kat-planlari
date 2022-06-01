<?php include("_header-show.php") ?>
<main class="flex-shrink-0" style="margin-top:88px">
  <div class="container-fluid"> 
    <?php if (isset($_SESSION['stnc_map_flash_msg'] )) { ?> <p class="alert alert-success"> <?php echo $_SESSION['stnc_map_flash_msg']; ?> 
    </p> <?php unset($_SESSION['stnc_map_flash_msg']); ?> <?php } ?> <div>
      <span style="color:red"> <?php echo $tekno_id ?>. Bina / <?php echo $katadi ?> </span> için firma <?php  echo $title?> işlemi
    </div> <?php echo $form  ?> <div class="row">
      <div class="col-md-4">
        <div class="form-group">
        
          <input type="hidden" value="
										<?php echo $id ?>" name="id" id="id">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Firma <?php  echo $title?> </h5>
              <div class="form-group">
                <label for="company_name">name</label>
                <input type="text" name="name" value="<?php echo $name ?>" class="form-control" id="name" min="1" max="50">
              </div>

              <div class="form-group">
                <label for="company_name">Toplam Alan</label>
                <input type="text" name="total_area" value="<?php echo $total_area ?>" class="form-control" id="total_area" min="1" max="50">
              </div>


              <div class="form-group">
                <label for="company_name">Dolu  Alan</label>
                <input type="text" name="full_area" value="<?php echo $full_area ?>" class="form-control" id="full_area" min="1" max="50">
              </div>


              <div class="form-group">
                <label for="company_name">Boş Alan</label>
                <input type="text" name="empty_area" value="<?php echo $empty_area ?>" class="form-control" id="empty_area" min="1" max="50">
              </div>



              <hr>
            </div>
          </div>
          <div class="form-group">
          <input id="stnc_wp_kiosk_Metabox_video_extra" class="page_upload_trigger_element btn btn-danger" name="stnc_wp_kiosk_Metabox_video_extra" type="button" value="Harita Yükle / Seç" style="">

          </div>
          <br>
          <div class="form-group">
            <button type="submit" value="Kaydet" class="btn btn-success">Kaydet</button>
          </div>
        </div>
      </div>
      <div class="col-md-8"> 
         <input type="hidden" value="<?php echo $scheme_media_id ?>" name="media_id" id="media_id">
        <?php  if ((isset($_GET['st_trigger'])) && ($_GET['st_trigger'] === 'show')) :  ?> 
        <div class="background_attachment_metabox_container">
          <img  class="img-fluid" src="<?php echo $scheme_media_data[0]; ?> " alt="">
        </div> 
        <?php else : ?> 
          <div class="background_attachment_metabox_container"></div> <?php endif ; ?> </div>
    </div>
  </div>
  </div> 
  <?php echo   '</form>' ?> 
</div>
</main>