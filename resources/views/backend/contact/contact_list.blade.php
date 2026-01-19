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
                                                <th>User Name</th>
                                                <th> Email</th>
                                                <th> Subjet</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                                <th>Action</th>
                                          </tr>
                                    </thead>
                                    <tbody>
                                          @foreach ($contacts as $item)
                                          <tr>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->subject }}</td>
                                                <td>{{ $item->message }}</td>
                                                <td>{{ $item->created_at }}</td>
                                                <td>
                                                      <a href="{{ route('delete_contact',$item->id) }}" id="delete" class="btn btn-danger btn-sm" >Delete</a>
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