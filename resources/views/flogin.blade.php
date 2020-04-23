@extends('layouts.master')

@section('content')
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-home"></i>
      </span> Login </h3>
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
        </li>
      </ul>
    </nav>
  </div>
  <div class="row">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Basic form elements</h4>
          <p class="card-description"> Basic form elements </p>
          <form class="forms-sample">
            <div class="form-group">
              <label for="exampleInputName1">Nomor</label>
              <input type="text" class="form-control" id="iget_log" placeholder="+62xxxxx">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword4">OTP</label>
              <input type="text" class="form-control" id="iverif_log" placeholder="OTP">
            </div>

            <button id="btn_getlog" type="button" class="btn btn-gradient-primary mr-2">Get OTP</button>
            <button id="btn_verlog" type="button" class="btn btn-gradient-success">Verifikasi</button>
          </form>
        </div>
      </div>
    </div>
  </div>


  <div class="container">
  <h2>Activate Modal with JavaScript</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-info btn-lg" id="myBtn">Open Modal</button>

  <!-- Modal -->
  <div class="modal fade" data-keyboard="false" data-backdrop="static" id="empModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header" id="title-modal">
	        <!-- <h5 class="modal-title" id="exampleModalLongTitle">Token :</h5> -->
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
					<form id="form-ku2" method="post"  action="ssd.html" role="login">
						<img src="assets/images/gooo.png" class="img-responsive" alt="" />
						<div class="form-group col-md-12">
				      <!-- <label for="inputState">State</label> -->
				      <select id="inputState" class="form-control">
				        <option selected>Pilih TKP</option>
				        <option>Jakarta</option>
								<option>Medan</option>
								<option>Surabaya</option>

				      </select>
				    </div>


						<input style="width: 45%;" type="button" id="btn_dor" name="" value="DORR" class="btn btn-gradient-primary ">
						<input style="width: 45%;" type="button" id="btn_cek" name="" value="Cek" class="pull-right btn btn-info">


						<div class="form-group">
					    <label for="exampleFormControlTextarea1">Log</label>
					    <textarea class="form-control" id="logarea" rows="8"></textarea>
					  </div>



						<!-- <div>
							<a href="#">Create account</a> or <a href="#">reset password</a>
						</div> -->
					</form>
	      </div>
	      <div class="modal-footer">
	        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
	        <button type="button" onclick="window.location.href = 'logout.php';" class="btn btn-primary">Log Out</button>
	      </div>
	    </div>
	  </div>
	</div>

</div>











@endsection
