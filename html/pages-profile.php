<?php include('./php/navbar.php') ?>
<?php 
  $sql = "SELECT * FROM advocate_profile
  WHERE email='{$_SESSION['user']}' and advocateId={$_SESSION['advocateId']}";
$res = mysqli_query($conn, $sql);
$rows = mysqli_fetch_object($res);

  //echo "<pre>";
  //print_r($rows);
 //echo $rows->full_name;
?>

        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-5 align-self-center">
              <h4 class="page-title">Profile</h4>
            </div>
            <div class="col-7 align-self-center">
              <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Profile
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
            <?php 
              if (isset($_SESSION['profile'])) {
                  echo $_SESSION['profile'];
                  unset($_SESSION['profile']);
              }
            ?>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <!-- Row -->
          <div class="row">
            <!-- Column -->
            <div class="col-lg-4 col-xlg-3">
              <div class="card">
                <div class="card-body">
                  <center class="mt-4">
                      <img
                        src="../assets/images/advocateProfileImage/<?php echo $rows->image ?>"
                        class="rounded-circle"
                        width="150"
                        height="150"
                      />
                      <br>
                      <div>
                        <button type="button" class="btn btn-white" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          <span> Upload Image </span>
                        </button>
                        <!-- Modal -->
                        <form method="POST" action="" enctype="multipart/form-data">
                          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Upload Your File</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <label for="">Chose your image here</label> <br> <br>
                                  <input id="img" type="file" name="img" value="" require>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button id="submit" type="submit" name="uploadImage" value="upload" class="btn btn-primary">Submit</button>
                                </div>
                              </div>
                            </div>
                          </div>
                        </form>
                    </div>
                    <h4 class="card-title mt-2">
                      <?php if(isset($rows->full_name) && !empty($rows->full_name)) { echo $rows->full_name; } ?>
                    </h4>
                  </center>
                </div>
                <div>
                  <hr />
                </div>
                <div class="card-body">
                  <small class="text-muted">Email address </small>
                  <h6><?php if(isset($rows->full_name) && !empty($rows->full_name)) { echo $rows->email; } ?></h6>
                  <small class="text-muted pt-4 db">Phone</small>
                  <h6><?php if(isset($rows->full_name) && !empty($rows->full_name)) { echo $rows->phoneNo; } ?></h6>
                  <small class="text-muted pt-4 db">Address</small>
                  <h6><?php if(isset($rows->full_name) && !empty($rows->full_name)) { echo $rows->address; } ?></h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-8 col-xlg-9">
              <div class="card">
                <div class="card-body">
                  <form method="POST" action=""
                   class="form-horizontal form-material mx-2">
                    <div class="form-group py-1">
                      <label class="col-md-12">Advocate Id</label>
                      <div class="col-md-12">
                        <input
                          type="text"
                          class="form-control form-control-line"
                          name="advocateId"
                          readonly="readonly"
                          value="<?php if(isset($rows->advocateId)) { echo $rows->advocateId; } ?>"
                        />
                      </div>
                    </div>
                    <div class="form-group py-1">
                      <label class="col-md-12">Full Name</label>
                      <div class="col-md-12">
                        <input
                          type="text"
                          class="form-control form-control-line"
                          name="full_name"
                          value="<?php if(isset($rows->full_name) && !empty($rows->full_name)) { echo $rows->full_name; } ?>"
                        />
                      </div>
                    </div>
                    <div class="form-group py-1">
                      <label class="col-md-12">Address</label>
                      <div class="col-md-12">
                        <input
                          type="text"
                          class="form-control form-control-line"
                          name="advocateAddress"
                          value="<?php if(isset($rows->full_name) && !empty($rows->full_name)) { echo $rows->address; } ?>"
                        />
                      </div>
                    </div>
                    <div class="form-group py-1">
                      <label class="col-md-12">Phone No</label>
                      <div class="col-md-12">
                        <input
                          type="text"
                          class="form-control form-control-line"
                          name="phoneNo"
                          value="<?php if(isset($rows->full_name) && !empty($rows->full_name)) { echo $rows->phoneNo; } ?>"
                        />
                      </div>
                    </div>
                    <div class="form-group py-1">
                      <label for="example-email" class="col-md-12">Advocate Email</label>
                      <div class="col-md-12">
                        <input
                          type="email"
                          class="form-control form-control-line"
                          name="advocateEmail"
                          readonly="readonly"
                          value="<?php if(isset($rows->full_name) && !empty($rows->full_name)) { echo $rows->email; } ?>"
                        />
                      </div>
                    </div>
                    <div class="form-group py-1">
                      <label class="col-md-12">Password</label>
                      <div class="col-md-12">
                        <input
                          type="password"
                          class="form-control form-control-line"
                          name="password"
                        />
                      </div>
                    </div>
                    <div class="form-group py-1">
                      <label class="col-sm-12">Country</label>
                      <div class="col-sm-12">
                        <h3><strong>Bangladesh</strong></h3>
                      </div>
                    </div>
                    <div class="form-group py-1">
                      <div class="col-sm-12">
                        <button 
                        class="btn btn-success text-white"
                        role="button"
                        type="submit"
                        name="submit">
                          Update Profile
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Column -->
          </div>
          <!-- Row -->
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
<?php include('./php/footer.php') ?>

<?php
// Check if the submit button is clicked or not
if (isset($_POST['submit'])) {
    // echo "The button is clicked";
    $full_name = $_POST['full_name'];
    $advocateAddress = $_POST['advocateAddress'];
    $phoneNo = $_POST['phoneNo'];
    $password = md5($_POST['password']);

    $sql = "UPDATE `advocate_profile` SET `full_name`='$full_name', `address`='$advocateAddress', `phoneNo`='$phoneNo', `password`='$password' WHERE `advocateId`={$_SESSION['advocateId']}";

    $res = mysqli_query($conn, $sql) or die(mysqli_connect_error());
    if($res){

    $_SESSION['profile'] = "<div class='text-success text-center'> <strong>Your profile has been updated</strong> </div>";
    ?>
        <script type="text/javascript">
                window.location.href = '<?php echo SITEURL; ?>html/pages-profile.php';
            </script>
    <?php
    }else{

      $_SESSION['profile'] = "<div class='text-danger text-center'> <strong>Your profile has not been updated</strong> </div>";
    ?>
        <script type="text/javascript">
                window.location.href = '<?php echo SITEURL; ?>html/pages-profile.php';
            </script>
    <?php
    }
}

if(isset($_POST['uploadImage'])){
  $img = $_FILES['img']['name'];
  $img_type=$_FILES['img']['type'];
  $img_size=$_FILES['img']['size'];
  $img_tem_loc=$_FILES['img']['tmp_name'];
  $img_store="../assets/images/advocateProfileImage/$img";
  move_uploaded_file($img_tem_loc, $img_store);

  $sql="UPDATE `advocate_profile` SET `image` = '$img' WHERE email='{$_SESSION['user']}' and advocateId={$_SESSION['advocateId']}";
  $query=mysqli_query($conn,$sql);
  if($query){

    $_SESSION['profile'] = "<div class='text-success text-center'> <strong>Your profile image has been updated</strong> </div>";
  
    ?>
        <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>html/pages-profile.php';
        </script>
    <?php
    }else{

      $_SESSION['profile'] = "<div class='text-danger text-center'> <strong>Your profile image has not been added</strong> </div>";
    ?>
        <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>html/pages-profile.php';
        </script>
    <?php
    }
}
?>