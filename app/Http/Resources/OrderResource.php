<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            "id_penyewa" => $this->id_penyewa,
            "id_pemilik" => $this->id_pemilik,
            "id_produk" => $this->id_produk,
            "harga" => $this->harga,
            "waktu_sewa" => $this->waktu_sewa,
            "total_harga" => $this->total_harga,


        ];
    }
}
