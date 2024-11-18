<?php

namespace App\Http\Controllers\Admin;

use App\Models\Card;
use App\Models\BoardList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CardController extends Controller
{
    public function addCard(Request $request)
    {
        $card = Card::create([
            'title' => $request->title,
            'list_id' => $request->list_id,
        ]);

        return response()->json([
            'success' => true,
            'card' => $card,
        ]);
    }

    public function updateCard(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        // Find the card by ID
        $card = Card::findOrFail($id);

        // Update fields if provided
        if ($request->has('description')) {
            $card->description = $request->input('description');
        }

        if ($request->has('due_date')) {
            $card->due_date = $request->input('due_date');
        }

        // Save the card with updated fields
        $card->save();

        // Return a response
        return response()->json([
            'message' => 'Card updated successfully!',
            'card' => $card
        ]);
    }


}
