@extends('layouts.master')

@section('content')
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-home"></i>
      </span> Daftar </h3>
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
              <input type="text" class="form-control" id="iget_reg" placeholder="+62xxxxx">
            </div>


            <div class="form-group">
              <label for="exampleInputPassword4">OTP</label>
              <input type="text" class="form-control" id="iverif_reg" placeholder="OTP">
            </div>

            <button id="btn_getreg" type="button" class="btn btn-gradient-primary mr-2">Get OTP</button>
            <button id="btn_verreg" type="button" class="btn btn-gradient-success">Verifikasi</button>
          </form>
        </div>
      </div>
    </div>
  </div>



@endsection
