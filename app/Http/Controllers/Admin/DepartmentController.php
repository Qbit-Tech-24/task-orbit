<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Models\Department;
use Illuminate\Http\Request;
use GuzzleHttp\RedirectMiddleware;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Department\CreateRequest;
use App\Http\Requests\Department\UpdateRequest;

class DepartmentController extends Controller
{

    public function index()
    {

        // if (Auth::guard('admin')->user()->is_superadmin) {
        //     $departments = Department::select('departments.id', 'departments.deptName','departments.status','departments.companies_id','companies.company_name')
        //     ->join('companies','departments.companies_id','=','companies.id')
        //     ->groupBy('departments.id', 'departments.deptName','departments.status','departments.companies_id','companies.company_name')->get();
        //     $company = Company::where('status','Active')->get();
        // }else{
        //      $currentCompanyId = Auth::guard('admin')->user()->companies_id;
        //      $departments = Department::select('departments.id', 'departments.deptName','departments.status','departments.companies_id','companies.company_name')
        //     ->join('companies','departments.companies_id','=','companies.id')->where('companies_id',$currentCompanyId)
        //     ->groupBy('departments.id', 'departments.deptName','departments.status','departments.companies_id','companies.company_name')->get();
        //     $company = Company::where('id',$currentCompanyId)->get();
        // }
        $departments = Department::select('departments.id', 'departments.deptName','departments.status','departments.companies_id','companies.company_name')
        ->join('companies','departments.companies_id','=','companies.id')
        ->groupBy('departments.id', 'departments.deptName','departments.status','departments.companies_id','companies.company_name')->get();
        $company = Company::where('status','Active')->get();
        return view('backend.pages.department.index', ['departments' => $departments,'company'=>$company]);
    }

    public function store(CreateRequest $request)
    {
        try {
            Department::create([
                'deptName'=>$request->deptName,
                'companies_id'=>$request->companies_id,
                 'status'=>$request->status
            ]);
            return redirect()->back()->with('success','Created Successfully');

        } catch (\Exception $e) {
           return redirect()->back()->with('error','Not Created !');
        }
    }


    public function edit($id)
    {
        //  if (Auth::guard('admin')->user()->is_superadmin) {
        //     $department = Department::find($id);
        //     $company = Company::all();
        //     $departments = Department::select('departments.id', 'departments.deptName','departments.status','departments.companies_id')
        //     ->groupBy('departments.id', 'departments.deptName','departments.status','departments.companies_id')
        //     ->get();
        // }else{
        //     $currentCompanyId = Auth::guard('admin')->user()->companies_id;
        //     $department = Department::where('companies_id',$currentCompanyId)->first();
        //     $company = Company::where('id', $currentCompanyId)->get();
        //     $departments = Department::select('departments.id', 'departments.deptName','departments.status','departments.companies_id')
        //     ->where('companies_id',$currentCompanyId)
        //     ->groupBy('departments.id', 'departments.deptName','departments.status','departments.companies_id')
        //     ->get();
        // }
        $department = Department::find($id);
        $company = Company::all();
        $departments = Department::select('departments.id', 'departments.deptName','departments.status','departments.companies_id')
        ->groupBy('departments.id', 'departments.deptName','departments.status','departments.companies_id')
        ->get();

        return view('backend.pages.department.edit',['departments'=>$departments,'department'=>$department,'company'=>$company]);
    }

    public function update(UpdateRequest $request,$id)
    {
        try {
            $department = Department::find($id);
            // If the department doesn't exist, return with an error message.
            if (!$department) {
                return redirect()->back()->with('error', 'Department not found!');
            }
            // Update the department with the new data.
            $department->update([
                'deptName' => $request->deptName,
                'companies_id'=>$request->companies_id,
                'status' => $request->status
            ]);
            // Redirect with a success message.
            return redirect()->route('department.index')->with('success', 'Updated Successfully');
        } catch (\Exception $e) {
            // Handle any exception and return with an error message.
            return redirect()->back()->with('error', 'Not Updated!');
        }
    }

    public function destroy(string $id)
    {
        try {
            $department = Department::find($id);
            // If the department doesn't exist, return with an error message.
            if (!$department) {
                return redirect()->back()->with('error', 'Department not found!');
            }
            // Delete the department with the new data.
            $department->delete();
            // Redirect with a success message.
            return redirect()->route('department.index')->with('success', 'Deleted Successfully');
        } catch (\Exception $e) {
            // Handle any exception and return with an error message.
            return redirect()->back()->with('error', 'Not Deleted!');
        }
    }
}
