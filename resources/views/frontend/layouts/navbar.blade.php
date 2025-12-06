<div class="container p-0">
   <nav class="navbar navbar-expand-lg bg-secondary navbar-dark">
      <a href="" class="navbar-brand d-block d-lg-none">Navigation</a>
      <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
         <div class="navbar-nav m-auto">

            @foreach ($menus as $menu)
                   <a href="{{ route('showMenu',$menu->id ) }}" class="nav-item nav-link">{{ $menu->menu_name }}</a>
            @endforeach
        
            @if ($submenus->count() > 0)
            <div class="nav-item dropdown">
               <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
               <div class="dropdown-menu">
                  @foreach ($submenus as $sub)
                     <a href="blog.html" class="dropdown-item">{{ $sub->sub_menu_name }}</a>
                  @endforeach
          
               </div>
            </div>
            @endif
         </div>
      </div>
   </nav>
</div>