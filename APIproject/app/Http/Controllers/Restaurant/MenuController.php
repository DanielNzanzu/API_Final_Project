<?php

namespace App\Http\Controllers\Restaurant;

use App\Menu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $menus = auth()->user()->restaurants->menus;
        $menus = Menu::where('restaurant_id', auth()->user()->restaurants->id)->paginate(5);

        return view('account.restaurant.menus')
            ->with('menus', $menus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('account.restaurant.menus_create');
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'menu_name' => 'required|string|max:255',
            'menu_price' => 'required|numeric',
            'menu_image' => 'file|image',
            'menu_details' => 'required|string',
        ]);

        // handle file upload
        if($request->hasFile('menu_image')){
            $image = $request->file('menu_image');
            $fileNameWithExt = $image->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();

            // Filename to store
            $month = Carbon::now()->format('F');
            $year = Carbon::now()->format('Y');
            $randomName = sha1($fileName.time());
            $nameToStore = $year.'/'.$month.'/'.$randomName.'.'.$extension;

            $path = $image->storeAs('public/menus/', $nameToStore);
        }

        if($path){
            $menu_data = array(
                'name' => $request->menu_name,
                'restaurant_id' => auth()->user() ? auth()->user()->restaurants->id : null,
                'details' => $request->menu_details,
                'price' => $request->menu_price,
                'image' => $nameToStore,
            );

            $menu = Menu::create($menu_data);
        }

        return redirect()->back()
            ->with('success', 'The menu has been added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $menu = Menu::where('slug', $slug)->firstOrFail();
        return view('account.restaurant.menu_show')
            ->with('menu', $menu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
