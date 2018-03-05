<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\User;

class Wedding extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $user_name = User::findOrFail($this->user_id)->name;
        return [
          "id" => $this->id,
          'husband_name' => $this->husband_name,
          'husband_email' => $this->husband_email,
          'husband_phone' => $this->husband_phone,
          'wife_name' => $this->wife_name,
          'wife_email' => $this->wife_name,
          'wife_phone' => $this->wife_name,
          'user_id' => $this->user_id,
          'user_name' => $user_name,
        ];
    }
}
