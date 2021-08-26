<?php

namespace App\Http\Controllers;

//use Illuminate\Foundation\Auth\User;
use App\Models\CategoryUser;
use App\Models\Favourite;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        //
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (count($request->skills)>0)
        {
            DB::table("categoryusers")->where('user_id',Auth()->user()->id)->delete();
            for ($i = 0; $i<count($request->skills);$i++)
            {
                $categoryuser = new CategoryUser();
                $categoryuser->user_id=Auth()->user()->id;
                $categoryuser->categorie_id=$request->skills[$i];
                $categoryuser->save();
            }
        }

        $data=[];
        if ($request->file('photo')) {
            $request->validate([
                'photo' => 'required|mimes:jpg,png,jpeg|max:5048'
            ]);
            $upload_path = public_path('upload/avatar');
            $file_name = $request->file('photo')->getClientOriginalName();
            $generated_new_name = time() . '_' . $file_name;
            $request->file('photo')->move($upload_path, $generated_new_name);
            $data['photo']=$generated_new_name;
        }

        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'phone' => 'required',
        ]);
        $data['city']=$request->city;
        $data['name']=$request->name;
        $data['phone']=$request->phone;

        $user = User::find(Auth::id());
        if ($user->update($data)) {
        return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $datafav = Post::join("favourites", "favourites.post_id", "=", "posts.id")->where('favourites.user_id',(Auth()->user()->id))->get();
        dd($datafav);
        return view('user.profile', ['favouritepost' => $datafav]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function destroy($id)
    {
//
    }


    public function profile()
    {
//        if (Auth::user()->role === "user") {
            $categories = Category::all();
            $data = Category::join("categoryusers", "categoryusers.categorie_id", "=", "categories.id")->where('user_id',Auth()->user()->id)->get();
//        $categories = Category::all('name');
            $userinfo = User::find(Auth()->user()->id);
            $posts = Post::all()->where('user_id',Auth()->user()->id);
//            -> where('role', 'user')->first();
//            dd($posts);
//        $posts = DB::table('posts')->get('image');
        return view('user.profile', ['categories' => $categories, 'userInfo'=>$userinfo, 'posts' => $posts ,'categoryusers' => $data]);
//        }
//        return redirect('/admin');
    }

    public function otherprofile($id){
        $categories = Category::all();
        $data = Category::join("categoryusers", "categoryusers.categorie_id", "=", "categories.id")->where('user_id',$id)->get();
        $userinfo = User::find($id);
//        dd($userinfo);
        $posts = Post::all()->where('user_id',$id);
        return view('user.profile', ['categories' => $categories, 'userInfo'=>$userinfo, 'posts' => $posts ,'categoryusers' => $data]);

    }
}
