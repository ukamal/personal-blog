@extends('backend.admin.master')
@section('content')

<div class="page-wrapper">
      <div class="page-content">
            <div class="card">
                  <div class="card-body">
                        <div class="table-responsive">
                              <table id="example" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                          <tr>
                                                <th> Name</th>
                                                <th> Email</th>
                                                <th> Website</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach ($alData as $item)
                                          <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->website }}</td>
                                                <td>{{ $item->message }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                     
                                                    @if ($item->status == 0)
                                                          <a href="{{ route('status', $item->id) }}" class="btn btn-success btn-sm">Active</a>
                                                    @elseif ($item->status == 1)
                                                          <a href="#" class="btn btn-info btn-sm">DeActive</a>
                                                    @endif

                                                      <a href="{{ route('delete_comment',$item->id) }}" id="delete" class="btn btn-danger btn-sm ms-2" >Delete</a>
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