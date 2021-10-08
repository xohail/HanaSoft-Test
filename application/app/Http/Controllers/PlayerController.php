<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PlayerController extends BaseController
{
    /**
     * Get a player's team
     *
     * @param $team_id
     * @return mixed
     */
    public static function getPlayerTeam($team_id)
    {
        return TeamController::getTeam($team_id);
    }

    /**
     * Get all the players in a team
     *
     * @param $team_id
     * @return mixed
     */
    public static function getAllPlayersFromATeam($team_id)
    {
        return Player::where('team_id', '=', $team_id);
    }

    /**
     * Display the player(s) in JSON
     *
     * @param $players
     */
    public static function displayPlayers($players)
    {
        print collect($players)->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Get player by name
     *
     * @param $firstName
     * @return \Illuminate\Http\Response|void
     */
    public function getPlayerByPlayerName($firstName)
    {
        try {
            $player = Player::where('firstName', '=', $firstName)->firstOrFail()->toArray();
        } catch (ModelNotFoundException $exception) {
            return $this->sendError('Player does not exist.');
        }

        $player['team_name'] = self::getPlayerTeam($player['team_id'])->value('name');
        self::displayPlayers($player);
    }
}
