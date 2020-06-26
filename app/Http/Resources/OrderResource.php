<?php

namespace App\Http\Resources;

use Carbon\Carbon;
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
            "id"                    => $this->id,
            "harga"                 => $this->harga,
            "total_harga"           => $this->total_harga,
            "tanggal_mulai_sewa"    => Carbon::parse($this->tanggal_mulai_sewa)->format('d-m-Y'),
            "selesai_sewa"          => Carbon::parse($this->selesai_sewa)->format('d-m-Y'),
            "verifikasi"            => $this->verifikasi,
            "status"                => $this->status,
            "snap"                  => $this->snap,
            "penyewa"            => new UserResource($this->penyewa),
            "pemilik"            => new UserResource($this->pemilik),
            "produk"             => new ProdukResource($this->produk),
        ];
    }
}
