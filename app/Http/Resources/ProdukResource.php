<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProdukResource extends JsonResource
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
            "panjang" => $this->panjang,
            "lebar" => $this->lebar,
            "foto" => $this->foto,
            "masa_berlaku" => $this->masa_berlaku,
            "keterangan" => $this->keterangan,
            "harga_sewa" => $this->harga_sewa,
            "alamat" => $this->alamat,
            "status" => $this->status,
            "user" => new UserResource($this->user)


        ];
    }
}
