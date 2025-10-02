@extends('backend.admin.master')
@section('content')

<div class="page-wrapper">
      <div class="page-content">
            <h6 class="mb-0 text-uppercase">
                  <a href="{{ route('add_menu') }}">Add Menu</a>
            </h6>
            <hr/>
            <div class="card-body">
                 <form action="{{ route('menu_store') }}" method="post">
                  @csrf
                  <div class="form-row">
                        <div class="row">
                              <div class="form-group col-md-12">
                              <label for="menu_name">Menu Name <span class="text-danger">*</span></label>
                              <input type="text" name="menu_name" class="form-control" placeholder="menu_name">
                              @error('menu_name')
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