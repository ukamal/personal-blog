@extends('backend.admin.master')
@section('content')

<div class="page-wrapper">
      <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                  <div class="breadcrumb-title pe-3">Update SubMenu</div>
                
            </div>
            <!--end breadcrumb-->
           
            <div class="card-body">
                 <form action="{{ route('sub_menu_update',$updateData->id) }}" method="post">
                  @csrf
                  <div class="form-row">
                        <div class="row">
                              <div class="form-group col-md-12">
                              <label for="sub_menu_name">SubMenu Name <span class="text-danger">*</span></label>
                              <input type="text" name="sub_menu_name" class="form-control" value="{{ $updateData->sub_menu_name }}">
                              @error('sub_menu_name')
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