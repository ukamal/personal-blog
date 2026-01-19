@extends('frontend.layouts.master')
@section('content')

<!-- Page Header Start -->
      <div class="container py-5 px-2 bg-primary">
          <div class="row py-5 px-4">
              <div class="col-sm-6 text-center text-md-left">
                  <h1 class="mb-3 mb-md-0 text-white text-uppercase font-weight-bold">Blog Detail</h1>
              </div>
              <div class="col-sm-6 text-center text-md-right">
                  <div class="d-inline-flex pt-2">
                      <h4 class="m-0 text-white"><a class="text-white" href="">Home</a></h4>
                      <h4 class="m-0 text-white px-2">/</h4>
                      <h4 class="m-0 text-white">Blog Detail</h4>
                  </div>
              </div>
          </div>
      </div>
      <!-- Page Header End -->

      <!-- Blog Detail Start -->
      <div class="container py-5 px-2 bg-white">
          <div class="row px-4">
              <div class="col-12">
                  <img class="img-fluid mb-4" src="{{  asset($details->image) }}" alt="Image">
                  <h2 class="mb-3 font-weight-bold">{{  $details->title }}</h2>
                  <div class="d-flex">
                      <p class="mr-3 text-muted"><i class="fa fa-calendar-alt"></i> {{  $details->published_at }}</p>
                      <p class="mr-3 text-muted"><i class="fa fa-folder"></i> {{  $details->category_name }}</p>
                      <p class="mr-3 text-muted"><i class="fa fa-comments"></i> {{  $details->comments_count }}</p>
                  </div>
                  <p>{{  $details->short_desc }}</p>
                  <h3 class="mb-3 font-weight-bold">{{  $details->title }}</h3>
                  <img class="w-50 float-left mr-4 mb-3" src="{{  asset($details->image) }}" alt="Image">
                  <p>{{!!  $details->long_desc !!}}</p>
              </div>

              @php
                  $comments = App\Models\Comment::where('status',1)->get();
              @endphp
          
              <div class="col-12 py-4">
                  <h3 class="mb-4 font-weight-bold">{{ $comments->count() }} Comments</h3>
                  @foreach($comments as $comment)
                  <div class="media mb-4">
                      <img src="{{ asset('user.png') }}" alt="Image" class="mr-3 mt-1 rounded-circle" style="width:60px;">
                      <div class="media-body">
                          <h4>{{ $comment->name }}</i> <small class="ms-2">{{ $comment->created_at }}</small></h4>
                          <p>{{ $comment->message }}</p>
                          <button class="btn btn-sm btn-light">Reply</button>
                      </div>
                  </div>
                  @endforeach
              </div>
              <div class="col-12">
                  <h3 class="mb-4 font-weight-bold">Leave a comment</h3>
                  <form action="{{ route('comment.store') }}" method="post">
                    @csrf

                      <div class="form-group">
                          <label for="name">Name *</label>
                          <input type="text" class="form-control" id="name" name="name" required>
                          @error('name')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="email">Email *</label>
                          <input type="email" class="form-control" id="email" name="email" required>
                              @error('email')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                          <label for="website">Website</label>
                          <input type="url" class="form-control" id="website" name="website" required>
                              @error('website')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>

                      <div class="form-group">
                          <label for="message">Message *</label>
                          <textarea id="message" cols="30" rows="5" class="form-control" name="message" required></textarea>
                              @error('message')
                              <span class="text-danger">{{ $message }}</span>
                          @enderror
                      </div>
                      <div class="form-group">
                          <input type="submit" value="Leave Comment" class="btn btn-primary">
                      </div>
                  </form>
              </div>
          </div>
      </div>
      <!-- Blog Detail End -->


@endsection