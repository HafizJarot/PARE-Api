<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BankResource extends JsonResource
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
            "saldo"             => $this->saldo,
            "nama_bank"         => $this->nama_bank,
            "nomor_rekening"    => $this->nomor_rekening,
            "nama_rekening"     => $this->nama_rekening
        ];
    }
}
