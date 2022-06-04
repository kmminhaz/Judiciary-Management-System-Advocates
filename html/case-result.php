<?php include('./php/navbar.php') ?>
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-5 align-self-center">
              <h4 class="page-title">Files Table</h4>
            </div>
            <div class="col-7 align-self-center">
              <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Basic Table
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
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">All Case Files</h4>
                  <form method="POST" action="">
                    <div class="container px-5 input-group mb-3">
                      <input type="text" class="form-control" placeholder="Search By Case ID" name="searchText" value="">
                      <button class="input-group-text" id="basic-addon2" name="search">Search</button>
                    </div>
                  </form>
                </div>
                <?php

                  if(isset($_POST['search'])){
                    $searchText = $_POST['searchText'];
                    $sql = "SELECT `caseId`, `caseType`, `courtName`, `caseStatus`, `Date` FROM `case_summery` WHERE `plaintiffAdvocateId` = '{$_SESSION['advocateId']}' OR `diffendentAdvocateId` = '{$_SESSION['advocateId']}' AND `caseId` LIKE '$searchText' OR `caseType` LIKE '$searchText' OR `courtName` LIKE '$searchText' OR `caseStatus` LIKE '$searchText' OR `Date` LIKE '$searchText' ORDER BY caseId";
                    ?>
                    <form method="POST" action="">
                      <div class="d-flex justify-content-center pb-4">
                        <button
                          class="btn btn-primary"
                          name="submit">
                          <span>Load All Cases</span>
                      </button>
                      </div>
                    </form>
                    <?php
                  }
                  else{
                    $sql = "SELECT `caseId`, `caseType`, `courtName`, `caseStatus`, `Date` FROM `case_summery` WHERE `plaintiffAdvocateId` = '{$_SESSION['advocateId']}' OR `diffendentAdvocateId` = '{$_SESSION['advocateId']}' ORDER BY caseId";
                  }
                  $res = mysqli_query($conn, $sql);
                ?>
                <div class="table-responsive">
                  <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" class="text-center">
                          CASE ID
                        </th>
                        <th scope="col" class="text-center">CASE TYPE</th>
                        <th scope="col" class="text-center">COURT NAME</th>
                        <th scope="col" class="text-center">STATUS</th>
                        <th
                          scope="col"
                          class="text-center"
                        >
                          DATE
                        </th>
                        <th scope="col" class="text-center">OPTION</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        while($rows = mysqli_fetch_object($res)){
                          ?>
                          <tr>
                            <th scope="row" class="text-center"><?php echo $rows->caseId; ?></th>
                            <td class="text-center"><?php echo $rows->caseType; ?></td>
                            <td class="text-center"><?php echo $rows->courtName; ?></td>
                            <td class="text-center"><?php echo $rows->caseStatus; ?></td>
                            <td class="text-center">
                              <?php echo $rows->Date; ?>
                            </td>
                            <td class="text-center">
                              <a class="m-1 btn btn-primary btn" href="<?php echo SITEURL ?>html/official-case-summery.php?id=<?php echo $rows->caseId; ?>" role="button">
                                View Details
                              </a>
                            </td>
                          </tr>
                          <?php
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
<?php include('./php/footer.php') ?>

<?php
  if(isset($_POST['submit'])){
    ?>
      <script type="text/javascript">
          window.location.href = '<?php echo SITEURL; ?>html/case-result.php';
      </script>
    <?php
  }
?>