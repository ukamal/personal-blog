<?php

namespace App\Http\Controllers;

use App\Models\Menu;
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
                    return view('frontend.layouts.contact');
                    break;
                case 'Portfolio':
                    return view('frontend.layouts.portfolio');
                    break;
                case 'Blog':
                    return view('frontend.layouts.blog');
                    break;
                default:
                    return view('frontend.layouts.index');
                    break;
            }
        }
    }
}
