<?php include('../html/config/connection.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>advocates Portal</title>
    <!-- Bootstrap CSS Link -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="../style.css" />

    <!-- Font Awsome Icon -->
    <script
      src="https://kit.fontawesome.com/f87a50e4b9.js"
      crossorigin="anonymous"
    ></script>
</head>
<body>
    <section class="darkShade">
      <div class="container py-5">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem">
              <div class="card-body p-5 text-center">
                <div class="mb-md-5 mt-md-4 pb-5">
                  <h2 class="fw-bold mb-2 text-uppercase">advocate Login</h2>
                  <p class="text-white-50 mb-5">
                    Please enter your login and advocateId!
                  </p>

                <?php
                    if (isset($_SESSION['login'])) {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }
                ?>

                  <form method="POST" action="">

                    <div class="form-outline form-white mb-4">
                        <input
                        type="email"
                        id="typeEmailX"
                        class="form-control form-control-lg text-center"
                        name="advocateEmail"
                        />
                        <label class="form-label" for="typeEmailX">Enter Your Govt. advocate Email</label>
                        <br/><br/>
                        <input
                        type="text"
                        id="typeEmailX"
                        class="form-control form-control-lg text-center"
                        name="advocateId"
                        />
                        <label class="form-label" for="typeEmailX">Enter Your Govt. advocate ID</label>
                    </div>

                    <button
                        class="btn btn-outline-light btn-lg px-5"
                        role="button"
                        type="submit"
                        name="submit"
                    >
                        Submit
                    </button>

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
// Check if the submit button is clicked or not
if (isset($_POST['submit'])) {
    // echo "The button is clicked";
    $advocateEmail = $_POST['advocateEmail'];
    $advocateId = $_POST['advocateId'];

    $sql = "SELECT * FROM `advocate_profile` WHERE `email`='$advocateEmail' AND `advocateId`='$advocateId' ";

    // echo $sql;

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if ($count == 1) {
        $setPass = uniqid();
        $passOnHash = md5($setPass);

        $sqlupdate = "UPDATE `advocate_profile` SET `password`='$passOnHash' WHERE `advocateId`='$advocateId'";

        $resupdate = mysqli_query($conn, $sqlupdate) or die(mysqli_connect_error());

        if($resupdate){
            $subject = "An email for forgot password from your Judiciary Management System";
            $body = "Your New Password is $setPass \n Go to http://localhost/projects/Defence/advocate/ for login";
            $headers = "From: km3009721@gmail.com";

            if (mail($advocateEmail, $subject, $body, $headers)) {
                // echo "An Email has been sent to $advocateEmail for your password reset";
                $_SESSION['login'] = "<div class='text-success text-center py-3'> <strong> An Email has been sent to $advocateEmail </strong> </div>";
          ?>
                <script type="text/javascript">
                    window.location.href = '<?php echo SITEURL; ?>html/forgot-password.php';
                </script>
          <?php
            } else {
                $_SESSION['login'] = "<div class='text-danger text-center py-3'> <strong> Email Sending Failed ... </strong> </div>";
          ?>
                <script type="text/javascript">
                    window.location.href = '<?php echo SITEURL; ?>html/forgot-password.php';
                </script>
          <?php
            }
        }
?>
    <?php
    } else {
        // header('location: ' . SITEURL . 'admin/login.php');
        $_SESSION['login'] = "<div class='text-danger text-center py-3'>Advocate Email or AdvocateId is wrong</div>";
    ?>
        <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>html/forgot-password.php';
        </script>
<?php
    }
}
?>