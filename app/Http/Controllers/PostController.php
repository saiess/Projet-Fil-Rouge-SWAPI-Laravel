<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Favourite;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $posts = Post::paginate(12);
        return view('user.swap')->with('products', $posts);
    }

//    public function showposts()
//    {
//        dd('ytttttttttttty');
//        $posts = Post::all();
////        return view('user.swap', ['postdata' => $posts]);
//        return view('user.swap')->with('products', $products);
//    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {

        $data=[];
        $generated_new_name=null;
        if ($request->file('postImage')) {

            $request->validate([
                'postImage' => 'required|mimes:jpg,png,jpeg|max:5048'
            ]);
            $upload_path = public_path('upload/posts');
            $file_name = $request->file('postImage')->getClientOriginalName();
            $generated_new_name = time() . '_' . $file_name;
            $request->file('postImage')->move($upload_path, $generated_new_name);
            $data['image']= $generated_new_name;
        }

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);

        $data['image']=$generated_new_name;
        $data['title']=$request->title;
        $data['description']=$request->description;
        $data['user_id']=Auth()->user()->id;
        $data['categorie_id']= $request->category;


//        dd($data);
        $post =  new Post();
        if ($post->create($data)) {
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $singldata = Post::findOrFail($id);
//        dd($singldata);
        $datauser = User::join("posts", "posts.user_id", "=", "users.id")->where('posts.id',$id)->get();
//        dd($datauser[0]->user_id);
        $postcategory =  Category::select('name')->join("posts", "posts.categorie_id", "=", "categories.id")->where('posts.id',$id)->get();
//        dd($datauser[0]->id);
        return view('user.product',['singlposts' => $singldata, 'postuser' => $datauser, 'categorypost' => $postcategory]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
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
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy(int $id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('profile');
    }
}
