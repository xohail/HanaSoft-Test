<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TeamController extends BaseController
{
    /**
     * Get players by the team id
     *
     * @param $team_id
     * @return \Illuminate\Http\Response|void
     */
    public function getPlayersByTeamId($team_id)
    {
        $players = PlayerController::getAllPlayersFromATeam($team_id);
        $count = $players->count();
        if ($count == 0) {
            return $this->sendError('Team does not have any players.');
        }

        PlayerController::displayPlayers($players->get());
    }

    /**
     * Get players by team name
     *
     * @param $team_name
     * @return \Illuminate\Http\Response|void
     */
    public function getPlayersByTeamName($team_name)
    {
        try {
            $team_id = Team::where('name', '=', $team_name)->firstOrFail()->id;
        } catch (ModelNotFoundException $exception) {
            return $this->sendError('Team does not exist.');
        }

        return $this->getPlayersByTeamId($team_id);
    }

    /**
     * Get a team by team_id
     *
     * @param $team_id
     * @return mixed
     */
    public static function getTeam($team_id)
    {
        return Team::where('id', '=', $team_id);
    }
}
