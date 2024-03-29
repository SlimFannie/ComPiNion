<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class User extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'prenom' => $this->prenom,
            'nom' => $this->nom,
            'pseudo' => $this->pseudo,
            'email' => $this->email,
            'password' =>$this->password,
            'character_id' => $this->character_id,
            'jours' => $this->jours,
            'merite' => $this->merite
        ];
    }
}