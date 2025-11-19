@extends('backend.admin.master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div class="page-wrapper">
      <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                  <div class="breadcrumb-title pe-3">Add Blog</div>
            </div>
            <!--end breadcrumb-->
            <hr/>
            <div class="card-body">
                 <form id="blogForm" action="{{ route('update_blog', $editData->id) }}" method="post" enctype="multipart/form-data">
                  @csrf

                  <div class="form-row">
                        <div class="row">

                              <div class="form-group col-md-3">
                                    <label for="Title">Image <span class="text-danger">*</span></label>
                                    <input type="file" name="image" id="image" class="form-control" placeholder="Image URL">

                                    <input type="hidden" name="old_image" value="{{ $editData->image }}">
                                    <img src="{{ asset($editData->image) }}" alt="img" width="100px">

                                    <span class="text-danger error" id="imageError"></span>
                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                              </div>
                              <div class="form-group col-md-3">
                                    <img src="{{ url('upload/blog_image/default.png') }}" id="showImg" alt="slider-image" width="100px" height="100px">
                              </div>

                              <div class="form-group col-md-6">
                                    <label for="Title">Blog Title <span class="text-danger">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control" value="{{ $editData->title }}">
                                    <span class="text-danger error" id="titleError"></span>
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                              </div>
                        </div>

                       <div class="row">
                         <div class="form-group col-md-6 mt-2">
                              <label for="description">Short Description <span class="text-danger">*</span></label>
                              <textarea name="short_desc" id="short_desc" class="form-control" value="{{ $editData->short_desc }}">
                                    {{ $editData->short_desc }}
                              </textarea>
                              <span class="text-danger error" id="shortDescError"></span>
                              @error('short_desc')
                                    <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>
                         <div class="form-group col-md-6 mt-2">
                              <label for="description">Long Description <span class="text-danger">*</span></label>
                               <textarea name="long_desc" id="long_desc" rows="5" class="form-control" value="{{ $editData->long_desc }}">
                                    {{ $editData->long_desc }}
                               </textarea>
                              <span class="text-danger error" id="longDescError"></span>
                              @error('long_desc')
                                    <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>
                       </div>

                        <div class="row">
                         <div class="form-group col-md-6 mt-2">
                              <label for="category_name">Category Name <span class="text-danger">*</span></label>
                              <input type="text" name="category_name" id="category_name" class="form-control" value="{{ $editData->category_name }}">
                              <span class="text-danger error" id="categoryError"></span>
                              @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>

                        <div class="form-group col-md-6 mt-2">
                        <label for="description">Status <span class="text-danger">*</span></label>
                        <select name="status" id="status" class="form-control">
                              <option value="draft" {{ $editData->status == 'draft' ? 'selected' : '' }}>Draft</option>
                              <option value="published" {{ $editData->status == 'published' ? 'selected' : '' }}>Published</option>
                        </select>
                        <span class="text-danger error" id="statusError"></span>
                        @error('status')
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


<script>

// show image from here 
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