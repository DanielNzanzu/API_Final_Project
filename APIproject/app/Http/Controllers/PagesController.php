<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display the home page of the site
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function menus()
    {
        $menus = Menu::paginate(9);
        return view('menus')
            ->with('menus', $menus);
    }

    /**
     * @param $slug
     * @return \Illuminate\Http\Response
     */
    public function menu($slug)
    {
        $menu = Menu::findBySlugOrFail($slug);
        return view('menu')
            ->with('menu', $menu);
    }
}
