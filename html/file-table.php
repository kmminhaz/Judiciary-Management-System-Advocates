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
                      <a href="#">Home</a>
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
        <?php
          $sqlForAdvocateCaseId = "SELECT * FROM `advocate_case_study` ORDER BY id DESC LIMIT 1";
          $resForAdvocateCaseId = mysqli_query($conn, $sqlForAdvocateCaseId);
          $rowsForAdvocateCaseId = mysqli_fetch_array($resForAdvocateCaseId);

          $lastAdvocateCaseId = $rowsForAdvocateCaseId['id'];
          $AdvocateCaseId = $lastAdvocateCaseId + 1;
        ?>
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
                  <h4 class="card-title pb-4">All Case Files</h4>
                  <?php
                    if (isset($_SESSION['caseStudyMessage'])) {
                        echo $_SESSION['caseStudyMessage'];
                        unset($_SESSION['caseStudyMessage']);
                      }
                  ?>
                  <?php
                    if (isset($_SESSION['firstAdvCaseStudyMessage'])) {
                        echo $_SESSION['firstAdvCaseStudyMessage'];
                        unset($_SESSION['firstAdvCaseStudyMessage']);
                      }
                  ?>
                  <?php
                    if (isset($_SESSION['secondAdvCaseStudyMessage'])) {
                        echo $_SESSION['secondAdvCaseStudyMessage'];
                        unset($_SESSION['secondAdvCaseStudyMessage']);
                      }
                  ?>
                  <?php
                    if (isset($_SESSION['thiredAdvCaseStudyMessage'])) {
                        echo $_SESSION['thiredAdvCaseStudyMessage'];
                        unset($_SESSION['thiredAdvCaseStudyMessage']);
                      }
                  ?>
                  <?php
                    if (isset($_SESSION['delete'])) {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                      }
                  ?>
                  <?php
                    if (isset($_SESSION['update'])) {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                      }
                  ?>

                  <form method="POST" action="">
                    <div class="container px-5 input-group mb-3">
                      <input type="text" class="form-control" placeholder="Search By Case ID" name="searchText" value="">
                      <button class="input-group-text" id="basic-addon2" name="search">Search</button>
                    </div>
                  </form>

                  <!-- section -->
                  <?php

                  if(isset($_POST['search'])){
                    $searchText = $_POST['searchText'];
                    $sql = "SELECT `id`, `caseId`, `caseType`, `plaintiffName`, `diffendentName`, `fileStored` FROM `advocate_case_study` WHERE (`advocateId` = '{$_SESSION['advocateId']}') AND (`caseId` LIKE '$searchText' OR `caseType` LIKE '$searchText' OR `plaintiffName` LIKE '$searchText' OR `diffendentName` LIKE '$searchText' OR `fileStored` LIKE '$searchText') ORDER BY id DESC";
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
                    $sql = "SELECT `id`, `caseId`, `caseType`, `plaintiffName`, `diffendentName`, `fileStored` FROM `advocate_case_study` WHERE `advocateId` = '{$_SESSION['advocateId']}' ORDER BY id DESC";
                  }
                  $res = mysqli_query($conn, $sql);
                ?>
                </div>

                <!-- Creat a Case Study -->

                <div class="py-3">
                  <button type="button" class="btn btn-outline-primary mx-3" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                    <i class="mdi mdi-folder-plus fs-1"></i> <br />
                    <span>Create A Case Study</span>
                  </button>
                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <form method="POST" action="">
                      <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                          <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add a Case Study</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-12">
                                    <div class="card">
                                      <div class="card-body">
                                        <label class="col-md-12">Case ID</label>
                                          <div class="col-md-12">
                                            <input
                                              type="text"
                                              class="form-control form-control-line"
                                              name="caseId"
                                              value=<?php echo $AdvocateCaseId ?>
                                              readonly
                                            />
                                          </div>
                                        <label class="col-md-12 pt-4">Case Title</label>
                                                <div class="col-md-12">
                                                  <input
                                                    type="text"
                                                    class="form-control form-control-line"
                                                    name="caseTitle"
                                                  />
                                                </div>
                                        <label class="col-md-12 pt-4">Case Type</label>
                                                <div class="col-md-12">
                                                  <input
                                                    type="text"
                                                    class="form-control form-control-line"
                                                    name="caseType"
                                                  />
                                                </div>
                                        <label class="col-md-12 pt-4">File Store</label>
                                                <div class="col-md-12">
                                                  <input
                                                    type="text"
                                                    class="form-control form-control-line"
                                                    name="fileStore"
                                                  />
                                                </div>
                                        <label class="col-md-12 pt-4">Court Name</label>
                                                <div class="col-md-12">
                                                  <input
                                                    type="text"
                                                    class="form-control form-control-line"
                                                    name="courtName"
                                                  />
                                                </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-12">
                                    <div class="card">
                                      <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6 d-flex flex-column align-items-center">
                                                <h4 class="fw-bold">Plaintiff</h4>
                                                <label class="col-md-12 pt-4">Name</label>
                                                <div class="col-md-12">
                                                  <input
                                                    type="text"
                                                    class="form-control form-control-line"
                                                    name="plaintiffName"
                                                  />
                                                </div>
                                                <label class="col-md-12 pt-4">Address</label>
                                                <div class="col-md-12">
                                                  <input
                                                    type="text"
                                                    class="form-control form-control-line"
                                                    name="plaintiffAddress"
                                                  />
                                                </div>
                                                <label class="col-md-12 pt-4">Phone</label>
                                                <div class="col-md-12">
                                                  <input
                                                    type="text"
                                                    class="form-control form-control-line"
                                                    name="plaintiffPhone"
                                                  />
                                                </div>
                                            </div>
                                            <div class="col-lg-6 d-flex flex-column align-items-center">
                                                <h4 class="fw-bold">Defendent</h4>
                                                <label class="col-md-12 pt-4">Name</label>
                                                <div class="col-md-12">
                                                  <input
                                                    type="text"
                                                    class="form-control form-control-line"
                                                    name="diffendentName"
                                                  />
                                                </div>
                                                <label class="col-md-12 pt-4">Address</label>
                                                <div class="col-md-12">
                                                  <input
                                                    type="text"
                                                    class="form-control form-control-line"
                                                    name="diffendentAddress"
                                                  />
                                                </div>
                                                <label class="col-md-12 pt-4">Phone</label>
                                                <div class="col-md-12">
                                                  <input
                                                    type="text"
                                                    class="form-control form-control-line"
                                                    name="diffendentPhone"
                                                  />
                                                </div>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-12">
                                    <div class="card">
                                      <div class="card-body">
                                          <h3 class="fw-bold">Case Summary</h3>
                                            <div class="col-md-12">
                                              <textarea
                                                type="text"
                                                class="form-control form-control-line"
                                                name="caseSummary">
                                              </textarea>
                                            </div>
                                          <h3 class="fw-bold pt-4">Case Details</h3>
                                            <div class="col-md-12">
                                              <textarea
                                                type="text"
                                                class="form-control form-control-line"
                                                name="caseDetails">
                                              </textarea>
                                            </div>
                                      </div>
                                    </div>
                                  </div>

                                  <!-- Other Advocate -->

                                  <div class="col-12">
                                    <div class="card">
                                      <div class="card-body">
                                          <h3 class="fw-bold">Add Other Advocates</h3>
                                          <small class="text-danger">Note you Can add only three external advocate on your study</small>
                                            <div class="col-md-12">
                                              <div class="d-flex">
                                                <div class="m-3">
                                                  <h5>First Advocate</h5>
                                                  <input type="number" name="firstAdvocate"/>
                                                </div>
                                                <div class="m-3">
                                                  <h5>Second Advocate</h5>
                                                  <input type="number" name="secondAdvocate"/>
                                                </div>
                                                <div class="m-3">
                                                  <h5>Thired Advocate</h5>
                                                  <input type="number" name="thiredAdvocate"/>
                                                </div>
                                              </div>
                                            </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button id="submit" type="submit" name="submitSummery" value="upload" class="btn btn-primary">Submit</button>
                              </div>
                          </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class="thead-light">
                      <tr>
                        <th scope="col" class="border-end text-center">
                          Case ID
                        </th>
                        <th scope="col" class="text-center">Case Type</th>
                        <th scope="col" class="text-center">Plaintiff Name</th>
                        <th scope="col" class="text-center">Defendent Name</th>
                        <th scope="col" class="border-start border-end text-center">
                          File Location
                        </th>
                        <th scope="col" class="text-center">Options</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        while($rows = mysqli_fetch_object($res)){
                      ?>
                      <tr>
                        <th scope="row" class="border-end text-center"><?php echo $rows-> caseId; ?></th>
                        <td class="text-center"><?php echo $rows-> caseType; ?></td>
                        <td class="text-center"><?php echo $rows-> plaintiffName; ?></td>
                        <td class="text-center"><?php echo $rows-> diffendentName; ?></td>
                        <td class="border-start border-end text-center"><?php echo $rows-> fileStored; ?> Self</td>
                        <form method="POST" action="">
                          <td class="text-center">
                            <a class="m-1 btn btn-primary btn" href="<?php echo SITEURL ?>html/advocate-case-file.php?id=<?php echo $rows->caseId; ?>" role="button">
                              View
                            </a>
                            <a class="m-1 btn btn-success btn" href="<?php echo SITEURL ?>html/advocate-case-file-update.php?id=<?php echo $rows->caseId; ?>" role="button">
                              Update
                            </a>
                            <a onclick="return confirm('Are you sure, You want to delete this case study');" class="m-1 btn btn-danger btn" href="<?php echo SITEURL ?>html/file-table.php?btn=delete&id=<?php echo $rows->id; ?>" role="button">
                              Delete
                            </a>
                          </td>
                        </form>
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
        <!-- ============================================================== -->
<?php
if(isset($_GET['btn']) && $_GET['btn']=='delete'){
  $id = $_GET['id'];
  $deleteQuery = "DELETE FROM advocate_case_study WHERE id = '$id'";
  
  $resDelete = mysqli_query($conn, $deleteQuery);
  if($resDelete){
    $_SESSION['delete'] = "<div class='text-success text-center py-3'><strong?> Case Study is Deleted Successfully </strong></div>";
    ?>
     <script type="text/javascript">
        window.location.href = '<?php echo SITEURL; ?>html/file-table.php';
    </script>
  <?php
  }else{
    $_SESSION['delete'] = "<div class='text-danger text-center py-3'><strong?> Case Study is Deletation Failed </strong></div>";
    ?>
    <script type="text/javascript">
        window.location.href = '<?php echo SITEURL; ?>html/file-table.php';
    </script>
  <?php
  }
}
?>

<?php include('./php/footer.php') ?>

<?php
// echo "<pre>";
//print_r($rows);
// echo $rows->id;



if(isset($_POST['submitSummery'])){
  $caseId = $_POST['caseId'];
  $caseTitle = $_POST['caseTitle'];
  $caseType = $_POST['caseType'];
  $fileStore = $_POST['fileStore'];
  $courtName = $_POST['courtName'];
  $plaintiffName = $_POST['plaintiffName'];
  $plaintiffAddress = $_POST['plaintiffAddress'];
  $plaintiffPhone = $_POST['plaintiffPhone'];
  $diffendentName = $_POST['diffendentName'];
  $diffendentAddress = $_POST['diffendentAddress'];
  $diffendentPhone = $_POST['diffendentPhone'];
  
  $caseSummary = $_POST['caseSummary'];
  $caseDetails = $_POST['caseDetails'];
  
  // $judgeId = $_POST['judgeId'];

  $sqlStudy="INSERT INTO `advocate_case_study` (`caseId`, `advocateId`, `caseTitle`, `caseType`, `fileStored`, `courtName`, `plaintiffName`, `plaintiffAddress`, `plaintiffPhone`, `diffendentName`, `diffendentAddress`, `diffendentPhone`, `caseSummary`, `caseDetails`) 
  VALUES ('$caseId', '{$_SESSION['advocateId']}', '$caseTitle', '$caseType', '$fileStore', '$courtName', '$plaintiffName', '$plaintiffAddress', '$plaintiffPhone', '$diffendentName', '$diffendentAddress', '$diffendentPhone', '$caseSummary', '$caseDetails')";

  $res = mysqli_query($conn, $sqlStudy);

  if($res){
    $_SESSION['caseStudyMessage'] = "<div class='text-success text-center py-3'><strong?> Case Study Added Successfully </strong></div>";
    ?>
    <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>html/file-table.php';
    </script>
    <?php
  }else{
    $_SESSION['caseStudyMessage'] = "<div class='text-danger text-center py-3'><strong?> Case Study Can Not Be Added </strong></div>";
    ?>
    <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>html/file-table.php';
    </script>
    <?php
  }
  
  $firstAdvocate = $_POST['firstAdvocate'];
  $secondAdvocate = $_POST['secondAdvocate'];
  $thiredAdvocate = $_POST['thiredAdvocate'];

  if(!empty($firstAdvocate)){
    $sqlCheck = "SELECT * FROM `advocate_profile` WHERE `advocateId` = '$firstAdvocate'";
    $resCheck = mysqli_query($conn, $sqlCheck);

    if(!empty($resCheck)){
      $sqlStudy="INSERT INTO `advocate_case_study` (`caseId`, `advocateId`, `caseTitle`, `caseType`, `fileStored`, `courtName`, `plaintiffName`, `plaintiffAddress`, `plaintiffPhone`, `diffendentName`, `diffendentAddress`, `diffendentPhone`, `caseSummary`, `caseDetails`) 
      VALUES ('$caseId', '$firstAdvocate', '$caseTitle', '$caseType', '$fileStore', '$courtName', '$plaintiffName', '$plaintiffAddress', '$plaintiffPhone', '$diffendentName', '$diffendentAddress', '$diffendentPhone', '$caseSummery', '$caseDetails')";

      $res = mysqli_query($conn, $sqlStudy);
    }else{
      $_SESSION['firstAdvCaseStudyMessage'] = "<div class='text-danger text-center py-3'><strong?> There is no advocate id of $firstAdvocate </strong></div>";
    }
  }
  if(!empty($secondAdvocate)){
    $sqlCheck = "SELECT * FROM `advocate_profile` WHERE `advocateId` = '$secondAdvocate'";
    $resCheck = mysqli_query($conn, $sqlCheck);

    if(!empty($resCheck)){
      $sqlStudy="INSERT INTO `advocate_case_study` (`caseId`, `advocateId`, `caseTitle`, `caseType`, `fileStored`, `courtName`, `plaintiffName`, `plaintiffAddress`, `plaintiffPhone`, `diffendentName`, `diffendentAddress`, `diffendentPhone`, `caseSummary`, `caseDetails`) 
      VALUES ('$caseId', '$secondAdvocate', '$caseTitle', '$caseType', '$fileStore', '$courtName', '$plaintiffName', '$plaintiffAddress', '$plaintiffPhone', '$diffendentName', '$diffendentAddress', '$diffendentPhone', '$caseSummery', '$caseDetails')";

      $res = mysqli_query($conn, $sqlStudy);
    }else{
      $_SESSION['secondAdvCaseStudyMessage'] = "<div class='text-danger text-center py-3'><strong?> There is no advocate id of $secondAdvocate </strong></div>";
    }
  }
  if(!empty($thiredAdvocate)){
    $sqlCheck = "SELECT * FROM `advocate_profile` WHERE `advocateId` = '$thiredAdvocate'";
    $resCheck = mysqli_query($conn, $sqlCheck);

    if(!empty($resCheck)){
      $sqlStudy="INSERT INTO `advocate_case_study` (`caseId`, `advocateId`, `caseTitle`, `caseType`, `fileStored`, `courtName`, `plaintiffName`, `plaintiffAddress`, `plaintiffPhone`, `diffendentName`, `diffendentAddress`, `diffendentPhone`, `caseSummary`, `caseDetails`) 
      VALUES ('$caseId', '$thiredAdvocate', '$caseTitle', '$caseType', '$fileStore', '$courtName', '$plaintiffName', '$plaintiffAddress', '$plaintiffPhone', '$diffendentName', '$diffendentAddress', '$diffendentPhone', '$caseSummery', '$caseDetails')";

      $res = mysqli_query($conn, $sqlStudy);
    }else{
      $_SESSION['thiredCaseStudyMessage'] = "<div class='text-danger text-center py-3'><strong?> There is no advocate id of $thiredAdvocate </strong></div>";
    }
  }
}
?>