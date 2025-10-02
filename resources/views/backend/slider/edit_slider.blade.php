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
                 <form action="{{ route('slider_update', $editData->id) }}" method="post" enctype="multipart/form-data">
                  @csrf

                  <div class="form-row">
                        <div class="row">
                        <div class="form-group col-md-3">
                              <label for="slider_image">Slider Image <span class="text-danger">*</span></label>
                              <input type="file" name="slider_image" id="image" class="form-control">
                              <input type="hidden" name="old_image" value="{{ $editData->slider_image }}">
                              <img src="{{ asset($editData->slider_image) }}" alt="img" width="100px">
                              @error('slider_image')
                                    <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>

                        <div class="form-group col-md-3">
                              <img src="{{ url('upload/slider_image') }}" id="showImg" alt="slider-image" width="100px" height="100px">
                        </div>

                        <div class="form-group col-md-6">
                              <label for="Title">Title <span class="text-danger">*</span></label>
                              <input type="text" name="title" class="form-control" value="{{ $editData->title }}">
                              @error('Title')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>
                        </div>

                       <div class="row">
                         <div class="form-group col-md-6 mt-2">
                              <label for="sub_title">Sub Title <span class="text-danger">*</span></label>
                              <input type="text" name="sub_title" class="form-control" value="{{ $editData->sub_title }}">
                              @error('sub_title')
                                    <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>
                        <div class="form-group col-md-6 mt-2">
                              <label for="Date">Date <span class="text-danger">*</span></label>
                              <input type="date" name="slider_date" class="form-control" value="{{ $editData->slider_date }}">
                              @error('date')
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

<script>
      $(document).ready(function(){
            $('#image').change(function(e){
                  var reader = new FileReader();
                  reader.onload = function(e){
                        $('#showImg').attr('src',e.target.result);
                  }
                  reader.readAsDataURL(e.target.files['0']);
            });
      });
</script>

@endsection