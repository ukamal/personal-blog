@extends('backend.admin.master')
@section('content')

<div class="page-wrapper">
      <div class="page-content">
            <!--breadcrumb-->
           
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">
                  <a href="{{ route('add_slider') }}">Add slider</a>
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
                                                <th>Sub Title</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach ($allData as $item)
                                          <tr>
                                                 <td>
                                                      <img src="{{ asset($item->slider_image )}}" alt="img" width="100">
                                                </td>
                                                <td>{{ $item->title }}</td>
                                                <td>{{ $item->sub_title }}</td>
                                                <td>{{ $item->slider_date }}</td>
                                                <td>
                                                      <a href="{{ route('edit_slider',$item->id) }}" class="btn btn-success btn-sm">Edit</a>
                                                      <a href="{{ route('delete_slider',$item->id) }}" id="delete" class="btn btn-danger btn-sm" >Delete</a>
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