 <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
               <div>
                  <h4 class="logo-text">Portfolio</h4>
               </div>
               <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
               </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
               <li>
                  <a href="{{ route('dashboard') }}" class="has-arrow">
                     <div class="parent-icon"><i class='bx bx-home-circle'></i>
                     </div>
                     <div class="menu-title">Dashboard</div>
                  </a>
               </li>

               <li>
                  <a href="javascript:;" class="has-arrow">
                     <div class="parent-icon"><i class="bx bx-category"></i>
                     </div>
                     <div class="menu-title">Application</div>
                  </a>
                  <ul>
                     <li> <a href="{{ route('view_social') }}"><i class="bx bx-right-arrow-alt"></i>Social</a>
                     </li>
                  </ul>
               </li>

               <li>
                  <a href="javascript:;" class="has-arrow">
                     <div class="parent-icon"><i class="bx bx-category"></i>
                     </div>
                     <div class="menu-title">Menus</div>
                  </a>
                  <ul>
                     <li> 
                        <a href="{{ route('view_menu') }}"><i class="bx bx-right-arrow-alt"></i>Menus</a>
                     </li>
                     <li> 
                        <a href="{{ route('view_sub_menu') }}"><i class="bx bx-right-arrow-alt"></i>SubMenu</a>
                     </li>
                  </ul>
               </li>

               <li>
                  <a href="javascript:;" class="has-arrow">
                     <div class="parent-icon"><i class="bx bx-category"></i>
                     </div>
                     <div class="menu-title">Slider</div>
                  </a>
                  <ul>
                     <li> 
                        <a href="{{ route('view_slider') }}"><i class="bx bx-right-arrow-alt"></i>Slider</a>
                     </li>
                  </ul>
               </li>

               <li>
                  <a href="javascript:;" class="has-arrow">
                     <div class="parent-icon"><i class="bx bx-category"></i>
                     </div>
                     <div class="menu-title">Skill</div>
                  </a>
                  <ul>
                     <li> 
                        <a href="{{ route('view_skill') }}"><i class="bx bx-right-arrow-alt"></i>Skill</a>
                     </li>
                  </ul>
               </li>

               <li>
                  <a href="javascript:;" class="has-arrow">
                     <div class="parent-icon"><i class="bx bx-category"></i>
                     </div>
                     <div class="menu-title">Manage Blog</div>
                  </a>
                  <ul>
                     <li> 
                        <a href="{{ route('view_blog') }}"><i class="bx bx-right-arrow-alt"></i>View Blog</a>
                     </li>
                  </ul>
               </li>


            </ul>
            <!--end navigation-->
         </div>