@extends('backend.admin.master')
@section('content')

<div class="page-wrapper">
      <div class="page-content">
            <!--breadcrumb-->
           
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">
                  <a href="{{ route('add_blog') }}">Add blog </a>
            </h6>
            <hr/>
            <div class="card">
                  <div class="card-body">
                        <div class="table-responsive">
                              <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                          <tr>
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Category Name</th>
                                                <th>Short Description</th>
                                                <th>Long Description</th>
                                                <th>Action</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach ($allData as $item)
                                          <tr>
                                                <td>
                                                      <img src="{{ asset($item->image) }}" alt="img" width="150px">
                                                </td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->category_name }}</td>
                                                <td>{!! Str::limit($item->short_desc, 20) !!}</td>
                                                <td>{!! Str::limit($item->long_desc, 30) !!}</td>
                                                <td>
                                                      <a href="{{ route('edit_blog',$item->id) }}" class="btn btn-success btn-sm">Edit</a>
                                                      <a href="{{ route('delete_blog',$item->id) }}" id="delete" class="btn btn-danger btn-sm" >Delete</a>
                                                </td>
                                          </tr>
                                          @endforeach
                                    
                                    </tbody>
                                 
                              </table>
                        </div>
                  </div>
            </div>
      </div>
</div>

@endsection