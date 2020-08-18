<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PemilikResource extends JsonResource
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
            "alamat" => $this->alamat,
            "user" => new UserResource($this->user)
        ];
    }
}
