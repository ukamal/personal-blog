<div class="sidebar">
   <div class="sidebar-text d-flex flex-column h-100 justify-content-center text-center">
      <img class="mx-auto d-block w-75 bg-primary img-fluid rounded-circle mb-4 p-3" src="{{ asset($user->image) }}" alt="Image">
      <h1 class="font-weight-bold">{{ $user->name }}</h1>
      <p class="mb-4">
         {{ $user->description }}
       </p>
      <div class="d-flex justify-content-center mb-5">
         @if ($social->twitter)
                  <a class="btn btn-outline-primary mr-2" href="{{ $social->twitter }}"><i class="fab fa-twitter"></i></a>
         @endif
   
         @if ($social->facebook)
             <a class="btn btn-outline-primary mr-2" href="{{ $social->facebook }}"><i class="fab fa-facebook-f"></i></a>
         @endif

         @if ($social->linkedin)
         <a class="btn btn-outline-primary mr-2" href="{{ $social->linkedin }}"><i class="fab fa-linkedin-in"></i></a>
         @endif

         @if ($social->youtube)
            <a class="btn btn-outline-primary mr-2" href="{{ $social->youtube }}"><i class="fab fa-instagram"></i></a>
         @endif
        
       
      </div>
      <a href="" class="btn btn-lg btn-block btn-primary mt-auto">Hire Me</a>
   </div>
   <div class="sidebar-icon d-flex flex-column h-100 justify-content-center text-right">
      <i class="fas fa-2x fa-angle-double-right text-primary"></i>
   </div>
</div>