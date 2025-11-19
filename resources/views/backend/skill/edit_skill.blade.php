@extends('backend.admin.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-wrapper">
      <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                  <div class="breadcrumb-title pe-3">Update Slider</div>
                 
            </div>
            <!--end breadcrumb-->
            <hr/>
            <div class="card-body">
                 <form action="{{ route('skill_update', $editData->id) }}" method="post" enctype="multipart/form-data">
                  @csrf

                  <div class="form-row">
                        <div class="row">

                        <div class="form-group col-md-12">
                              <label for="skill">Skill <span class="text-danger">*</span></label>
                              <input type="text" name="name" class="form-control" value="{{ $editData->name }}">
                              @error('name')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>
                        </div>

                       <div class="row">
                         <div class="form-group col-md-12 mt-2">
                              <label for="percent">Percent <span class="text-danger">*</span></label>
                              <input type="text" name="percent" class="form-control" value="{{ $editData->percent }}">
                              @error('percent')
                                    <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>
                     
                       </div>
                       <div class="row mt-4">
                        <button type="submit" class="btn btn-success form-control">Update</button>
                       </div>
                  </div>
                 </form>
            </div>
      </div>
</div>



@endsection