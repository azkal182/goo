@extends('layouts.master')

@section('content')
  <div class="page-header">
    <h3 class="page-title">
      <span class="page-title-icon bg-gradient-primary text-white mr-2">
        <i class="mdi mdi-home"></i>
      </span> User </h3>
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
          <h4 class="card-title">Daftar User</h4>
          <table class="table">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>email</th>
                <th>Alamat</th>
                <th>Role</th>
                <th>Status</th>
                <th>Action</th>

              </tr>
            </thead>
            <tbody>

                @foreach($liat as $li)
                <tr>
                 <td>{{ $li->id }}</td>
                 <td>{{ $li->name }}</td>
                 <td>{{ $li->email }}</td>
                 <td>Cerih</td>
                 <td>Admin</td>

                 <td><label class="badge badge-danger">Pending</label></td>
                 <td>
                   <button type="button" class="btn btn-gradient-primary" name="button"><i class="mdi mdi-check"></i></button>

                   <a href="#"></a>
                   <a href="#"><i class="mdi mdi-key"></i></a>
                   <a href="#"><i class="mdi mdi-delete"></i></a>



                 </td>
                 </tr>
                 @endforeach



            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>


@endsection
