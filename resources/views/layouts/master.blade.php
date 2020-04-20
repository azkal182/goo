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

          @include('layouts.sidebar')


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
    <script type="text/javascript">
      $(document).ready(function(){
        $("#btn_getlog").click(function(){
          			 swal.fire(
    				        "error!",
    				        "Gagal Mengirim OTP",
    				        "error");
    			//var data = $('#iget_log').val();

    			// $.ajax({
    			// 	type: 'POST',
    			// 	url: "proseslog.php",
    			// 	data: {data:data},
    			// 	success: function(response) {
    			// 		//console.log(response);
    			// 		 if(response == false){
    			// 			 swal.fire(
    			// 	        "error!",
    			// 	        "Gagal Mengirim OTP",
    			// 	        "error"
    			// 	      )
    			// 		 } else {
    			// 			 swal.fire(
          //
    			// 	        "Sccess!",
    			// 	        "Kode OTP Berhasil dikirim ke = " + data,
    			// 	        "success"
    			// 	      )
    			// 				console.log(response);
    	    //      }
    			// 	}
    			// });
    		});
      });
    </script>
















  </body>
</html>
