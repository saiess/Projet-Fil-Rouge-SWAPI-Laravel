<?php

namespace App\Http\Controllers;

use App\Models\admin;
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

        return view('admin.admin_user');
    }

    public function pagePost()
    {
        return view('admin.admin_post');
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
     * @return Response
     */
    public function destroy(admin $admin)
    {
        //
    }
}
