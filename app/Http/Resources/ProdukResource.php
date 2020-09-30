<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
            "id"            => $this->id,
            "panjang"       => $this->panjang,
            "lebar"         => $this->lebar,
            "sisi"          => $this->sisi,
            "foto"          => $this->foto,
            "masa_berdiri"  => $this->masa_berdiri,
            "keterangan"    => $this->keterangan,
            "harga_sewa"    => $this->harga_sewa,
            "alamat"        => $this->alamat,
            "status"        => $this->status,
            ///"pemilik"          => new PemilikResource($this->pemilik)
        ];
    }
}
