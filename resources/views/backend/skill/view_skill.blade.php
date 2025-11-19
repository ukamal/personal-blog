@extends('backend.admin.master')
@section('content')

<div class="page-wrapper">
      <div class="page-content">
            <!--breadcrumb-->
           
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">
                  <a href="{{ route('add_skill') }}">Add skill </a>
            </h6>
            <hr/>
            <div class="card">
                  <div class="card-body">
                        <div class="table-responsive">
                              <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                          <tr>
                                                <th>Skill Name</th>
                                                <th>Percentage</th>
                                                <th>Action</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach ($allData as $item)
                                          <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->percent }}</td>
                                                <td>
                                                      <a href="{{ route('edit_skill',$item->id) }}" class="btn btn-success btn-sm">Edit</a>
                                                      <a href="{{ route('delete_skill',$item->id) }}" id="delete" class="btn btn-danger btn-sm" >Delete</a>
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