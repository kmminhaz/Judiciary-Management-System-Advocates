<?php include('./html/config/connection.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>advocate Portal</title>
    <!-- Bootstrap CSS Link -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="./style.css" />

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
                  <h2 class="fw-bold mb-2 text-uppercase">advocate Portal</h2>
                  <p class="text-white-50 mb-5">
                    Please enter your login and password!
                  </p>

                  <?php
                    if (isset($_SESSION['login'])) {
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                      }
                  ?>
                  <?php
                    if (isset($_SESSION['not-logedin-message'])) {
                        echo $_SESSION['not-logedin-message'];
                        unset($_SESSION['not-logedin-message']);
                      }
                  ?>
                  <?php
                    if (isset($_SESSION['login_request'])) {
                        echo $_SESSION['login_request'];
                        unset($_SESSION['login_request']);
                      }
                  ?>

                <form method="POST" action="">
                  <div class="form-outline form-white mb-4">
                    <input
                      type="email"
                      id="typeEmailX"
                      class="form-control form-control-lg"
                      name="advocateEmail"
                    />
                    <label class="form-label" for="typeEmailX">Enter your Email Address</label>
                  </div>

                  <div class="form-outline form-white mb-4">
                    <input
                      type="password"
                      id="typePasswordX"
                      class="form-control form-control-lg"
                      name="password"
                    />
                    <label class="form-label" for="typePasswordX"
                      >Password</label
                    >
                  </div>

                  <p class="small mb-5 pb-lg-2">
                    <a class="text-white-50" href="./html/forgot-password.php">Forgot password?</a>
                  </p>

                  <button
                    class="btn btn-outline-light btn-lg px-5"
                    role="button"
                    type="submit"
                    name="submit"
                  >
                    Login
                  </button>
                  <br><br>
                  <a
                    class="btn btn-outline-light btn-lg px-5 py-2"
                    role="button"
                    type="submit"
                    href="./html/registration.php"
                  >
                    Registration
                  </a>
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
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM `advocate_profile` WHERE `email`='$advocateEmail' AND `password`='$password' ";

    $res = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($res);

    if ($count == 1) {
      $rows = mysqli_fetch_array($res);
        $_SESSION['login'] = "<div class='text-success'><strong?>Login Successful</strong></div>";
        $_SESSION['user'] = $rows['email'];
        $_SESSION['advocateId'] = $rows['advocateId'];
    ?>
        <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>html/dashboard.php';
        </script>
    <?php
    } else {
        $_SESSION['login'] = "<div class='text-danger text-center'>advocateEmail or password is wrong</div>";
    ?>
        <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>';
        </script>
<?php
    }
}
?>