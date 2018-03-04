<?php

namespace App\Http\Controllers;

use App\Wedding;
use App\User;
use Validator;
use Illuminate\Http\Request;
use App\Http\Resources\Wedding as WeddingResource;

class WeddingController extends Controller
{
    public $successStatus = 200;
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

     /* Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {
        $validator = Validator::make($request->all(),[
          'husband_name' => 'required',
          'husband_email' => 'required',
          'husband_phone' => 'required',
          'wife_name' => 'required',
          'wife_email' => 'required',
          'wife_phone' => 'required',
        ]);

        if($validator->fails()){
          return response()->json(['error' => $validator->errors(), 401]);
        }
        else{
          $user = User::findOrFail($user_id);
          $wedding = $user->weddings()->create($request->all());
          return response()->json(['success' => $wedding], $this->successStatus);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wedding  $wedding
     * @return \Illuminate\Http\Response
     */
    public function show($user_id, Wedding $wedding)
    {
      $user = User::findOrFail($user_id);
      $weddings = $user->weddings()->findOrFail($wedding);
      return WeddingResource::collection($weddings);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wedding  $wedding
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $user_id, Wedding $wedding)
    {
      $user = User::findOrFail($user_id);
      $wedding = $user->weddings()->findOrFail($wedding);
      if(isset($request->husband_name))
        $wedding [0]->husband_name = $request->husband_name;
      if(isset($request->husband_email))
        $wedding[0]->husband_email = $request->husband_email;
      if(isset($request->husband_phone))
        $wedding[0]->husband_phone = $request->husband_phone ;

      if(isset($request->wife_name))
        $wedding [0]->wife_name = $request->wife_name;
      if(isset($request->wife_email))
        $wedding[0]->wife_email = $request->wife_email;
      if(isset($request->wife_phone))
        $wedding[0]->wife_phone = $request->wife_phone ;

      if($wedding[0]->save())
        return WeddingResource::collection($wedding);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wedding  $wedding
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, Wedding $wedding)
    {
      $user = User::findOrFail($user_id);
      $deleteWedding = $user->weddings()->findOrFail($wedding);
      if($deleteWedding[0]->delete())
        return response()->json(['success' => $this->successStatus], $this->successStatus);
    }
}
