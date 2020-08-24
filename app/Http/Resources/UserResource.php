<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $result = [];
        if ($this->role) {
            $result = new PemilikResource($this->pemilik);
        }else{
            $result = new PenyewaResource($this->penyewa);
        }

        return [
            "id" => $this->id,
            "email"=> $this->email,
            "role"=> $this->role ? true : false,
            "api_token" => $this->api_token,
            "fcm_token" => $this->fcm_token,
            "status"=> $this->status ? true : false,
            "pemilik" => $this->role ? $result : null,
            "penyewa" => !$this->role ? $result : null,

        ];
    }
}
