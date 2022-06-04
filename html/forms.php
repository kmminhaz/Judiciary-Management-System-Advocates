<?php include('./php/navbar.php') ?>

<?php 
  $sql = "SELECT * FROM `administrativ_forms`";
  $res = mysqli_query($conn, $sql);

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
              <h4 class="page-title my-4">All Forms</h4>
            </div>
            <div class="col-7 align-self-center">
              <div class="d-flex align-items-center justify-content-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="#">Home</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Forms
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
                  <section class="p-4 d-flex w-100 flex-column">
                    <?php
                      while($rows = mysqli_fetch_object($res)){
                        ?>
                          <ul class="list-unstyled">
                            <li class="bg-white fw-bold my-1 py-1">
                              <article>
                                <!-- button -->
                                <button
                                  type="button"
                                  class="btn btn-white w-lg-50 w-100 fw-bold text-start border-white shadow"
                                  data-bs-toggle="modal"
                                  data-bs-target="#exampleModal<?php echo $rows->id; ?>"
                                >
                                  <?php echo $rows->name; ?>
                                </button>

                                <!-- Modal -->
                                <div
                                  class="modal fade"
                                  id="exampleModal<?php echo $rows->id; ?>"
                                  tabindex="-1"
                                  aria-labelledby="exampleModalLabel"
                                  aria-hidden="true"
                                >
                                  <div
                                    class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable"
                                  >
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5
                                          class="modal-title text-dark fw-bold"
                                          id="exampleModalLabel"
                                        >
                                          <?php echo $rows->name; ?>
                                        </h5>
                                        <button
                                          type="button"
                                          class="btn-close"
                                          data-bs-dismiss="modal"
                                          aria-label="Close"
                                        ></button>
                                      </div>
                                      <div class="modal-body text-dark">
                                        <iframe
                                          src="<?php echo $rows->pdf; ?>"
                                          width="100%"
                                          height="500px"
                                        >
                                        </iframe>
                                      </div>
                                      <div class="modal-footer">
                                        <button
                                          type="button"
                                          class="btn btn-secondary"
                                          data-bs-dismiss="modal"
                                        >
                                          Close
                                        </button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </article>
                            </li>
                          </ul>
                        <?php
                      }
                    ?>
                  </section>
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
<?php include('./php/footer.php') ?>