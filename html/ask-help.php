<?php include('./php/navbar.php') ?>

<?php 
  $sql = "SELECT `full_name` FROM advocate_profile
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
              <h4 class="page-title my-4">Help Desk</h4>
            </div>
            <div class="col-7 align-self-center">
              <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Help Desk
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
          <?php 
            if (isset($_SESSION['help'])) {
                echo $_SESSION['help'];
                unset($_SESSION['help']);
            }
          ?>
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <form method="POST" action="">
            <div class="row">
              <div class="col-12">
                <div class="card card-body">
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label"
                      >Name</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="exampleFormControlInput1"
                      placeholder=" Write your name here"
                      value="<?php echo $rows -> full_name; ?>"
                      name="name"
                      readonly
                    />
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label"
                      >Designation</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="exampleFormControlInput1"
                      placeholder="Write your designation here"
                      readonly
                      value="advocate"
                      name="designation"
                    />
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label"
                      >Portal ID</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="exampleFormControlInput1"
                      placeholder="Write the provided ID of your portal here"
                      readonly
                      name="id"
                      value="<?php echo $_SESSION['advocateId'] ?>"
                    />
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label"
                      >Email address</label
                    >
                    <input
                      type="email"
                      class="form-control"
                      id="exampleFormControlInput1"
                      placeholder="name@example.com"
                      value= <?php echo $_SESSION['user'] ?>
                      readonly
                      name="email"
                    />
                  </div>
                  <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label"
                      >Your Query</label
                    >
                    <textarea
                      class="form-control"
                      id="exampleFormControlTextarea1"
                      rows="3"
                      placeholder="Write Your Query Here"
                      name="myQuery"
                    ></textarea>
                  </div>
                </div>
            </div>
          </div>

          <button class="btn btn-primary" name="AskQuery" type="submit">
            Ask For Query
          </button>
          </form>
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
if(isset($_POST['AskQuery'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $designation = $_POST['designation'];
  $designationId = $_POST['id'];
  $query = $_POST['myQuery'];

  if($query != ''){
    $sql = "INSERT INTO `help_desk` (`name`, `email`, `designation`, `designationId`, `query`, `status`) 
    VALUES ('$name', '$email', '$designation', '$designationId', '$query', 'Unchecked')";
    $res = mysqli_query($conn, $sql);
    
    if($res){

      $_SESSION['help'] = "<div class='text-success text-center'> <strong>Thanks for your query, We will replay you soon</strong> </div>";
    
      ?>
          <script type="text/javascript">
              window.location.href = '<?php echo SITEURL; ?>html/ask-help.php';
          </script>
      <?php
      }else{

        $_SESSION['help'] = "<div class='text-danger text-center'> <strong>Your query is not sent, Try again</strong> </div>";
      ?>
          <script type="text/javascript">
              window.location.href = '<?php echo SITEURL; ?>html/ask-help.php';
          </script>
      <?php
    }
  }else{
    $_SESSION['help'] = "<div class='text-danger text-center'> <strong>Write your query first</strong> </div>";
    ?>
        <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>html/ask-help.php';
        </script>
    <?php
  }
}

?>