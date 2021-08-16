<?php

namespace App\Http\Controllers;

use App\Models\Faqs;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class FaqsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('user.FAQs');
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function show(Faqs $faqs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function edit(Faqs $faqs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faqs $faqs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Faqs  $faqs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faqs $faqs)
    {
        //
    }
}
