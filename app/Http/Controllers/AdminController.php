<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wedding;
use App\User;
use Validator;
use App\Http\Resources\Wedding as WeddingResource;

class AdminController extends Controller
{
    public function allWeddings()
    {
       $weddings = Wedding::all();
       return WeddingResource::collection($weddings);
    }

    public function showWedding(Wedding $wedding)
    {
      $weddings = Wedding::findOrFail($wedding->id);
      return array('data' => $weddings);
    }

}
