@extends('backend.admin.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-wrapper">
      <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                  <div class="breadcrumb-title pe-3">Add Slider</div>
                  <div class="ps-3">
                        <nav aria-label="breadcrumb">
                              <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Data Table</li>
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
            <hr/>
            <div class="card-body">
                 <form action="{{ route('skill_store') }}" method="post">
                  @csrf

                  <div class="form-row">
                        <div class="row">
                      

                        <div class="form-group col-md-12">
                              <label for="Title">Skill Name <span class="text-danger">*</span></label>
                              <input type="text" name="name" class="form-control" placeholder="Skill Name">
                              @error('name')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>
                        </div>

                       <div class="row">
                         <div class="form-group col-md-12 mt-2">
                              <label for="sub_title">Percentage <span class="text-danger">*</span></label>
                              <input type="text" name="percent" class="form-control" placeholder="Percentage">
                              @error('percent')
                                    <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>
                      
                       </div>
                       <div class="row mt-4">
                        <button type="submit" class="btn btn-success form-control">Submit</button>
                       </div>
                  </div>
                 </form>
            </div>
      </div>
</div>



@endsection