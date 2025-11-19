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
                 <form id="blogForm" action="{{ route('store_blog') }}" method="post" enctype="multipart/form-data">
                  @csrf

                  <div class="form-row">
                        <div class="row">

                              <div class="form-group col-md-3">
                                    <label for="Title">Image <span class="text-danger">*</span></label>
                                    <input type="file" name="image" id="image" class="form-control" placeholder="Image URL">
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
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Blog Title">
                                    <span class="text-danger error" id="titleError"></span>
                                    @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                              </div>
                        </div>

                       <div class="row">
                         <div class="form-group col-md-6 mt-2">
                              <label for="description">Short Description <span class="text-danger">*</span></label>
                              <textarea name="short_desc" id="short_desc" class="form-control"></textarea>
                              <span class="text-danger error" id="shortDescError"></span>
                              @error('short_desc')
                                    <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>
                         <div class="form-group col-md-6 mt-2">
                              <label for="description">Long Description <span class="text-danger">*</span></label>
                               <textarea name="long_desc" id="long_desc" rows="5" class="form-control"></textarea>
                              <span class="text-danger error" id="longDescError"></span>
                              @error('long_desc')
                                    <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>
                       </div>

                        <div class="row">
                         <div class="form-group col-md-6 mt-2">
                              <label for="category_name">Category Name <span class="text-danger">*</span></label>
                              <input type="text" name="category_name" id="category_name" class="form-control" placeholder="category name">
                              <span class="text-danger error" id="categoryError"></span>
                              @error('category_name')
                                    <span class="text-danger">{{ $message }}</span>
                              @enderror
                        </div>
                         <div class="form-group col-md-6 mt-2">
                              <label for="description">Status <span class="text-danger">*</span></label>
                              <select name="status" id="status" class="form-control">
                                    <option value="draft">Draft</option>
                                    <option value="published">Published</option>
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
document.getElementById('blogForm').addEventListener('submit', function(e) {
    // Clear previous error messages
    document.querySelectorAll('.error').forEach(el => el.textContent = '');

    let valid = true;

    const image = document.getElementById('image').value.trim();
    const title = document.getElementById('title').value.trim();
    const short_desc = document.getElementById('short_desc').value.trim();
    const long_desc = document.getElementById('long_desc').value.trim();
    const category_name = document.getElementById('category_name').value.trim();
    const status = document.getElementById('status').value.trim();

    if (!image) {
        document.getElementById('imageError').textContent = 'Please upload an image';
        valid = false;
    }
    if (!title) {
        document.getElementById('titleError').textContent = 'Please enter a blog title';
        valid = false;
    }
    if (!short_desc) {
        document.getElementById('shortDescError').textContent = 'Please enter a short description';
        valid = false;
    }
    if (!long_desc) {
        document.getElementById('longDescError').textContent = 'Please enter a long description';
        valid = false;
    }
    if (!category_name) {
        document.getElementById('categoryError').textContent = 'Please enter a category name';
        valid = false;
    }
    if (!status) {
        document.getElementById('statusError').textContent = 'Please select a status';
        valid = false;
    }

    if (!valid) {
        e.preventDefault();
    }
});

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