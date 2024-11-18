<?php

namespace App\Http\Controllers\Admin;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Company\CreateRequest;
use App\Http\Requests\Company\UpdateRequest;


class CompanyController extends Controller
{

    public function index()
    {
        $companies = Company::get();
        return view('backend.pages.company.index',['companies'=>$companies]);
    }

    private function handleFileUpload($file, $path)
    {
        $fileName = time() . '.' . $file->getClientOriginalExtension();
        return $file->storeAs('uploads/' . $path, $fileName, 'public');
    }

    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string',
            'company_address' => 'required|string',
        ]);
        try {
            $companyLogo = $request->hasFile('company_logo') ?
                        $this->handleFileUpload($request->file('company_logo'), 'images/company') : null;
            Company::create([
                'company_name'=>$request->company_name,
                'company_address'=>$request->company_address,
                'district'=>$request->district ?? null,
                'zipcode'=>$request->zipcode ?? null,
                'contact_no'=>$request->contact_no ?? null,
                'whatsapp_number'=>$request->whatsapp_number ?? null,
                'land_phone_no'=>$request->land_phone_no ?? null,
                'email'=> $request->email ?? null,
                'company_website'=>$request->company_website ?? null,
                'facebook_url'=>$request->facebook_url ?? null,
                'company_logo'=>$companyLogo,
                'registration_no'=>$request->registration_no ?? null,
                'status'=>$request->status ?? null
            ]);
            return redirect()->back()->with('success','Created Successfully');

        } catch (\Exception $e) {
           return redirect()->back()->with('error','Not Created !');
        }
    }
    public function edit($id)
    {
        $company = Company::find($id);
        $companies =  Company::get();

        return view('backend.pages.company.edit',['company'=>$company,'companies'=>$companies]);
    }


    public function update(Request $request, $id)
    {
        try {
            $company = Company::find($id);
            // If the department doesn't exist, return with an error message.
            if (!$company) {
                return redirect()->back()->with('error', 'Department not found!');
            }
            $logoPath = $company->company_logo;
            if ($request->hasFile('company_logo')) {

                $logoPath = $this->handleFileUpload($request->file('company_logo'), 'images/company');

                if ($company->company_logo && Storage::exists('public/' . $company->company_logo)) {
                    Storage::delete('public/' . $company->company_logo);
                }
            }

            $company->update([
                'company_name'=>$request->company_name,
                'company_address'=>$request->company_address,
                'district'=>$request->district ?? null,
                'zipcode'=>$request->zipcode ?? null,
                'contact_no'=>$request->contact_no ?? null,
                'whatsapp_number'=>$request->whatsapp_number ?? null,
                'land_phone_no'=>$request->land_phone_no ?? null,
                'email'=> $request->email ?? null,
                'company_website'=>$request->company_website ?? null,
                'facebook_url'=>$request->facebook_url ?? null,
                'company_logo'=>$logoPath,
                'registration_no'=>$request->registration_no ?? null,
                'status'=>$request->status ?? null
            ]);
            // Redirect with a success message.
            return redirect()->route('companies.index')->with('success', 'Updated Successfully');
        } catch (\Exception $e) {
            // Handle any exception and return with an error message.
            return redirect()->back()->with('error', 'Not Updated!');
        }
    }
    public function destroy(string $id)
    {
        try {
            $company = Company::find($id);
            if (!$company) {
                return redirect()->back()->with('error', 'Company not found!');
            }

            // Delete the passport photo
            if ($company->company_logo && Storage::exists('public/' . $company->company_logo)) {
                Storage::delete('public/' . $company->company_logo);
            }
            $company->delete();
            // Redirect with a success message.
            return redirect()->route('companies.index')->with('success', 'Deleted Successfully');
        } catch (\Exception $e) {
            // Handle any exception and return with an error message.
            return redirect()->back()->with('error', 'Not Deleted!');
        }
    }
}
