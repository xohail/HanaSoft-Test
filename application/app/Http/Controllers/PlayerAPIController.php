<?php

namespace App\Http\Controllers;

use App\Http\Resources\Player as PlayerResource;
use App\Http\Resources\PlayerCollection as PlayerCollection;
use App\Models\Player;
use Illuminate\Http\Request;
use Validator;

class PlayerAPIController extends BaseController
{
    /**
     * Read
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();
        return $this->sendResponse(new PlayerCollection($players), 'Players fetched.');
    }

    /**
     * Create
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'team_id' => 'required',
            'firstName' => 'required|unique:players',
            'lastName' => 'required',
            'playerImageURI' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $player = Player::create($input);
        return $this->sendResponse(new PlayerResource($player), 'Player created.');
    }

    /**
     * Read
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = Player::find($id);
        if (is_null($player)) {
            return $this->sendError('Player does not exist.');
        }
        return $this->sendResponse(new PlayerResource($player), 'Player fetched.');
    }

    /**
     * Update
     *
     * @param Request $request
     * @param Player $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'team_id' => 'required',
            'firstName' => 'required|unique:players',
            'lastName' => 'required',
            'playerImageURI' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $player->team_id = $input['team_id'];
        $player->firstName = $input['firstName'];
        $player->lastName = $input['lastName'];
        $player->playerImageURI = $input['playerImageURI'];
        $player->save();

        return $this->sendResponse(new PlayerResource($player), 'Player updated.');
    }

    /**
     * Delete
     *
     * @param Player $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete();
        return $this->sendResponse([], 'Player deleted.');
    }
}
