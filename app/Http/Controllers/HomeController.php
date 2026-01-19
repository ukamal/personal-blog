<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Menu;
use App\Models\SubMenu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showMenu($id){
        // dd('ok');

        $menu = Menu::find($id);

        if($menu){
            switch($menu->menu_name){
                case 'Home':
                    return view('frontend.layouts.index');
                    break;
                case 'About':
                    return view('/frontend/singlepage/about');
                    break;
                case 'Contact':
                    return view('frontend.singlepage.contact');
                    break;
                default:
                    return view('frontend.layouts.index');
                    break;
            }
        }
    }

    public function showSubMenu($id){
        $submenu = SubMenu::find($id);
        // dd($submenu);
            if($submenu){
            switch($submenu->sub_menu_name){
                case 'Blog 1':
                    return view('frontend.singlepage.blog');
                    break;
                case 'Blog 2':
                    return view('frontend.singlepage.blog_detail');
                    break;
                default:
                    return view('frontend.layouts.index');
                    break;
            }
        }
    }

    public function blogDetails($slug){
        // dd($id);
        $details = Blog::where('slug', $slug)->firstOrFail();
        return view('frontend.singlepage.blog_detail',compact('details'));
    }

}
