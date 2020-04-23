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
          @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
          <table class="table">
            <thead>

            <tr>
                              <th>No</th>
                              <th>User name</th>
                              <th>Email</th>
                              <th>Member</th>

                              <th>status</th>
                              <th></th>
                          </tr>
                    </thead>
                     <tbody>
                          @forelse ($users as $user)
                              <tr>
                                  <td>{{ $user->id }}</td>
                                  <td>{{ $user->name }}</td>
                                  <td>{{ $user->email }}</td>
                                  <td>
                                    @if ($user->admin==1)
                                      admin
                                    @else
                                      member
                                    @endif
                                  </td>
                                  <td>@if ($user->approved_at == NULL)
                                    <label class="badge badge-danger">Pending</label>
                                  @else
                                      <label class="badge badge-success">Active</label>
                                    @endif
                                </td>
                                  <td>
                                    @if ($user->approved_at == NULL)
                                    <a href="{{ route('admin.users.approve', $user->id) }}"
                                         class="btn btn-primary btn-sm">Approve</a>
                                    @else
                                    <a href="{{ route('admin.users.deactive', $user->id) }}"
                                         class="btn btn-primary btn-sm">Deactive</a>
                                      @endif


                                    <!-- <a href="{{ route('admin.users.approve', $user->id) }}"
                                         class="btn btn-primary btn-sm">Approve</a></td> -->
                                       </td>
                              </tr>
                              @empty
                              <tr>
                                  <td colspan="4">No users found.</td>
                              </tr>
                          @endforelse
                          </tbody>



          </table>
        </div>
      </div>
    </div>

  </div>


@endsection
