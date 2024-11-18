<?php

namespace App\Http\Controllers\Admin\Ticket;

use Illuminate\Http\Request;
use App\Models\TicketCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\Category\CreateRequest;
use App\Http\Requests\Client\Category\UpdateRequest;

class CategoryController extends Controller
{
    public function index()
    {  
        $ticket_cat = TicketCategory::get();
        return view('admin.ticket.category.category',['ticket_cat'=>$ticket_cat]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ticket.category.add_category');
    }

    public function store(CreateRequest $request)
    {
        TicketCategory::create($request->toArray());
        return redirect()->route('category.index')->with('success', 'Category created successfully!');
    }
    public function edit($id)
    {
        $ticketEdit = TicketCategory::where('id',$id)->first();
        return view('admin.ticket.category.edit_category',['ticketEdit'=>$ticketEdit]);
    }
    public function update(UpdateRequest $request, string $id)
    {
        $ticketEdit = TicketCategory::where('id',$id)->first();
        $ticketEdit->update([
           'ticket_category'=>$request->ticket_category,
           'code'=>$request->code,
           'is_ticket_prefix'=>$request->is_ticket_prefix,
           'status'=>$request->status
        ]);;
        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
    }
    public function destroy($id)
    {
        $ticketEdit = TicketCategory::where('id',$id)->first();
        $ticketEdit->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
    }

}
