<?php

namespace App\Http\Controllers\Admin;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::all();
        return view('admin.client.client',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.client.addclient');
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         // Validate the form inputs, including files
         $validatedData = $request->validate([
             'client_name' => 'nullable|string|max:255',
             'client_designation' => 'nullable|string|max:255',
             'company_name' => 'nullable|string|max:255',
             'company_address' => 'nullable|string|max:255',
             'company_phone' => 'nullable|string',
             'company_website' => 'nullable|string',
             'company_email' => 'nullable|email',
             'company_fb_url' => 'nullable|string',
             'company_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
             'business_card' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
             'client_phone' => 'nullable|string',
             'client_email' => 'nullable|email',
             'client_mailing_address' => 'nullable|string|max:255',
             'client_passport_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
             'client_nid_number' => 'nullable|string|max:20',
             'client_nid_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
             'documents' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
             'organizational_name' => 'nullable|string|max:255',
             'organizational_phone_number' => 'nullable|string',
             'organizational_whatsapp_number' => 'nullable|string',
             'organizational_email' => 'nullable|email',
             'organizational_address' => 'nullable|string|max:255',
             'organizational_website' => 'nullable|string',
             'organizational_fb_url' => 'nullable|string',
             'organizational_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
             'organizational_business_card' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
             'organizational_other_documents' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
             'contact_name' => 'nullable|string|max:255',
             'contact_designation' => 'nullable|string|max:255',
             'contact_company' => 'nullable|string|max:255',
             'contact_phone' => 'nullable|string',
             'contact_whatsapp' => 'nullable|string',
             'contact_email' => 'nullable|email',
             'contact_business_card' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
             'contact_nid_number' => 'nullable|string|max:20',
             'contact_nid_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
             'contact_other_documents' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
         ]);

         // Exclude file fields for bulk insert
         $data = $request->except([
             'company_logo', 'business_card', 'client_passport_image', 'client_nid_image', 'documents',
             'organizational_logo', 'organizational_business_card', 'organizational_other_documents',
             'contact_business_card', 'contact_nid_image', 'contact_other_documents'
         ]);

         // Handle file uploads for each file field
         $fileFields = [
             'company_logo' => 'uploads/company_logos',
             'business_card' => 'uploads/business_cards',
             'client_passport_image' => 'uploads/client_passports',
             'client_nid_image' => 'uploads/client_nids',
             'documents' => 'uploads/documents',
             'organizational_logo' => 'uploads/organizational_logos',
             'organizational_business_card' => 'uploads/organizational_business_cards',
             'organizational_other_documents' => 'uploads/organizational_documents',
             'contact_business_card' => 'uploads/contact_business_cards',
             'contact_nid_image' => 'uploads/contact_nids',
             'contact_other_documents' => 'uploads/contact_documents'
         ];

         foreach ($fileFields as $field => $path) {
             if ($request->hasFile($field)) {
                 $data[$field] = $request->file($field)->store($path, 'public');
             }
         }

         // Store the client data
         Client::create($data);

         return redirect()->route('client.index')->with('success', 'Client added successfully.');
     }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Fetch the client data from the database using the provided ID
        $client= Client::findOrFail($id); // Use findOrFail to handle cases where the client might not exist

        // Pass the client data to the edit view
        return view('admin.client.editclient', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validate the form inputs, including files
    $validatedData = $request->validate([
        'client_name' => 'nullable|string|max:255',
        'client_designation' => 'nullable|string|max:255',
        'company_name' => 'nullable|string|max:255',
        'company_address' => 'nullable|string|max:255',
        'company_phone' => 'nullable|string',
        'company_website' => 'nullable|string',
        'company_email' => 'nullable|email',
        'company_fb_url' => 'nullable|string',
        'company_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'business_card' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'client_phone' => 'nullable|string',
        'client_email' => 'nullable|email',
        'client_mailing_address' => 'nullable|string|max:255',
        'client_passport_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'client_nid_number' => 'nullable|string|max:20',
        'client_nid_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'documents' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'organizational_name' => 'nullable|string|max:255',
        'organizational_phone_number' => 'nullable|string',
        'organizational_whatsapp_number' => 'nullable|string',
        'organizational_email' => 'nullable|email',
        'organizational_address' => 'nullable|string|max:255',
        'organizational_website' => 'nullable|string',
        'organizational_fb_url' => 'nullable|string',
        'organizational_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'organizational_business_card' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'organizational_other_documents' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        'contact_name' => 'nullable|string|max:255',
        'contact_designation' => 'nullable|string|max:255',
        'contact_company' => 'nullable|string|max:255',
        'contact_phone' => 'nullable|string',
        'contact_whatsapp' => 'nullable|string',
        'contact_email' => 'nullable|email',
        'contact_business_card' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'contact_nid_number' => 'nullable|string|max:20',
        'contact_nid_image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'contact_other_documents' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
    ]);

    // Find the existing client by ID
    $client = Client::findOrFail($id);

    // Exclude file fields for bulk update
    $data = $request->except([
        'company_logo', 'business_card', 'client_passport_image', 'client_nid_image', 'documents',
        'organizational_logo', 'organizational_business_card', 'organizational_other_documents',
        'contact_business_card', 'contact_nid_image', 'contact_other_documents'
    ]);

    // Handle file uploads for each file field
    $fileFields = [
        'company_logo' => 'uploads/company_logos',
        'business_card' => 'uploads/business_cards',
        'client_passport_image' => 'uploads/client_passports',
        'client_nid_image' => 'uploads/client_nids',
        'documents' => 'uploads/documents',
        'organizational_logo' => 'uploads/organizational_logos',
        'organizational_business_card' => 'uploads/organizational_business_cards',
        'organizational_other_documents' => 'uploads/organizational_documents',
        'contact_business_card' => 'uploads/contact_business_cards',
        'contact_nid_image' => 'uploads/contact_nids',
        'contact_other_documents' => 'uploads/contact_documents'
    ];

    foreach ($fileFields as $field => $path) {
        if ($request->hasFile($field)) {
            // Delete the old file if it exists
            if ($client->$field) {
                Storage::disk('public')->delete($client->$field);
            }
            // Store the new file and update the data array
            $data[$field] = $request->file($field)->store($path, 'public');
        } else {
            // Retain the old file if no new file was uploaded
            $data[$field] = $client->$field;
        }
    }

    // Update the client data
    $client->update($data);

    return redirect()->route('client.index')->with('success', 'Client updated successfully.');
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);

        // Define the file fields and paths
        $fileFields = [
            'company_logo',
            'business_card',
            'client_passport_image',
            'client_nid_image',
            'documents',
            'organizational_logo',
            'organizational_business_card',
            'organizational_other_documents',
            'contact_business_card',
            'contact_nid_image',
            'contact_other_documents'
        ];

        // Delete associated files if they exist
        foreach ($fileFields as $field) {
            if ($client->$field) {
                Storage::disk('public')->delete($client->$field);
            }
        }

        // Delete the client record from the database
        $client->delete();

        return redirect()->route('client.index')->with('success', 'Client deleted successfully.');
    }

}
