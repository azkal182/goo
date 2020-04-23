<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="admin/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin/assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="admin/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" />

    <link rel="stylesheet" href="sweetalert/sweetalert2.min.css">







<style media="screen">
.main-panel {
  -webkit-transition: width 0.25s ease, margin 0.25s ease;
  transition: width 0.25s ease, margin 0.25s ease;
  width: 100% !important;
  min-height: calc(100vh - 70px);
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -ms-flex-direction: column;
  flex-direction: column;
}
</style>


<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->




  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->









      <!-- HEADER -->

        @include('layouts.header')


        <!-- END HEADER -->










      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->


        <!-- sidebar -->




          <!-- END sidebar -->


        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">

            @yield('content')
          </div>
          <!-- content-wrapper ends -->

          <!-- partial:../../partials/_footer.html -->



          <!-- footer -->

            @include('layouts.footer')


            <!-- END footer -->

          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->


    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="admin/assets/js/off-canvas.js"></script>
    <script src="admin/assets/js/hoverable-collapse.js"></script>
    <script src="admin/assets/js/misc.js"></script>

    	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

      <script src="sweetalert/sweetalert2.min.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <!-- End custom js for this page -->


     <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>











    <script type="text/javascript">

    $(document).ready(function(){
  $("#myBtn").click(function(){
     $('#empModal').modal('show');
  });
});

      $(document).ready(function(){



        $("#btn_getlog").click(function(){
    			var data = $('#iget_log').val();

    			$.ajax({
    				type: 'POST',
    				url: "myjs/proseslog.php",
    				data: {data:data},
    				success: function(response) {
    					//console.log(response);
    					 if(response == false){
    						 swal.fire(
    				        "error!",
    				        "Gagal Mengirim OTP",
    				        "error"
    				      )
    					 } else {
    						 swal.fire(

    				        "Sccess!",
    				        "Kode OTP Berhasil dikirim ke = " + data,
    				        "success"
    				      )
    							console.log(response);
    	         }
    				}
    			});
    		});


        $("#btn_verlog").click(function(){
    			var data = $('#iverif_log').val();
    			$.ajax({
    				type: 'POST',
    				url: "myjs/prosesverif.php",
    				data: {data:data},
    				success: function(response) {
    					 if(response == false){
    						 swal.fire(
    	 						 "error!",
    	 						 "Verifikasi Gagal",
    	 						 "error"
    	 					 )



    						 //alert ('oke');
    					 } else {
    						 console.log(response);
    						 $('#title-modal').html(response);
    	           $('#empModal').modal('show');
    	         }

    				}
    			});
    		});

    });
    </script>
















  </body>
</html>
