@extends('backend.admin.master')
@section('content')

<div class="page-wrapper">
      <div class="page-content">
            <h6 class="mb-0 text-uppercase">
                  <a href="{{ route('add_sub_menu') }}">Add SubMenu</a>
            </h6>
            <hr/>
            <div class="card-body">
                 <form action="{{ route('sub_menu_store') }}" method="post">
                  @csrf
                  <div class="form-row">
                        <div class="row">
                              <div class="form-group col-md-12">
                              <label for="sub_menu_name">Menu Name <span class="text-danger">*</span></label>
                              <input type="text" name="sub_menu_name" class="form-control" placeholder="sub_menu_name">
                              @error('sub_menu_name')
                                    <span class="text-danger">{{ $message }}</span>
                              @enderror
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