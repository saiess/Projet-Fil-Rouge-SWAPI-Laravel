<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        if (Auth::user()->role === "user") {
            $categories = DB::table('categories')->get('name');
//        $categories = Category::all('name');
//        $posts = Post::all();
//        $posts = DB::table('posts')->get('image');
            return view('user.profile', ['categories' => $categories]);
        }
        else {
            return redirect('/admin');
    }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Profile $profile
     * @return Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Profile $profile
     * @return Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Profile $profile
     * @return Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Profile $profile
     * @return Response
     */
    public function destroy(Profile $profile)
    {
        //
    }
}
