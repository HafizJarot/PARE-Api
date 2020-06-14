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
        return [
            "id" => $this->id,
            "no_izin" => $this->no_izin,
            "nama_perusahaan" => $this->nama_perusahaan,
            "nama"=> $this->nama,
            "email"=> $this->email,
            "role"=> $this->role,
            "alamat"=> $this->alamat,
            "no_hp"=> $this->no_hp,
            "status"=> $this->status

        ];
    }
}
