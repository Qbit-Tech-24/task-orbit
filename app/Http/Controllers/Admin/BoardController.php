<?php

namespace App\Http\Controllers\Admin;

use App\Models\Board;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class BoardController extends Controller
{

    public function index()
    {
        $boards = Board::orderBy('created_at', 'desc')->get();
        foreach ($boards as $board) {
            $board->formatted_created_at = Carbon::parse($board->created_at)
                ->timezone('Asia/Dhaka') // Convert to Bangladesh time
                ->format('Y-m-d h:i A'); // Format to desired format (e.g., 2024-11-07 08:21 AM)
        }
        return view('admin.board.index', compact('boards'));
    }


    public function create()
    {
        //
    }

    private function generateUniqueColorCode()
    {
        // Generate a random RGB color
        $r = mt_rand(0, 255);
        $g = mt_rand(0, 255);
        $b = mt_rand(0, 255);

        // Lighten the color by mixing it with white
        // Adding 50% white to the color by averaging the color with 255 (white)
        $r = round(($r + 255) / 2);
        $g = round(($g + 255) / 2);
        $b = round(($b + 255) / 2);

        // Convert the RGB values back to the rgba color string (no opacity)
        $color = sprintf('rgb(%d, %d, %d)', $r, $g, $b);

        // Check if the color already exists in the database
        if (Board::where('board_color', $color)->exists()) {
            // If the color exists, generate a new one
            return $this->generateUniqueColorCode(); // Call the method recursively to generate a new color
        } else {
            // If the color does not exist, return it
            return $color;
        }
    }


    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $board_color = $this->generateUniqueColorCode();

        Board::create([
            'name' => $request->name, // The name field from the form
            'admin_id' => Auth::user()->id, // The logged-in user's ID as the admin
            'board_color' => $board_color, // The randomly generated color
        ]);
        return redirect()->route('boards.index')->with('success', 'Board created successfully!');
    }

    public function show(Board $board)
    {
        if (!$board) {
            return redirect()->route('boards.index')->with('error', 'Board not found.');
        }
        return view('admin.board.board', compact('board'));
    }

    public function toggleStatus(Board $board)
    {
        $board->is_enabled = !$board->is_enabled; // Flip the current value
        $board->save();
        return redirect()->route('boards.index')->with('status', 'Board status updated successfully!');
    }

    public function edit(Board $board)
    {
        //
    }

    public function update(Request $request, Board $board)
    {
        //
    }

    public function destroy(Board $board)
    {
        if ($board->admin_id !== Auth::id()) {
            return redirect()->route('boards.index')->with('error', 'Unauthorized action.');
        }
        $board->delete();
        return redirect()->route('boards.index')->with('success', 'Board deleted successfully!');
    }
}
