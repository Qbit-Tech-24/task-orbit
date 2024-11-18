<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Designation\CreateRequest;
use App\Http\Requests\Designation\UpdateRequest;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $designations = Designation::select(
            'designations.id',
            'designations.designation_name',
            'designations.designation_shortname',
            'designations.designation_code',
            'designations.status'
        )->groupBy(
            'designations.id',
            'designations.designation_name',
            'designations.designation_shortname',
            'designations.designation_code',
            'designations.status'
        )
        ->get();
        return view('backend.pages.designation.index', ['designations' => $designations]);
    }

    public function store(CreateRequest $request)
    {
        try {
            Designation::create([
                'designation_name'=>$request->designation_name,
                'designation_shortname'=>$request->designation_shortname,
                'designation_code'=>$request->designation_code,
                'status'=>$request->status
            ]);
            return redirect()->back()->with('success','Created Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error','Not Created !');
        }
    }

    public function edit($id)
    {

        $designation = Designation::find($id);
        $designations = Designation::select(
            'designations.id',
            'designations.designation_name',
            'designations.designation_shortname',
            'designations.designation_code',
            'designations.status'
        )->groupBy(
            'designations.id',
            'designations.designation_name',
            'designations.designation_shortname',
            'designations.designation_code',
            'designations.status'
        )
        ->paginate(10);
        return view('backend.pages.designation.edit',['designations'=>$designations,'designation'=>$designation]);
    }

    public function update(UpdateRequest $request, string $id)
    {
        try {
            $designation = Designation::find($id);
            // If the department doesn't exist, return with an error message.
            if (!$designation) {
                return redirect()->back()->with('error', 'Designation not found!');
            }
            // Update the department with the new data.
            $designation->update([
                'designation_name'=>$request->designation_name,
                'designation_shortname'=>$request->designation_shortname,
                'designation_code'=>$request->designation_code,
                'status'=>$request->status
            ]);
            // Redirect with a success message.
            return redirect()->route('designation.index')->with('success', 'Updated Successfully');
        } catch (\Exception $e) {
            // Handle any exception and return with an error message.
            return redirect()->back()->with('error', 'Not Updated!');
        }
    }


    public function destroy(string $id)
    {
        try {
            $designation = Designation::find($id);
            // If the department doesn't exist, return with an error message.
            if (!$designation) {
                return redirect()->back()->with('error', 'Designation not found!');
            }
            // Delete the department with the new data.
            $designation->delete();

            // Redirect with a success message.
            return redirect()->route('designation.index')->with('success', 'Deleted Successfully');
        } catch (\Exception $e) {
            // Handle any exception and return with an error message.
            return redirect()->back()->with('error', 'Not Deleted!');
        }
    }
}
