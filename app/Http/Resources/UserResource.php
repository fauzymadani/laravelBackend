<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Api\UserController;
use App\Models\User;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id_user,
            'type' => $this->tipe_user,
            'name' => $this->nama,
            'address' => $this->alamat,
            'phone' => $this->telpon,
            'username' => $this->username,
        ];
    }
}
