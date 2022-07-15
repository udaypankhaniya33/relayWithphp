<?php include "dbconnection.php";

$resultData=mysqli_fetch_array(mysqli_query($connection,"SELECT * FROM `admins_admin` WHERE `id`='".$_SESSION["id"]."' "));


?>

<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>

    <meta charset="utf-8" />
    <title>Relay</title>
    <meta name="description" content="Updates and statistics" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="../static/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="../static/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="../static/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="../static/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="../static/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->


    <!-- googlicons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine" />


    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
    <!-- icons end -->
 
    <!--begin::Layout Themes(used by all pages)-->

    <link href="../static/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="../static/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="../static/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="../static/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->

     <link rel="shortcut icon" href="../static/images/favicon.ico" />
</head>
<!--end::Head-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed subheader-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile align-items-center  header-mobile-fixed ">
        <!--begin::Logo-->
        <a href="../home/" class="brand-logo" style="width:10%;">
               <img alt="Logo" src="../static/images/White.png" style="width: 100%;" />
        </a>
        <!--end::Logo-->

        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Aside Mobile Toggle-->
            <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
                <span></span>
            </button>
            <!--end::Aside Mobile Toggle-->



            <!--begin::Topbar Mobile Toggle-->
            <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
                <span class="svg-icon svg-icon-xl">
                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                        height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path
                                d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path
                                d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span> </button>
            <!--end::Topbar Mobile Toggle-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column">

            <!--begin::Aside-->
            <div class="aside aside-left  aside-fixed  d-flex flex-column flex-row-auto" id="kt_aside">
                <!--begin::Brand-->
                <div class="brand flex-column-auto " id="kt_brand">
                    <!--begin::Logo-->
                    <a href="home/" class="brand-logo" style="width:25%;">
                        <img alt="Logo" src="../static/images/White.png" style="width: 100%;" />
                    </a>

                    <!-- <a href="home/" style="padding:10% ; color:#fff;" class="brand-logo">
                        <span>Relay</span>
                    </a> -->
                    <!--end::Logo-->

                    <!--begin::Toggle-->
                    <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                        <span class="svg-icon svg-icon svg-icon-xl">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24" />
                                    <path
                                        d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                        fill="#000000" fill-rule="nonzero"
                                        transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) " />
                                    <path
                                        d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"
                                        transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) " />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span> </button>
                    <!--end::Toolbar-->
                </div>
                <!--end::Brand-->

                <!--begin::Aside Menu-->
                <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

                    <!--begin::Menu Container-->
                    <div id="kt_aside_menu" class="aside-menu my-4 " data-menu-vertical="1" data-menu-scroll="1"
                        data-menu-dropdown-timeout="500">
                        <!--begin::Menu Nav-->
                        <ul class="menu-nav ">




						<?php
						$query = "SELECT * FROM `menu_menu` WHERE `mainMenuId`='0' AND `deleteMenu`='0' ORDER BY `order`";
						$getManu = mysqli_query($connection, $query);
						while ($result = mysqli_fetch_array($getManu)) {

							$subquery = "SELECT * FROM `menu_menu` WHERE `mainMenuId`='" . $result["menuId"] . "'";


                            // echo $subquery;
							$getSubManu = mysqli_query($connection, $subquery);
							$num = mysqli_num_rows($getSubManu);

						?>
							<li class="menu-item  <?php if ($num > 0) {
                                                            echo "menu-item-submenu";
                                                        } ?>" aria-haspopup="true">
								<a href="<?php echo $result['path'] ?>" class="menu-link  <?php if ($num > 0) {
                                                                                                    echo "menu-toggle";
                                                                                                } ?>">
									<span class="svg-icon menu-icon">
										<span class="material-icons">
											<?php echo $result['icon'] ?>
										</span>
										<!--end::Svg Icon-->
									</span><span class="menu-text">

										<?php echo $result['menuName'] ?> </span></a>

								<?php if ($num > 0) {

								?>

									<div class="menu-submenu"><i class="menu-arrow"></i>
										<ul class="menu-subnav">
											<?php while ($subResult = mysqli_fetch_array($getSubManu)) { ?>
												<li class="menu-item  menu-item" aria-haspopup="true">
													<div class="menu-link ">

														<a href="<?php echo $subResult['path'] ?>" class="menu-text">
															<?php echo $subResult['menuName'] ?>
														</a>
														<?php if ($subResult["add"] == "YES") { ?>
															<span class="svg-icon menu-icon">

																<a href="<?php echo $subResult['addPath'] ?>">

																	<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																		<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24" />
																			<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
																			<path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000" />
																		</g>
																	</svg>

																</a>
															</span>
														<?php } ?>
													</div>
												</li>
											<?php } ?>
										</ul>
									</div>

							</li>

					<?php }

}
					?>

              


                        </ul>
                    </div>
                    </li>


                    </ul>
                    <!--end::Menu Nav-->
                </div>
                <!--end::Menu Container-->
            </div>
            <!--end::Aside Menu-->
        </div>
        <!--end::Aside-->

        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

            <!--begin::Header-->
            <div id="kt_header" class="header  header-fixed ">
                <!--begin::Container-->
                <div class=" container-fluid  d-flex align-items-stretch justify-content-between">
                    <!--begin::Header Menu Wrapper-->
                    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                        <!--begin::Header Menu-->

                        <!--end::Header Menu-->
                    </div>
                    <!--end::Header Menu Wrapper-->

                    <!--begin::Topbar-->


                    <div class="topbar">
                        <!--begin::User-->
               
                        <div class="topbar-item">
                            <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                                id="kt_quick_user_toggle">
                                <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1"></span>
                                <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">Hi,


                                   <?php  
                                   echo $resultData["firstName"] ?>




                                </span>




                                <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
                                    <img src="media/<?php // echo $result["profilePic"] ?>" style="width: 40px;border-radius: 10px;">
                                </span>
                            </div>
                        </div>
       
                        <!--end::User-->
                    </div>
                    <!--end::Topbar-->
                </div>
                <!--end::Container-->
            </div>


            <!--end::Header-->