<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{

    public function index()
    {
        $teams = Team::with('employees')->get();
        $employees = Employee::all();
        return view('admin.team.index', compact('teams', 'employees'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Team::create([
            'name' => $request->name,
        ]);
        return redirect()->route('teams.index')->with('success', 'Team created successfully!');
    }

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);
        $team->name = $request->input('name');
        $team->save();
        return redirect()->route('teams.index')->with('success', 'Team updated successfully!');
    }

    public function destroy($id)
    {
        $team = Team::find($id);
        if (!$team) {
            return redirect()->route('teams.index')->with('error', 'Team not found!');
        }
        $team->delete();
        return redirect()->route('teams.index')->with('success', 'Team deleted successfully!');
    }

    public function assignMember(Request $request, $teamId)
    {
        $request->validate([
            'employee_ids' => 'required|array|min:1',
            'employee_ids.*' => 'exists:employees,id',
        ]);
        $team = Team::findOrFail($teamId);

        // Attach selected employees to the team using the pivot table
        $team->employees()->sync($request->employee_ids); // 'sync' will remove existing relations and add the new ones
        return redirect()->route('teams.index')->with('success', 'Members added to the team successfully!');
    }
}
