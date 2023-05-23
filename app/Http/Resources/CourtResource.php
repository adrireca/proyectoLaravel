<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CourtResource extends JsonResource
{
    public static $wrap = false;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'luz' => $this->luz,
            'disponible' => $this->disponible,
            'cubierta' => $this->cubierta,
            'precioLuz' => $this->precioLuz,
            'precioPista' => $this->precioPista,
            'tipoPista' => $this->tipoPista,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
