<?php include '../include/header1.php';
$termsandconditionId = isset($_GET["Id"]) ? $_GET["Id"] : "";
if (isset($_GET["Id"])) {
    $TNC = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM `termsandcondition` WHERE `termsandconditionId`='" . $termsandconditionId . "' AND `delete`='0'"));
}

if (isset($_POST["submit"])) {
    $title = trim($_POST["title"]);
    $description = mysqli_real_escape_string($connection, trim($_POST["description"]));


    if (isset($_GET["Id"])) {

        $query = mysqli_query($connection, "UPDATE `termsandcondition` SET `title`='" . $title . "',`value`='" . $description . "' WHERE `termsandconditionId`='" . $termsandconditionId . "' AND `delete`='0'");


        if ($query) {
            $_SESSION["updated"] = 1;
 
            header("location:../Terms-And-Conditions/");
        }
    } else {
        $query = mysqli_query($connection, "INSERT INTO `termsandcondition` SET `title`='" . $title . "',`value`='" . $description . "' ");

        if ($query) {
            $_SESSION["inserted"] = 1;
    
            header("location:../Terms-And-Conditions/");
        }
    }
}




?>
<style>
    .error {
        color: red;
    }
</style>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!-- begin::Subheader -->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Terms And Conditions</h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                <!--end::Separator-->
                <!--begin::Search Form-->
                <div class="d-flex align-items-center" id="kt_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total"></span>
                </div>
                <!--end::Search Form-->
            </div>
            <!--end::Details-->

        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">Terms And Conditions</h3>
                </div>
                <!--begin::Form-->
                <form class="form" method="post" id="myForm" enctype="multipart/form-data">

                    <div class="card-body">

                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-2 col-sm-12">Title</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <input type="text" name="title" class="form-control form-control-lg" placeholder="Title" value="<?php if (isset($_GET["Id"])) {
                                                                                                                                    echo $TNC["title"];
                                                                                                                                } ?>">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-form-label text-right col-lg-2 col-sm-12">Description</label>
                            <div class="col-lg-6 col-md-9 col-sm-12">
                                <textarea name="description" class="form-control form-control-lg"><?php if (isset($_GET["Id"])) {
                                                                                                        echo $TNC["value"];
                                                                                                    } ?></textarea>
                            </div>

                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-12" style="text-align: center;">
                                <button type="button" class="btn btn-secondary">Cancel</button>
                                <button type="submit" id='kt_save_content' name="submit" class="btn btn-primary cebutton mr-2">save</button>
                            </div>
                        </div>
                    </div>


                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->





        </div>
        <!--end::Container-->
    </div>

    <div class="d-flex flex-column-fluid pt-5 ">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <h3 class="card-title">Terms And Conditions</h3>
                </div>


                <div class="card-body">


                    <table class="table table-separate  table-head-custom table-checkable" id="metarial">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>


                        </tbody>
                    </table>


                </div>

            </div>
        </div>
    </div>

    <!--end::Entry-->
</div>
<?php include '../include/footer1.php' ?>



<?php if (isset($_SESSION["inserted"])) { ?>
    <script>
        $(document).ready(function() {
            toastr.success("Content Added Successfull");
        })
    </script>

<?php
    unset($_SESSION["inserted"]);
} ?>



<?php if (isset($_SESSION["updated"])) { ?>
    <script>
        $(document).ready(function() {
            toastr.success("Content Updated Successfull");
        })
    </script>

<?php
    // unset($_SESSION["updated"]);
} ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="../static/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="../static/assets/js/pages/crud/datatables/basic/scrollable.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#metarial');
        table.DataTable({
            "scrollX": true,
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "../serverresponse/termsAndConditions.php"
        });
    });
</script>
<script>
    function deleteT(CustomerId) {


        $.ajax({
            url: '../ajax/deleteTerms.php',
            method: "POST",
            data: {
                'CustomerId': CustomerId
            },
            success: function(result) {





                if (result == 1) {

                    toastr.success("Deleted ");
                    $('#metarial').DataTable().ajax.reload();


                } else {
                    toastr.warning("Somthing Went Wrong");
                }
            },
            error: function(er) {
                toastr.error("failed");
            }
        });



    }

    function addslashes(str) {
        return (str + '').replace(/[\\"']/g, '\\$&').replace(/\u0000/g, '\\0');
    }

    $("#myForm").validate({
        rules: {

            title: {
                required: true,
            },
            description: {
                required: true,
            }
        },
        messages: {

            title: {
                required: "Title is Requried",
            },
            description: {
                required: "Description is Requried",
            }
        },



    });
</script>
