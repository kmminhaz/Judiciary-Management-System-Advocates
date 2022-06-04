<?php include('./config/connection.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advocate Portal</title>
    <!-- Bootstrap CSS Link -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="registration.css" />

    <!-- Font Awsome Icon -->
    <script
      src="https://kit.fontawesome.com/f87a50e4b9.js"
      crossorigin="anonymous"
    ></script>
</head>
<body class="darkShade">
<section class="bg-image" style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h4 class="text-center mb-5">Request for an <span class="text-uppercase fw-bold fs-3">Advocate Account</span></h4>

              <form method="POST" action="" enctype="multipart/form-data">

                <?php
                    if (isset($_SESSION['login_request'])) {
                        echo $_SESSION['login_request'];
                        unset($_SESSION['login_request']);
                    }
                ?>

                <div class="form-outline mb-2">
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="name" />
                  <label class="form-label" for="form3Example1cg">Your Name</label>
                </div>

                <div class="form-outline mb-2">
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="address" />
                  <label class="form-label" for="form3Example1cg">Your Address</label>
                </div>

                <div class="form-outline mb-2">
                  <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="phoneNo"/>
                  <label class="form-label" for="form3Example1cg">Phone No</label>
                </div>

                <div class="form-outline mb-2">
                  <input id="pdf" type="file" name="pdf" value="" require class="form-control form-control-lg"/>
                  <label class="form-label" for="form3Example3cg">Upload an image of your LLB certification</label>
                </div>

                <div class="form-outline mb-2">
                  <input type="emailAddress" id="form3Example3cg" class="form-control form-control-lg" name="emailAddress"/>
                  <label class="form-label" for="form3Example3cg">Your EmailAddress</label>
                </div>

                <div class="form-outline mb-2">
                  <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password"/>
                  <label class="form-label" for="form3Example4cg">Password</label>
                </div>

                <div class="form-outline mb-2">
                  <input type="password" id="form3Example4cdg" class="form-control form-control-lg" name="rePassword"/>
                  <label class="form-label" for="form3Example4cdg">Repeat your password</label>
                </div>

                <div class="form-check d-flex justify-content-center mb-5 p-3">
                  <input
                    class="form-check-input me-2"
                    type="checkbox"
                    value=""
                    id="form2Example3cg"
                    name="termsCondition"
                  />
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <button type="submit" name="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="../index.php" class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- Boostrap JS Link -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"
    ></script>
</body>
</html>

<?php
    if(isset($_POST['submit'])){
      $pdf = $_FILES['pdf']['name'];
      $pdf_type=$_FILES['pdf']['type'];
      $pdf_size=$_FILES['pdf']['size'];
      $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
      $pdf_store="../../Assets/General Pdf/$pdf";
      move_uploaded_file($pdf_tem_loc,$pdf_store);

        $name = $_POST['name'];
        $address = $_POST['address'];
        $phoneNo = $_POST['phoneNo'];
        $emailAddress = $_POST['emailAddress'];
        $password = $_POST['password'];
        $rePassword = $_POST['rePassword'];
        $termsCondition = $_POST['termsCondition'];

        $sql = "INSERT INTO `advocate_access_request` (`name`, `address`, `phoneNo`, `emailAddress`, `llbCertification`, `password`, `termsCondition`) 
                VALUES ('$name', '$address', '$phoneNo', '$emailAddress', '$pdf', '$password', '$termsCondition')";
                
        echo $sql;

        $res = mysqli_query($conn, $sql);

        if($res){
            if($password == $rePassword){
                
                $_SESSION['login_request'] = "<div class='text-success'><strong> Your request for login is sent to Admin. <br> you will be informed in 24 hours by email </strong></div>";
                ?>
                    <script type="text/javascript">
                        window.location.href = '<?php echo SITEURL; ?>';
                    </script>
                <?php
            }
        }else{
            $_SESSION['login_request'] = "<div class='text-danger'><strong> Your request for login is not sent to Admin. <br> Try again with valid information </strong></div>";
            ?>
                <script type="text/javascript">
                    window.location.href = '<?php echo SITEURL; ?>html/registration.php';
                </script>
            <?php
        }
        
    }
?>
