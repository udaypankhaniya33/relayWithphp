
<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8" />
  <title>Relay</title>
  <meta name="description" content="Singin page example" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <!--begin::Fonts-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
  <!--end::Fonts-->

  <!--begin::Page Custom Styles(used by this page)-->
  <link href="static/assets/css/pages/login/login-4.css" rel="stylesheet" type="text/css" />
  <!--end::Page Custom Styles-->

  <!--begin::Global Theme Styles(used by all pages)-->
  <link href="static/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
  <link href="static/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
  <link href="static/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

  <link rel="shortcut icon" href="static/images/favicon.ico" />
  <!--end::Global Theme Styles-->

  <!--begin::Layout Themes(used by all pages)-->
  <!--end::Layout Themes-->

  <link rel="shortcut icon" href="static/assets/media/logos/favicon.ico" />

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" style="background-image: url(static/assets/media/bg/bg-10.jpg)"
  class="quick-panel-right demo-panel-right offcanvas-right header-fixed subheader-enabled page-loading">
  <!--begin::Main-->
  <div class="d-flex flex-column flex-root">
    <!--begin::Login-->
    <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
      <!--begin::Content-->
      <div
        class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
        <!--begin::Wrapper-->
        <div class="login-content d-flex flex-column pt-lg-0 pt-12">
          <!--begin::Logo-->
          <a href="#" class="login-logo pb-xl-20 pb-15">

          </a>
          <!--end::Logo-->

          <!--begin::Signin-->
          <div class="login-form">
            <!--begin::Form-->

            <!-- {%if error.er1 %}
            <div class="alert alert-danger">
              <strong>{{ error.er1|escape }}</strong>
            </div>
            {% endif%} -->
            <form class="form" method="POST" id="kt_login_singin_form">
              <!--begin::Title-->

              <div class="pb-5 pb-lg-15">
                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">
                  Sign In
                </h3>
              </div>
              <!--begin::Title-->

              <!--begin::Form group-->
              <div class="form-group">
                <label class="font-size-h6 font-weight-bolder text-dark">Your Mobile Number</label>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0" type="text"
                  name="number" id="number" autocomplete="off" />
              </div>
              <!--end::Form group-->

              <!--begin::Form group-->
              <div class="form-group">
                <div class="d-flex justify-content-between mt-n5">
                  <label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>

                  <a href="Forget-Password/"
                    class="text-primary font-size-h6 font-weight-bolder text-hover-primary pt-5">
                    Forgot Password ?
                  </a>
                </div>
                <input class="form-control form-control-solid h-auto py-7 px-6 rounded-lg border-0" type="password"
                  name="password" id="password" autocomplete="off" />
              </div>
              <!--end::Form group-->

              <!--begin::Action-->
              <div class="pb-lg-0 pb-5">
                <button type="submit" id="kt_login_singin_form_submit_button"
                  class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-3">Sign In</button>
              </div>
              <!--end::Action-->
            </form>
            <!--end::Form-->
          </div>
          <!--end::Signin-->
        </div>
        <!--end::Wrapper-->
      </div>
      <!--begin::Content-->

      <!--begin::Aside-->
      <div class="login-aside order-1 order-lg-2 bgi-no-repeat bgi-position-x-right">
        <div class="login-conteiner bgi-no-repeat bgi-position-x-right bgi-position-y-bottom" style="
              background-image: url(static/assets/media/svg/illustrations/login-visual-4.svg);
            ">
          <!--begin::Aside title-->
          <h3
            class="pt-lg-40 pl-lg-20 pb-lg-0 pl-10 py-20 m-0 d-flex justify-content-lg-start font-weight-boldest display5 display1-lg text-white">
            Relay <br />
            Admin Panel<br />

          </h3>
          <!--end::Aside title-->
        </div>
      </div>
      <!--end::Aside-->
    </div>
    <!--end::Login-->
  </div>
  <!--end::Main-->


  <!--begin::Global Config(global config for global JS scripts)-->


  <!--begin::Global Theme Bundle(used by all pages)-->
  <script src="static/assets/plugins/global/plugins.bundle.js"></script>
  <script src="static/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
  <script src="static/assets/js/scripts.bundle.js"></script>
  <!--end::Global Theme Bundle-->

  <!--begin::Page Scripts(used by this page)-->
  <script src="static/assetsjs/pages/custom/login/login-4.js"></script>
  <!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>


<script src="https://code.jquery.com/jquery-3.6.0.js"></script>

<!--end::Global Config-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>


<script>
  $("#kt_login_singin_form").validate({
    rules: {

      number: {
        required: true

      },
      password: {
        required: true
      }
    },

    messages: {
      number: {
        required: "number is Required"
      },
      password: {
        required: "Password is Required"
      }
    },


    submitHandler: function (form) {

      $("#kt_login_singin_form_submit_button").attr("disabled", true);
      $("#kt_login_singin_form_submit_button").addClass(" spinner spinner-white spinner-right")



      number = $('#number').val()
      password = $('#password').val()



      // data = {
      //   'number': number,
      //   'password': password
      // }
      // jsonText = JSON.stringify(data);

      $.ajax({
        url: 'ajax/login.php',
        method: "POST",
        data: {
          'number': number,
        'password': password
        },
        success: function (result) {

          $("#kt_login_singin_form_submit_button").attr("disabled", false);
          $("#kt_login_singin_form_submit_button").removeClass(" spinner spinner-white spinner-right")

          if (result == 3) {
            toastr.warning("Mobile Number or Password is Incorrect");
          } if (result == 2) {
            toastr.warning("User Not Found");
          } if (result == 1) {
            window.location.href = 'home/'
          }
        },
        error: function (er) {
          toastr.error("failed");
        }
      });
    }




  })


</script>