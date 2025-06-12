@extends('backend.admin.master')
@section('content')
<div class="wrapper">

<!--start page wrapper -->
<div class="page-wrapper">
<div class="page-content"> 
      <!--breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">User Profile</div>
            <div class="ps-3">
                  <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                              <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                              </li>
                              <li class="breadcrumb-item active" aria-current="page">User Profilep</li>
                        </ol>
                  </nav>
            </div>
            <div class="ms-auto">
                  <div class="btn-group">
                        <button type="button" class="btn btn-primary">Settings</button>
                        <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
                              <a class="dropdown-item" href="javascript:;">Another action</a>
                              <a class="dropdown-item" href="javascript:;">Something else here</a>
                              <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
                        </div>
                  </div>
            </div>
      </div>
      <!--end breadcrumb-->
      <div class="container">
            <div class="main-body">
                  <div class="row">
                        <div class="col-lg-8">
                              <form action="{{ route('profile.update',$userData->id) }}" method="post" enctype="multipart/form-data">
                              @csrf

                                    <div class="card">
                                    <div class="card-body">
                                          <div class="d-flex flex-column align-items-center text-center">
                                                <img src="{{ asset($userData->image )}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                                                <div class="mt-3">
                                                      <h4>{{ $userData->name }}</h4>
                                               
                                                      <textarea name="description" id="">
                                                            {{ $userData->description }}
                                                      </textarea>
                                                </div>
                                          </div>
                                          <div class="row mb-3">
                                                <div class="col-sm-3">
                                                      <h6 class="mb-0">Image Update</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                      <input type="file" class="form-control" name="image" />
                                                </div>
                                          </div>
                                          <div class="row mb-3">
                                                <div class="col-sm-3">
                                                      <h6 class="mb-0">Full Name</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                      <input type="text" class="form-control" name="name" value="{{ $userData->name }}" />
                                                </div>
                                          </div>
                                          <div class="row mb-3">
                                                <div class="col-sm-3">
                                                      <h6 class="mb-0">Email</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                      <input type="email" class="form-control" name="email" value="{{ $userData->email }}" />
                                                </div>
                                          </div>
                                          
                                          <div class="row">
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9 text-secondary">
                                                      <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              
                              </form>
                        </div>
                  </div>
            </div>
      </div>
</div>
</div>
<!--end page wrapper -->

</div>
@endsection