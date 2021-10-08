<?php

namespace App\Http\Controllers;

use App\Http\Resources\TeamCollection;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;
use Validator;
use App\Models\Team;
use App\Http\Resources\Team as TeamResource;

class TeamAPIController extends BaseController
{
    /**
     * Read
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return $this->sendResponse(new TeamCollection($teams), 'Teams fetched.');
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
            'name' => 'required|unique:teams',
            'logoURI' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }
        $team = Team::create($input);
        return $this->sendResponse(new TeamResource($team), 'Team created.');
    }

    /**
     * Read
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::find($id);
        if (is_null($team)) {
            return $this->sendError('Team does not exist.');
        }
        return $this->sendResponse(new TeamResource($team), 'Team fetched.');
    }

    /**
     * Update
     *
     * @param Request $request
     * @param Team $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|unique:teams',
            'logoURI' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());
        }

        $team->name = $input['name'];
        $team->logoURI = $input['logoURI'];
        $team->save();

        return $this->sendResponse(new TeamResource($team), 'Team updated.');
    }

    /**
     * Delete
     *
     * @param Team $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return $this->sendResponse([], 'Team deleted.');
    }
}
