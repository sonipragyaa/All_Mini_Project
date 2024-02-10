<?php include "header.php"; ?>
  <div id="admin-content">
      <div class="container">
         <div class="row">
             <div class="col-md-12">
                 <h1 class="admin-heading">Website settings</h1>
             </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form -->
                  <?php
                 include "config.php";
                     $sql = "select * from settings";

                    $result = mysqli_query($conn,$sql) or die ("query failed.");

                    if(mysqli_num_rows($result) > 0 ){
                     while($row = mysqli_fetch_assoc($result)){
                    ?>
                  <form  action="save-setting.php" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                          <label for="post_title">Website name</label>
                          <input type="text" name="website_name" value="<?php echo $row['websitename'];?>" class="form-control" autocomplete="off" required>
                      </div>
                      <div class="form-group">
                          <label for="logo">Website logo</label>
                          <input type="file" name="logo">
                          <img src="<?php echo $row['logo'];?>">
                          <input type = "hidden" name="old_logo" value="<?php echo $row['logo'];?>">
                      </div>
                      <div class="form-group">
                          <label for="footer_Desc"> Description</label>
                          <textarea name="webdesc"  class="form-control" rows="5"  required><?php echo $row['description'];?>"</textarea>
                      </div>
                      <input type="submit" name="submit" class="btn btn-primary" value="Save" required />
                  </form>
                  <?php
                    }
                    }?>
                  <!--/Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>