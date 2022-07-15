<?php include '../include/header1.php';

$cityId=isset($_GET["Id"])?$_GET["Id"]:"";

if (isset($_POST["submit"])) {
$city=$_POST["address"];

if(isset($_GET["Id"])){


  $query=mysqli_query($connection,"UPDATE `city` SET `cityName`='".$city."' WHERE `cityId`='".$cityId."' ")
}



}

?>

<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
  <!--begin::Subheader-->
  <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
      <!--begin::Info-->
      <div class="d-flex align-items-center flex-wrap mr-2">
        <!--begin::Page Title-->
        <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">City</h5>
        <!--end::Page Title-->

        <!--begin::Actions-->
        <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>

        <span class="text-muted font-weight-bold mr-4"> Add City</span>
      </div>
      <!--end::Info-->
    </div>
  </div>
  <!--end::Subheader-->

  <!--begin::Entry-->
  <div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
      <div class="card card-custom gutter-b">
        <div class="card-header">
          <div class="card-title">
            <h3 class="card-label">Add City</h3>
          </div>
        </div>
        <div class="card-body">
          <form class="form" method="POST" id="form">


            <div class="form-group row">
              <label class="col-form-label text-right col-lg-3 col-sm-12">City <label class="error">*</label></label>




              <div class="col-lg-4">

                <input id="autocomplete1" class="form-control" type="text" name="address" placeholder="Enter a location" value="" />

                <!-- <input id="autocomplete1" class="form-control CityName" type="text" name="address" placeholder="Enter a location" value="" /> -->
                <input type="hidden" name="longitude" id="longitude" value="" />
                <input type="hidden" name="latitude" id="latitude" value="" />

                <input type="hidden" name="cityId" id="cityId" value="" />
              </div>
            </div>


            <div class="card-footer" style="text-align: center">
              <button type="submit" name="submit" class="btn btn-primary mr-2">
                Submit
              </button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include '../include/footer1.php' ?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDhbSr2D_Gklfypzh_ohvm00iZXukYL9tA&libraries=places&callback=initAutocomplete" async defer></script>

<script>
  //Google Address
  var placeSearch, autocomplete, autocomplete1;

  var componentForm = {
    locality: "long_name",
    administrative_area_level_1: "long_name",
    country: "long_name",
    postal_code: "short_name",
  };

  function initAutocomplete() {
    // Create the autocomplete object, restricting the search predictions to
    // geographical location types.
    autocomplete = new google.maps.places.Autocomplete(
      document.getElementById("autocomplete"), {
        types: ["geocode"]
      }
    );

    autocomplete1 = new google.maps.places.Autocomplete(
      document.getElementById("autocomplete1"), {
        types: ["geocode"]
      }
    );

    // Avoid paying for data that you don't need by restricting the set of
    // place fields that are returned to just the address components.
    autocomplete.setFields(["address_component"]);

    autocomplete1.setFields(["address_component"]);

    var input = document.getElementById("autocomplete");

    var options = {};

    var autocomplete = new google.maps.places.Autocomplete(input, options);

    google.maps.event.addListener(autocomplete, "place_changed", function() {
      var place = autocomplete.getPlace();
      var lat = place.geometry.location.lat();
      var lng = place.geometry.location.lng();

      $("#latitude").val(lat);
      $("#longitude").val(lng);
    });

    var input1 = document.getElementById("autocomplete1");

    var options1 = {
      types: ["(cities)"]
    };

    var autocomplete1 = new google.maps.places.Autocomplete(input1, options1);

    /*autocomplete1.setComponentRestrictions(
            {'country': ['in', 'pt', 'us']});*/

    // When the user selects an address from the drop-down, populate the
    // address fields in the form.

    google.maps.event.addListener(autocomplete1, "place_changed", function() {
      var place = autocomplete1.getPlace();
      var lat = place.geometry.location.lat();
      var lng = place.geometry.location.lng();

      $("#latitude").val(lat);
      $("#longitude").val(lng);

      // to set city name, using the locality param
      var componentForm = {
        locality: "short_name",
      };
      for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
          var val = place.address_components[i][componentForm[addressType]];
          document.getElementById("city").value = val;
        }
      }
    });
  }

  function geolocate() {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(position) {
        var geolocation = {
          lat: position.coords.latitude,
          lng: position.coords.longitude,
        };
        var circle = new google.maps.Circle({
          center: geolocation,
          radius: position.coords.accuracy,
        });
        autocomplete.setBounds(circle.getBounds());
        autocomplete1.setBounds(circle.getBounds());
      });
    }
  }
</script>




<script>
  $("#form").validate({
    rules: {
      address: {
        required: true,
      },
    },

    messages: {
      address: {
        required: "city is Required",
      },
    },
    submitHandler: function(form) {




      if (isUpdate != 0) {
        url = "/updateCity/";
        data = {
          cityName: $(".CityName").val(),
          latitude: $("#latitude").val(),
          longitude: $("#longitude").val(),
          cityId: $("#cityId").val()

        };


      } else {
        url = "/insertCity/";

        data = {
          cityName: $(".CityName").val(),
          latitude: $("#latitude").val(),
          longitude: $("#longitude").val(),
        };
      }
      jsonText = JSON.stringify(data);
      $("#kt_save_content").attr("disabled", true);

      $.ajax({
        url: url,
        method: "POST",
        data: {
          csrfmiddlewaretoken: "{{ csrf_token }}",
          data: jsonText,
        },

        success: function(result) {
          if (result == "3") {
            toastr.error("Somthing Went wrong");
          }
          if (result == "2") {
            toastr.warning("Record Already Exist");
          }
          if (result == "1") {

            if (isUpdate != 0) {
              toastr.success("Record Update Successfull");

            } else {
              toastr.success("Record inserted Successfull");

            }
          }
        },
        error: function(er) {
          toastr.error("failed");
        },
      });
    },
  });
</script>