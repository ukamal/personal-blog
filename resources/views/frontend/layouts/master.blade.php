<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Bloggy - Personal Blog Template</title>
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="Free Website Template" name="keywords">
      <meta content="Free Website Template" name="description">
      <!-- Favicon -->
      <link href="img/favicon.ico" rel="icon">
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Open+Sans:300;400;600;700;800&display=swap" rel="stylesheet">
      <!-- Font Awesome -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <!-- Customized Bootstrap Stylesheet -->
      <link href="{{ asset('frontend/assets/css/style.css')}}" rel="stylesheet">
            	<!-- Toastr CSS -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
   </head>
   <body>
      <div class="wrapper">
            @include('frontend.layouts.sidebar')
         <div class="content">
            <!-- Navbar Start -->
           @include('frontend.layouts.navbar')
            <!-- Navbar End -->
            <!-- Carousel Start -->
            @yield('content')
            <!-- Blog List End -->
            <!-- Footer Start -->
            @include('frontend.layouts.footer')
            <!-- Footer End -->
         </div>
      </div>
      <!-- Back to Top -->
      <a href="#" class="back-to-top"><i class="fa fa-angle-double-up"></i></a>
      <!-- JavaScript Libraries -->
      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
      
      <script src="{{ asset('frontend/assets/lib/easing/easing.min.js') }}"></script>
      <script src="{{ asset('frontend/assets/lib/waypoints/waypoints.min.js') }}"></script>

      <!-- Contact Javascript File -->
      <script src="mail/jqBootstrapValidation.min.js"></script>
      <script src="mail/contact.js"></script>
      <!-- Template Javascript -->
      <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
                  <!-- Toastr JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	   <script>
         @if(Session::has('message'))
         var type = "{{ Session::get('alert-type','info') }}"
         switch(type){
            case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
            case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
            case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
            case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
         }
         @endif
      </script>

   </body>
</html>