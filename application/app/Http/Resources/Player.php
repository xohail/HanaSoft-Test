<?php

namespace App\Http\Resources;

use App\Models\Team;
use Illuminate\Http\Resources\Json\JsonResource;
use \App\Http\Controllers\PlayerAPIController as PlayerController;

class Player extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return [
//            'first_name' => $this->firstName,
//            'last_name' => $this->lastName,
//            'image' => $this->playerImageURI,
//            'team' => PlayerController::getPlayerTeam($this->team_id)->name,
//        ];
        return parent::toArray($request);
    }
}
