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
            "role"=> $this->role ? true : false,
            "api_token" => $this->api_token,
            "fcm_token" => $this->fcm_token,
            "alamat"=> $this->alamat,
            "no_hp"=> $this->no_hp,
            "status"=> $this->status ? true : false,
            "saldo" => $this->saldo,
            "nama_bank" => $this->nama_bank,
            "nomor_rekening" => $this->nomor_rekening,
            "nama_rekening" => $this->nama_rekening,
        ];
    }
}
