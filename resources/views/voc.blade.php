@extends('layouts.master')

@section('content')
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-home"></i>
      </span> Voucher </h3>
    <nav aria-label="breadcrumb">
      <ul class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">
          <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
        </li>
      </ul>
    </nav>
  </div>



  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Daftar Voucher</h4>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>No</th>
                <th>TKP</th>
                <th>Voucher</th>
              </tr>
            </thead>
            <tbody>

                @foreach($voc as $li)
                <tr>
                 <td>{{ $li->id }}</td>
                 <td>{{ $li->tkp }}</td>
                 <td>{{ $li->voucher }}</td>
                 </tr>
                 @endforeach



            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>

  <!-- @foreach($voc as $li)
  <ul>
   <li>{{ $li->id }}</li>
 </ul>
   @endforeach -->



@endsection
