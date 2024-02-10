<?php include "header.php";

if(isset($_POST['save'])){
    $conn= mysqli_connect("localhost","root","","news-site")or die("connection fialed");


    $category_name = $_POST['cat'];

    $sql = "select category_name from  category where category_name ='{$category_name}'";

    $result = mysqli_query($conn, $sql) or die("query failed");

    if(mysqli_num_rows($result) > 0) {

    echo "<p style='color:red,text-align:center;margin 10px 0;'>username already exist</p>";
   
    }else{
    $sql1 = "insert into category(category_name)
     values('{$category_name}')";
   
    if(mysqli_query($conn,$sql1)){
    header("Location: category.php");
    }
  }
}?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add New Category</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                      <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" name="cat" class="form-control" placeholder="Category Name" required>
                      </div>
                      <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                  </form>
                  <!-- /Form End -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
