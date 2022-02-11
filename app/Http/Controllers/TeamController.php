<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTeamMemberRequest;
use App\Http\Requests\CreateTeamRequest;
use App\Http\Requests\UpdateTeamRequest;
use App\Models\Team;
use App\Models\User;
use App\Models\UserTeam;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class TeamController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('teams.index', [
            'teams' => Auth::user()->teams
        ]);
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('teams.create');
    }

    /**
     * @param CreateTeamRequest $request
     * 
     * @return RedirectResponse
     */
    public function store(CreateTeamRequest $request): RedirectResponse
    {
        $team = Team::query()
            ->create([
                'creator_id' => Auth::user()->getAuthIdentifier(),
                'name' => $request->input('name')
            ]);

        UserTeam::query()
            ->create([
                'user_id' => Auth::user()->getAuthIdentifier(),
                'team_id' => $team->id
            ]);

        return redirect()->route('teams.edit', $team->id)->with('success', __('team.successfully_created', [
            'name' => $team->name
        ]));
    }

    /**
     * @param string $id
     * 
     * @return View
     */
    public function edit(string $id): View
    {
        return view('teams.edit', [
            'team' => Team::query()->find($id)
        ]);
    }

    /**
     * @param CreateTeamRequest $request
     * 
     * @return RedirectResponse
     */
    public function update(UpdateTeamRequest $request, string $id): RedirectResponse
    {
        $team = Team::query()
            ->find($id);

        $team->update([
            'name' => $request->input('name')
        ]);

        return redirect()->route('teams.edit', $team->id)->with('success', __('team.successfully_updated', [
            'name' => $team->name
        ]));
    }

    /**
     * @param AddTeamMemberRequest $request
     * @param string $id
     * 
     * @return RedirectResponse
     */
    public function addMember(AddTeamMemberRequest $request, string $id): RedirectResponse
    {
        $user = User::query()
            ->where('email', $request->input('email'))
            ->first();

        UserTeam::query()
            ->create([
                'user_id' => $user->id,
                'team_id' => $id
            ]);

        return redirect()->route('teams.edit', $id)->with('success', __('team.successfully_added_member', [
            'email' => $request->input('email')
        ]));
    }
}
