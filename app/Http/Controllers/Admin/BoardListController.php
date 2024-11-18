<?php

namespace App\Http\Controllers\Admin;

use App\Models\BoardList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoardListController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'board_id' => 'required|exists:boards,id',
        ]);

        $board_list = new BoardList();
        $board_list->name = $request->name;
        $board_list->board_id = $request->board_id;
        $board_list->save();

        return response()->json([
            'status' => 'success',
            'board_list' => $board_list
        ]);
    }
    public function deleteBoardLists(Request $request)
    {
        BoardList::find($request->list_id)->delete();
        return response()->json([
            'status'=>'success',
        ]);
    }
    public function updateBoardListName(Request $request)
    {
        // Find the list by ID and update its name
        $list = BoardList::findOrFail($request->list_id);
        $list->name = $request->name;
        $list->save();

        // Return a success response
        return response()->json(['status' => 'success']);
    }

}
