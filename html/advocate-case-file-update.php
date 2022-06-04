<?php include('./php/navbar.php') ?>

<form method="POST" action="">
<div class="row">
    <?php
        $caseId = $_GET['id'];

        $sql = "SELECT * FROM `advocate_case_study` WHERE `caseId` = '$caseId'";
        $res = mysqli_query($conn, $sql);
        $rows = mysqli_fetch_array($res);
    ?>
    <div class="col-12">
        <div class="card">
        <div class="card-body">
            <label class="col-md-12">Case ID</label>
            <div class="col-md-12">
                <input
                type="text"
                class="form-control form-control-line"
                name="caseId"
                readonly
                value="<?php echo $rows['caseId'] ?>"
                />
            </div>
            <label class="col-md-12">Advocate ID</label>
            <div class="col-md-12">
                <input
                type="text"
                class="form-control form-control-line"
                name="advocateId"
                readonly
                value="<?php echo $rows['advocateId'] ?>"
                />
            </div>
            <label class="col-md-12 pt-4">Case Title</label>
                    <div class="col-md-12">
                    <input
                        type="text"
                        class="form-control form-control-line"
                        name="caseTitle"
                        value="<?php echo $rows['caseTitle'] ?>"
                    />
                    </div>
            <label class="col-md-12 pt-4">Case Type</label>
                    <div class="col-md-12">
                    <input
                        type="text"
                        class="form-control form-control-line"
                        name="caseType"
                        value="<?php echo $rows['caseType'] ?>"
                    />
                    </div>
            <label class="col-md-12 pt-4">File Store</label>
                    <div class="col-md-12">
                    <input
                        type="text"
                        class="form-control form-control-line"
                        name="fileStore"
                        value="<?php echo $rows['fileStored'] ?>"
                    />
                    </div>
            <label class="col-md-12 pt-4">Court Name</label>
                    <div class="col-md-12">
                    <input
                        type="text"
                        class="form-control form-control-line"
                        name="courtName"
                        value="<?php echo $rows['courtName'] ?>"
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
                        value="<?php echo $rows['plaintiffName'] ?>"
                    />
                    </div>
                    <label class="col-md-12 pt-4">Address</label>
                    <div class="col-md-12">
                    <input
                        type="text"
                        class="form-control form-control-line"
                        name="plaintiffAddress"
                        value="<?php echo $rows['plaintiffAddress'] ?>"
                    />
                    </div>
                    <label class="col-md-12 pt-4">Phone</label>
                    <div class="col-md-12">
                    <input
                        type="text"
                        class="form-control form-control-line"
                        name="plaintiffPhone"
                        value="<?php echo $rows['plaintiffPhone'] ?>"
                    />
                    </div>
                </div>
                <div class="col-lg-6 d-flex flex-column align-items-center">
                    <h4 class="fw-bold">Diffendent</h4>
                    <label class="col-md-12 pt-4">Name</label>
                    <div class="col-md-12">
                    <input
                        type="text"
                        class="form-control form-control-line"
                        name="diffendentName"
                        value="<?php echo $rows['diffendentName'] ?>"
                    />
                    </div>
                    <label class="col-md-12 pt-4">Address</label>
                    <div class="col-md-12">
                    <input
                        type="text"
                        class="form-control form-control-line"
                        name="diffendentAddress"
                        value="<?php echo $rows['diffendentAddress'] ?>"
                    />
                    </div>
                    <label class="col-md-12 pt-4">Phone</label>
                    <div class="col-md-12">
                    <input
                        type="text"
                        class="form-control form-control-line"
                        name="diffendentPhone"
                        value="<?php echo $rows['diffendentPhone'] ?>"
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
                    <?php echo $rows['caseSummary'] ?>
                </textarea>
                </div>
            <h3 class="fw-bold pt-4">Case Details</h3>
                <div class="col-md-12">
                <textarea
                    type="text"
                    class="form-control form-control-line"
                    name="caseDetails">
                    <?php echo $rows['caseDetails'] ?>
                </textarea>
                </div>
        </div>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-center">
        <button class="btn btn-success" name="update">
            Update
        </button>
    </div>
</div>
</form>
<?php include('./php/footer.php') ?>

<?php

if(isset($_POST['update'])){
    $caseId = $_POST['caseId'];
    $advocateId = $_POST['advocateId'];
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

    $sqlupdate = "UPDATE `advocate_case_study` 
    SET `caseTitle` = '$caseTitle', `caseType` = '$caseType', `fileStored` = '$fileStore', `courtName` = '$courtName', `plaintiffName` = '$plaintiffName', `plaintiffAddress` = '$plaintiffAddress', `plaintiffPhone` = '$plaintiffPhone', `diffendentName` = '$diffendentName', `diffendentAddress` = '$diffendentAddress', `diffendentPhone` = '$diffendentPhone', `caseSummary` = '$caseSummary', `caseDetails` = '$caseDetails' 
    WHERE `caseId` = '$caseId' AND `advocateId` = '$advocateId'";
    $res = mysqli_query($conn, $sqlupdate) or die(mysqli_connect_error());

    if($res){


    $_SESSION['update'] = "<div class='text-success text-center'> <strong>Your profile has been updated</strong> </div>";
    ?>
        <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>html/file-table.php';
        </script>
    <?php
    }else{

      $_SESSION['update'] = "<div class='text-danger text-center'> <strong>Your profile has not been updated</strong> </div>";
    ?>
        <script type="text/javascript">
            window.location.href = '<?php echo SITEURL; ?>html/file-table.php';
        </script>
    <?php
    }
}
?>