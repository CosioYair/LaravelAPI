<?php

namespace App\Http\Controllers;

use App\Wedding;
use App\User;
use Illuminate\Http\Request;
use App\Http\Resources\Wedding as WeddingResource;

class WeddingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
       $user = User::findOrFail($user_id);
       $weddings = $user->weddings()->get();
       return WeddingResource::collection($weddings);
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
     * @param  \App\Wedding  $wedding
     * @return \Illuminate\Http\Response
     */
    public function show(Wedding $wedding)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wedding  $wedding
     * @return \Illuminate\Http\Response
     */
    public function edit(Wedding $wedding)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wedding  $wedding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wedding $wedding)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wedding  $wedding
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wedding $wedding)
    {
        //
    }
}
