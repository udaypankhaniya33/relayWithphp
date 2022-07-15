<?php include '../include/header1.php';

$getHelpAndSupport = mysqli_query($connection, "SELECT `user`.`fullName`,`user`.`profile`,`user`.`email`,`helpandsupport`.`email` AS `helpEmail`,`subject`,`description`,`fileName` ,`helpandsupport`.`userId` FROM `helpandsupport` LEFT JOIN `user` ON `user`.`userId`=`helpandsupport`.`userId` WHERE `helpandsupport`.`delete`='0' ORDER BY `helpandsupportId` DESC ")

?>
<div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
        <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-2">

                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    Help And Support</h5>
                <!--end::Page Title-->

                <!--begin::Actions-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200">

                </div>
                <span class="text-muted font-weight-bold mr-4"> Inquiries </span>
            </div>
            <!--end::Info-->
        </div>
    </div>
    <!--end::Subheader-->

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class=" container ">

            <div class="card card-custom gutter-b">
                <div class="card-header flex-wrap border-0 pt-6 pb-0">
                    <div class="card-title">
                        <h3 class="card-label">
                            All inquiries

                        </h3>
                    </div>

                </div>

                <div class="card-body">

                    <pre>


</pre>
                    <!--begin: Datatable-->
                    <table class="table table-separate table-head-custom table-checkable" id="metarial">
                        <thead>


                            <tr>
                                <th>#</th>
                                <th>Profile</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>File</th>
                                <th>Descriptions</th>

                            </tr>
                        </thead>


                        <tbody>
                      

                            <?php
                            $counter = 1;
                            while ($row = mysqli_fetch_array($getHelpAndSupport)) { ?>

                                <tr>
                                    <th><?php echo $counter++ ?></th>
                                    <th>
                                        <a href="<?php
                                                    if ($row["userId"] == 0) {
                                                        echo "#";
                                                    } else {
                                                        echo "../userDetails/?id=" . $row["userId"];
                                                    } ?>" class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                                            <img src="<?php
                                                        if ($row["profile"] == "") {
                                                            echo "../static/images/favicon.ico";
                                                        } else {
                                                            echo $row["profile"];
                                                        }


                                                        ?>" style="width: 40px;border-radius: 10px;">

                                        </a>

                                        <br>
                                        <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                                            <?php echo $row["fullName"] ?>
                                        </span>
                                    </th>
                                    
                                    <th><?php if ($row["email"] == "") {
                                            echo $row["helpEmail"];
                                        } else {
                                            echo $row["email"];
                                        }  ?></th>
                                    <th><?php echo $row["subject"] ?></th>

                                    <th>
                                        <?php if($row["fileName"]==""){
                                            echo "N/A";
                                        }else{
                                            ?>
                                    
                                    <a target="_blank" href="<?php echo $row["fileName"] ?>"></th>

                                    <?php }?>
                                    <th><?php echo $row["description"] ?></th>
                                </tr>


                            <?php }
                            ?>
                        </tbody>



                    </table>
                    <!--end: Datatable-->
                </div>
            </div>

        </div>

    </div>

</div>
<?php include '../include/footer1.php'; ?>

<script src="../static/assets/plugins/custom/datatables/datatables.bundle.js"></script>
<script src="../static/assets/js/pages/crud/datatables/basic/scrollable.js"></script>

<script language="javascript">
    $(document).ready(function() {
        $('#metarial').dataTable({});
    });
</script>