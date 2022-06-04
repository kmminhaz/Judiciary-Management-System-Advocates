<?php include('./php/navbar.php') ?>
    <!-- Custom CSS Link -->
    <link rel="stylesheet" href="case-file.css" />
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-5 align-self-center">
              <h4 class="page-title">Case Summary</h4>
            </div>
            <div class="col-7 align-self-center">
              <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Case Summary
                    </li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <?php 
          if (isset($_SESSION['comment'])) {
            echo $_SESSION['comment'];
            unset($_SESSION['comment']);
          }
          if (isset($_SESSION['file'])) {
            echo $_SESSION['file'];
            unset($_SESSION['file']);
          }
        ?>

        <?php
          $caseId = $_GET['id'];

          $sql = "SELECT * FROM `advocate_case_study` WHERE `caseId` = '$caseId'";
          $res = mysqli_query($conn, $sql);
          $rows = mysqli_fetch_array($res);
        ?>
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
                  <h3 class="fw-bold">Case ID : <span> <?php echo $rows['caseId'] ?> </span></h3>
                  <h3 class="fw-bold pb-2">Case Title : <span> <?php echo $rows['caseTitle'] ?> </span></h3>
                    <span class="label label-primary label-rounded fs-5 fw-bold">
                    Civil Case</span>
                    <br>
                <h4 class="fw-bold pt-4">File Stored : <span><?php echo $rows['fileStored'] ?> Sell</span></h4>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="card">
                <div class="card-body d-flex flex-column align-items-center">
                    <h3 class="fw-bold text-center"><?php echo $rows['courtName'] ?></span></h3>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                      <div class="col-lg-6 d-flex flex-column align-items-center">
                          <h4 class="fw-bold">Plaintiff</h4>
                          <h5 class="pt-2">Name : <span> <?php echo $rows['plaintiffName'] ?> </span></h5>
                          <h5>Address : <span> <?php echo $rows['plaintiffAddress'] ?> </span></h5>
                          <h5>Phone : <span> <?php echo $rows['plaintiffPhone'] ?> </span></h5>
                      </div>
                      <div class="col-lg-6 d-flex flex-column align-items-center">
                          <h4 class="fw-bold text-center">Diffendent</h4>
                          <h5 class="pt-2">Name : <span> <?php echo $rows['diffendentName'] ?></span></h5>
                          <h5>Address : <span> <?php echo $rows['diffendentAddress'] ?> </span></h5>
                          <h5>Phone : <span> <?php echo $rows['diffendentPhone'] ?> </span></h5>
                      </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="fw-bold">Case Summary</h3>
                        <p><?php echo $rows['caseSummary'] ?></p>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="fw-bold">About Case</h3>
                        <div class="accordion my-5" id="accordionExample">
                            <div class="border border-white">
                                <h2 class="accordion-header" id="headingOne">
                                    <button
                                        class="accordion-button"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne"
                                        aria-expanded="true"
                                        aria-controls="collapseOne"
                                    >
                                        <strong><?php echo $rows['caseTitle'] ?></strong>
                                    </button>
                                </h2>
                                <div
                                    id="collapseOne"
                                    class="accordion-collapse collapse show"
                                    aria-labelledby="headingOne"
                                    data-bs-parent="#accordionExample"
                                    >
                                    <div class="accordion-body overflow-auto" style="height: 25rem">
                                        <p>
                                        <?php echo $rows['caseDetails'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pdf File Place -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="fw-bold">Files & Documents</h3>
                        <div>
                          <button type="button" class="btn btn-outline-primary mx-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="mdi mdi-file-document fs-1"></i> <br />
                            <span> Upload pdf File </span>
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
                                    <label for="">Chose your PDF file here</label> <br> <br>
                                    <input id="pdf" type="file" name="pdf" value="" require>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button id="submit" type="submit" name="submit" value="upload" class="btn btn-primary">Submit</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Show Pdf File -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <section class="p-4 d-flex justify-content-center w-100">
                    <?php
                      $sql="SELECT `pdf`, `id` FROM `advocate_documents` WHERE `caseId` = '$caseId'";
                      $res = mysqli_query($conn, $sql);
                    ?>

                        <div class="container">
                          <div class="row">
                        <?php
                        while($info=mysqli_fetch_array($res)){
                        ?>
                          <div class="col-lg-3 col-sm-1 col-md-2 openBtn">
                            <div class="d-flex justify-content-center">
                              <a target="_blank" href="../assets/pdf/<?php echo $info['pdf'] ?>">
                              <p class="btn btn-outline-danger m-3">
                                <i class="mdi mdi-file-pdf fs-1"></i> <br />
                                <span name="pdfClick"><?php echo $info['pdf'] ?></span>
                              </p>
                              </a>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a class="btn btn-primary m-2 btnsDocument" target="_blank" href="../assets/pdf/<?php echo $info['pdf'] ?>">
                                  Open
                                </a>
                                <a onclick="return confirm('Are you sure, You want to delete this case study');" class="m-1 btn btn-danger btnsDocument" href="<?php echo SITEURL ?>html/advocate-case-file.php?btn=delete&id=<?php echo $info['id']; ?>" role="button">
                                  Delete
                                </a>
                                <script type="text/javascript">
                                    window.location.href = '<?php echo SITEURL; ?>html/advocate-case-file.php?id=<?php echo $id?>';
                                </script>
                              </div>
                          </div>
                        <?php
                        }
                        ?>
                          </div>
                        </div>
                  </section>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                  <h3 class="fw-bold pb-4">Appointed Other Advocates</h3>
                  <?php
                  $sqli = "SELECT * FROM `advocate_case_study` WHERE `caseId` = '$caseId'";
                  $resi = mysqli_query($conn, $sqli);

                    while($rowsI = mysqli_fetch_array($resi)){
                      $sqlia = "SELECT `full_name`, `image` FROM `advocate_profile` WHERE `advocateId` = '{$rowsI['advocateId']}'";
                      $resia = mysqli_query($conn, $sqlia);
                      $rowsia = mysqli_fetch_array($resia);
                      ?>
                        <div class="col-lg-4 d-flex flex-column align-items-center">
                            <img class="mt-3" src="../assets/images/advocateProfileImage/<?php echo $rowsia['image'] ?>" alt="" height="100px" width="100px">
                            <h5 class="pt-3">Name : <span> <?php echo $rowsia['full_name'] ?></span></h5>
                            <h5>Jonuir Advocate</h5>
                        </div>
                      <?php
                    }
                  ?>
                  </div>
                </div>
              </div>
            </div>

            <?php
              $sqlDiscussion = "SELECT * FROM `advocates_discussion` WHERE `caseId` = '$caseId'";
              $resDiscussion = mysqli_query($conn, $sqlDiscussion);
            ?>


            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h3 class="fw-bold">Discussions</h3>
                        <?php
                          while($allDiscussion = mysqli_fetch_array($resDiscussion)){
                            ?>

                            <div class="mt-5">
                              <h6 class=""><?php echo $allDiscussion['date'] ?></h5>
                              <h4><?php echo $allDiscussion['advocateName'] ?></h5>
                              <h6 class=""> Advocate ID : <span><?php echo $allDiscussion['advocateId'] ?></span></h5>
                              <p><?php echo $allDiscussion['comment'] ?></p>
                            </div>
                            
                            <?php
                          }
                        ?>
                        
                        
                        <div class="mt-5 bg-light p-5 pt-4">
                        <form method="POST" action="">
                          <h3>Add Your Comment</h3>
                          <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput2" name="advocateName">
                          </div>
                          <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Add your discussion here</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="5" name="discussion"></textarea>
                          </div>
                          <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="comment" name="comment">
                              Comment
                            </button>
                          </div>
                        </form>
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
<?php include('./php/footer.php') ?>

<?php
if(isset($_GET['btn']) && $_GET['btn']=='delete'){

  $id = $_GET['id'];
  $deleteQuery = "DELETE FROM advocate_documents WHERE id = '$id'";
  
  $resDelete = mysqli_query($conn, $deleteQuery);
  if($resDelete){
    // $id = $caseId;
    $_SESSION['delete'] = "<div class='text-success text-center py-3'><strong?> A file has been Deleted Successfully </strong></div>";
    ?>
     <!-- <script type="text/javascript">
        window.location.href = '<?php echo SITEURL; ?>html/advocate-case-file.php?id=<?php echo $id?>';
    </script> -->
  <?php
  }else{
    $_SESSION['delete'] = "<div class='text-danger text-center py-3'><strong?> File Deletation Failed </strong></div>";
    ?>
    <!-- <script type="text/javascript">
        window.location.href = '<?php echo SITEURL; ?>html/advocate-case-file.php?id=<?php echo $caseId?>';
    </script> -->
  <?php
  }
}
?>

<?php
if(isset($_POST['submit'])){
  $pdf = $_FILES['pdf']['name'];
  $pdf_type=$_FILES['pdf']['type'];
  $pdf_size=$_FILES['pdf']['size'];
  $pdf_tem_loc=$_FILES['pdf']['tmp_name'];
  $pdf_store="../assets/pdf/$pdf";
  move_uploaded_file($pdf_tem_loc,$pdf_store);

  $sql="INSERT INTO `advocate_documents` (`pdf`,`caseId`) VALUES ('$pdf','$caseId')";
  $query=mysqli_query($conn,$sql);

  if($query){
    $_SESSION['file'] = "<div class='text-success text-center'> <strong>A New file has been added</strong> </div>";
    ?>
    <script type="text/javascript">
        window.location.href = '<?php echo SITEURL; ?>html/advocate-case-file.php?id=<?php echo $caseId; ?>';
    </script>
  <?php
  }else{
    $_SESSION['file'] = "<div class='text-danger text-center'> <strong>New file can not be added</strong> </div>";
    ?>
    <script type="text/javascript">
        window.location.href = '<?php echo SITEURL; ?>html/advocate-case-file.php?id=<?php echo $caseId; ?>';
    </script>
  <?php
  }
}
?>

<?php

if(isset($_POST['comment'])){
  $advocateName = $_POST['advocateName'];
  $advocateComment = $_POST['discussion'];

  $sqli = "INSERT INTO `advocates_discussion` (`caseId`, `advocateId`, `advocateName`, `comment`) 
  VALUES ('$caseId', '{$_SESSION['advocateId']}', '$advocateName', '$advocateComment')";
  $res = mysqli_query($conn, $sqli);
  
  if($res){
    $_SESSION['comment'] = "<div class='text-success text-center'> <strong>A New comment has been added</strong> </div>";
    ?>
    <script type="text/javascript">
        window.location.href = '<?php echo SITEURL; ?>html/advocate-case-file.php?id=<?php echo $caseId; ?>';
    </script>
  <?php
  }else{
    $_SESSION['comment'] = "<div class='text-danger text-center'> <strong>New comment can not be added</strong> </div>";
    ?>
    <script type="text/javascript">
        window.location.href = '<?php echo SITEURL; ?>html/advocate-case-file.php?id=<?php echo $caseId; ?>';
    </script>
  <?php
  }
}

?>