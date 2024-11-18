<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use App\Models\Employee;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Http\Request;
use App\Models\EmployeeContact;
use App\Models\EmployeeDocument;
use App\Models\EmployeeOtherDocs;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    // Display the employee index page
    public function index()
    {
        $employees = Employee::get();
        return view('backend.pages.employee.index', ['employees' => $employees]);
    }

    // Fetch departments based on the company
    public function getDepartmentsByCompany($companyId)
    {
        $departments = Department::where('companies_id', $companyId)->where('status', 'Active')->get();
        return response()->json($departments);
    }

    // Fetch employees based on the department
    public function getEmployeesByDepartment($departmentId)
    {
        $employees = Employee::where('deptID', $departmentId)->get();
        return response()->json($employees);
    }

    // Show the form to create a new employee
    public function create()
    {
        $designations = Designation::latest('id')->get();
        $companies = Company::get();
        return view('backend.pages.employee.create', ['designations' => $designations, 'companies' => $companies]);
    }


    private function handleFileUpload($file, $path)
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs('uploads/' . $path, $fileName, 'public');
    }


    // Store a new employee and their related information
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'employee_name' => 'required|string',
        ]);

        // Handle Passport Photo upload
        $passportPath = $request->hasFile('passport_photo') ?
                        $this->handleFileUpload($request->file('passport_photo'), 'images/passport') : null;

        // Hash the password if provided
        $password = $request->password ? Hash::make($request->password) : null;

        // Create the employee
        $employee = Employee::create([
            'employee_name' => $request->employee_name,
            'employee_id' => $request->employee_id,
            'joining_date' => $request->joining_date,
            'company_id' => $request->company_id,
            'deptID' => $request->deptID,
            'des_id' => $request->des_id,
            'employee_grade' => $request->employee_grade,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'religion' => $request->religion,
            'blood_group' => $request->blood_group,
            'age' => $request->age,
            'email' => $request->email,
            'password' => $password,
            'passport_photo' => $passportPath,
        ]);

        // Handle EmployeeContact creation
        $employeeContact = new EmployeeContact();
        $employeeContact->employee_id = $employee->id;

        // Handle file uploads for EmployeeContact
        if ($request->hasFile('enid_front_image')) {
            $employeeContact->enid_front_image = $this->handleFileUpload($request->file('enid_front_image'), 'images/nid/emergency/front');
        }
        if ($request->hasFile('enid_back_image')) {
            $employeeContact->enid_back_image = $this->handleFileUpload($request->file('enid_back_image'), 'images/nid/emergency/back');
        }

        // Assign other fields for EmployeeContact
        $employeeContact->fathers_name = $request->fathers_name;
        $employeeContact->mothers_name = $request->mothers_name;
        $employeeContact->phone_number = $request->phone_number;
        $employeeContact->office_phone_number = $request->office_phone_number;
        $employeeContact->email_address = $request->email_address;
        $employeeContact->marital_status = $request->marital_status;
        $employeeContact->spouse_name = $request->spouse_name;
        $employeeContact->spouse_nid = $request->spouse_nid;
        $employeeContact->spouse_phone = $request->spouse_phone;
        $employeeContact->present_address = $request->present_address;
        $employeeContact->present_district = $request->present_district;
        $employeeContact->present_postal_code = $request->present_postal_code;
        $employeeContact->permanent_address = $request->permanent_address;
        $employeeContact->permanent_district = $request->permanent_district;
        $employeeContact->permanent_postal_code = $request->permanent_postal_code;
        $employeeContact->emergency_contact_person = $request->emergency_contact_person;
        $employeeContact->emergency_contact_relation = $request->emergency_contact_relation;
        $employeeContact->emergency_contact_number = $request->emergency_contact_number;
        $employeeContact->address = $request->address;
        $employeeContact->district = $request->district;
        $employeeContact->postal_code = $request->postal_code;
        $employeeContact->save();

        // Handle EmployeeDocument creation
        $employeeDocument = new EmployeeDocument();
        $employeeDocument->employee_id = $employee->id;
        $employeeDocument->nid_number = $request->nid_number ?? 'N/A';

        // Handle document files
        if ($request->hasFile('nid_front_image')) {
            $employeeDocument->nid_front_image = $this->handleFileUpload($request->file('nid_front_image'), 'images/nid/front');
        }
        if ($request->hasFile('nid_back_image')) {
            $employeeDocument->nid_back_image = $this->handleFileUpload($request->file('nid_back_image'), 'images/nid/back');
        }
        if ($request->hasFile('employee_signature')) {
            $employeeDocument->employee_signature = $this->handleFileUpload($request->file('employee_signature'), 'images/employee_signature');
        }
        if ($request->hasFile('resume')) {
            $employeeDocument->resume = $this->handleFileUpload($request->file('resume'), 'documents/resume');
        }

        $employeeDocument->save();

        // Handle other documents
        if ($request->hasFile('other_documents')) {
            foreach ($request->file('other_documents') as $file) {
                $filename = $this->handleFileUpload($file, 'documents/other');
                EmployeeOtherDocs::create([
                    'employee_id' => $employee->id,
                    'other_documents' => $filename,
                ]);
            }
        }

        // Redirect back to the employee index page with success message
        return redirect()->route('employees.index')->with('success', 'Employee created successfully!');
    }

    // Show the form to edit an existing employee
    public function edit($id)
    {
        $designations = Designation::latest('id')->get();
        $departments = Department::latest('id')->get();
        $companies = Company::where('status', 'Active')->get();
        $employee = Employee::find($id);
        $employeeContact = EmployeeContact::where('employee_id', $id)->first();
        $employeeDocs = EmployeeDocument::where('employee_id', $id)->first();
        $employeeOtherDocs = EmployeeOtherDocs::where('employee_id', $id)->get();

        return view('backend.pages.employee.edit', ['departments' => $departments, 'employeeContact' => $employeeContact,
        'employeeDocs' => $employeeDocs,
        'designations' => $designations,
        'employeeOtherDocs' => $employeeOtherDocs,
        'companies' => $companies,
        'employee' => $employee]);
    }

    // Update an existing employee
    public function update(Request $request, $id)
    {
        // Find the employee
        $employee = Employee::findOrFail($id);

        // Handle Passport Photo upload
        $passportPath = $employee->passport_photo;
        if ($request->hasFile('passport_photo')) {

            $passportPath = $this->handleFileUpload($request->file('passport_photo'), 'images/passport');

            if ($employee->passport_photo && Storage::exists('public/' . $employee->passport_photo)) {
                Storage::delete('public/' . $employee->passport_photo);
            }
        }

        // Update employee
        $employee->update([
            'employee_name' => $request->employee_name,
            'employee_id' => $request->employee_id,
            'joining_date' => $request->joining_date,
            'company_id' => $request->company_id,
            'deptID' => $request->deptID,
            'des_id' => $request->des_id,
            'employee_grade' => $request->employee_grade,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'religion' => $request->religion,
            'blood_group' => $request->blood_group,
            'age' => $request->age,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $employee->password,
            'passport_photo' => $passportPath,
        ]);

        // Handle EmployeeContact update
        $employeeContact = $employee->employeeContact;
        if ($request->hasFile('enid_front_image')) {
            $employeeContact->enid_front_image = $this->handleFileUpload($request->file('enid_front_image'), 'images/nid/emergency/front');
        }
        if ($request->hasFile('enid_back_image')) {
            $employeeContact->enid_back_image = $this->handleFileUpload($request->file('enid_back_image'), 'images/nid/emergency/back');
        }
        $employeeContact->update([
            'fathers_name' => $request->fathers_name,
            'mothers_name' => $request->mothers_name,
            'phone_number' => $request->phone_number,
            'office_phone_number' => $request->office_phone_number,
            'email_address' => $request->email_address,
            'marital_status' => $request->marital_status,
            'spouse_name' => $request->spouse_name,
            'spouse_nid' => $request->spouse_nid,
            'spouse_phone' => $request->spouse_phone,
            'present_address' => $request->present_address,
            'present_district' => $request->present_district,
            'present_postal_code' => $request->present_postal_code,
            'permanent_address' => $request->permanent_address,
            'permanent_district' => $request->permanent_district,
            'permanent_postal_code' => $request->permanent_postal_code,
            'emergency_contact_person' => $request->emergency_contact_person,
            'emergency_contact_relation' => $request->emergency_contact_relation,
            'emergency_contact_number' => $request->emergency_contact_number,
            'address' => $request->address,
            'district' => $request->district,
            'postal_code' => $request->postal_code,
        ]);

        // Handle EmployeeDocument update
        $employeeDocument = $employee->employeeDocument;
        if ($request->hasFile('nid_front_image')) {
            $employeeDocument->nid_front_image = $this->handleFileUpload($request->file('nid_front_image'), 'images/nid/front');
        }
        if ($request->hasFile('nid_back_image')) {
            $employeeDocument->nid_back_image = $this->handleFileUpload($request->file('nid_back_image'), 'images/nid/back');
        }
        if ($request->hasFile('employee_signature')) {
            $employeeDocument->employee_signature = $this->handleFileUpload($request->file('employee_signature'), 'images/employee_signature');
        }
        if ($request->hasFile('resume')) {
            $employeeDocument->resume = $this->handleFileUpload($request->file('resume'), 'documents/resume');
        }
        $employeeDocument->update([
            'nid_number' => $request->nid_number ?? 'N/A',
        ]);

        // Handle other documents
        if ($request->hasFile('other_documents')) {
            foreach ($request->file('other_documents') as $file) {
                $filename = $this->handleFileUpload($file, 'documents/other');
                EmployeeOtherDocs::create([
                    'employee_id' => $employee->id,
                    'other_documents' => $filename,
                ]);
            }
        }

        // Redirect back to the employee index page with success message
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    // Delete the employee and their associated files
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);

        // Delete the passport photo
        if ($employee->passport_photo && Storage::exists('public/' . $employee->passport_photo)) {
            Storage::delete('public/' . $employee->passport_photo);
        }

        // Delete associated EmployeeContact files
        $employeeContact = EmployeeContact::where('employee_id', $employee->id)->first();
        if ($employeeContact) {
            if ($employeeContact->enid_front_image && Storage::exists('public/' . $employeeContact->enid_front_image)) {
                Storage::delete('public/' . $employeeContact->enid_front_image);
            }
            if ($employeeContact->enid_back_image && Storage::exists('public/' . $employeeContact->enid_back_image)) {
                Storage::delete('public/' . $employeeContact->enid_back_image);
            }
            $employeeContact->delete();
        }

        // Delete associated EmployeeDocument files
        $employeeDocument = EmployeeDocument::where('employee_id', $employee->id)->first();
        if ($employeeDocument) {
            if ($employeeDocument->nid_front_image && Storage::exists('public/' . $employeeDocument->nid_front_image)) {
                Storage::delete('public/' . $employeeDocument->nid_front_image);
            }
            if ($employeeDocument->nid_back_image && Storage::exists('public/' . $employeeDocument->nid_back_image)) {
                Storage::delete('public/' . $employeeDocument->nid_back_image);
            }
            if ($employeeDocument->employee_signature && Storage::exists('public/' . $employeeDocument->employee_signature)) {
                Storage::delete('public/' . $employeeDocument->employee_signature);
            }
            if ($employeeDocument->resume && Storage::exists('public/' . $employeeDocument->resume)) {
                Storage::delete('public/' . $employeeDocument->resume);
            }
            $employeeDocument->delete();
        }

        // Delete associated EmployeeOtherDocs files
        $employeeOtherDocs = EmployeeOtherDocs::where('employee_id', $employee->id)->get();
        if ($employeeOtherDocs) {
            foreach ($employeeOtherDocs as $document) {
                if ($document->other_documents && Storage::exists('public/' . $document->other_documents)) {
                    Storage::delete('public/' . $document->other_documents);
                }
                $document->delete();
            }
        }

        // Finally, delete the employee
        $employee->delete();

        // Redirect with success message
        return redirect()->route('employees.index')->with('success', 'Employee and all associated data deleted successfully!');
    }
}
