<?php

namespace App\Http\Controllers;

//use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        $data->name = $request->input('name');
//        $data->city = $request->input('city');
//        $data->phone = $request->input('phone');
//        $data->photo = $request->input('photo');
//        $data->save();
//        return back();
        $data = [];
        if($request->filled('name')){
            $data['name']=$request->name;
//            $request->validate(
//            ['name'=>'required',]
//            );
        }
        if($request->filled('city')){
            $data['city']=$request->city;
        }

        if($request->filled('phone')){
            $data['phone']=$request->phone;
        }

//        if ($request->file('photo')) {
//            $data = Validator::make($request->all(),
//                ['photo' => 'image|mimes:jpg,png,jpeg,gif,svg'], ['image' => 'The file uploaded ill be image']
//            )

        if($request->filled('photo')){
            $data['photo']=$request->photo;
        }
//
        if($request->hasFile('photo')){
            $data['photo']=$request->Str::of($request->file('photo')->store('public/image'))->explode('/')[1];
        }
        $user= User::find(Auth::id());
        if($user->update($data)){
//            dd('its doooooooooooooooooooooooooooooooooooooone');
        }
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
