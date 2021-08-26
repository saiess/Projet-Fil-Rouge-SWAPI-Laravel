<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
            $usersdata = User::where('role', 'user')->paginate(7);
            return view('admin.admin_user')->with(['users' => $usersdata]);
    }

    public function pagePost($id)
    {
        $userpost = User::join("posts", "posts.user_id", "=", "users.id")->paginate(7);
//        dd($userpost);
        return view('admin.admin_post')->with(['userpost'=> $userpost]);
    }

    public function pageReport()
    {
        return view('admin.admin_report');
    }

    public function pageMessage()
    {
        return view('admin.admin_message');
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
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param admin $admin
     * @return Response
     */
    public function show(admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param admin $admin
     * @return Response
     */
    public function edit(admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param admin $admin
     * @return Response
     */
    public function update(Request $request, admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param admin $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(admin $admin)
    {
        $post = Post::find($admin);
        $user = User::find($admin);
        $post->delete();
        return redirect('admin.admin_post');
    }
}
