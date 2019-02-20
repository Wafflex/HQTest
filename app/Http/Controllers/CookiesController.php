<?php

namespace App\Http\Controllers;

use App\Cookie;
use App\Notifications\CookieCreated;
use App\Notifications\CookieUpdated;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            'email' => 'unique:cookies,email|required|email'
        ]);
        
        $cookie = new Cookie([
            'name' => $request->get('cookie_name'),
            'description'=> $request->get('cookie_description'),
            'email' => $request->get('email')
        ]);

        $cookie->save();

        $cookie->notify(new CookieCreated());

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
            'cookie_description' => 'required|min:6|max:60'
        ]);

        $cookie = Cookie::find($id);

        $cookie->name = $request->get('cookie_name');
        $cookie->description = $request->get('cookie_description');
        $cookie->save();
        
        $cookie->notify(new CookieUpdated());
    
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
