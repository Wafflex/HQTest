<?php

namespace App\Http\Controllers;

use App\Cookie;
use Illuminate\Http\Request;

class CookiesController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cookies = Cookie::all();

        return view('cookies.index', compact('cookies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cookies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cookie_name' => 'required|min:6|max:20',
            'cookie_description' => 'required|min:6|max:60',
        ]);
        
        $cookie = new Cookie([
            'name' => $request->get('cookie_name'),
            'description'=> $request->get('cookie_description'),
        ]);

        $cookie->save();
        return redirect('/cookies')->with('success', 'Cookie has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cookie = Cookie::find($id);

        return view('cookies.edit', compact('cookie'));
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
        $request->validate([
            'cookie_name' => 'required|min:6|max:20',
            'cookie_description' => 'required|min:6|max:60',
        ]);

        Cookie::whereId($id) // I prefer to use update instead find, after save, because with this i touch the database once
        ->update([
            'name' => $request->get('cookie_name'),
            'description' => $request->get('cookie_description')
        ]);
    
        return redirect('/cookies')->with('success', 'Cookie has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cookie = Cookie::find($id);
        $cookie->delete();

        return redirect('/cookies')->with('success', 'Cookie has been deleted Successfully');
    }
}
