@extends('layouts.admin')
@section('title', 'Edit Employee')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Employee</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                        <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Employee List</a>
                </li>
            </ul>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="card">
                    <div class="row">
                        <div class="card-header header-bg-1">
                            <div class="d-flex">
                                <h4 class="card-title">Edit Employee</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <ul class="nav nav-tabs nav-primary" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personal-details" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-home font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Personal Details</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="tab" href="#employee-details" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-user-pin font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">Employee Details</div>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="documents-tab" data-bs-toggle="tab" href="#employee-documents"
                                        role="tab" aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i class='bx bx-file font-18 me-1'></i></div>
                                            <div class="tab-title">Documents</div>
                                        </div>
                                    </a>
                                </li>


                            </ul>
                            <form action="{{ route('employees.update',$employee->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="tab-content mt-3">
                                    <div class="tab-pane fade show active" id="personal-details" role="tabpanel">
                                        <div class="row mb-3 mt-1 g-2">

                                            <div class="col-6">
                                                <label class="form-label">Employee Name <span class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('employee_name') is-invalid @enderror"
                                                    placeholder="Employee Name" name="employee_name" id="employee_name"
                                                    value="{{ old('employee_name', $employee->employee_name ?? '') }}">
                                                @error('employee_name')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-3">
                                                <label class="form-label">Employee ID <span class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('employee_id') is-invalid @enderror"
                                                    placeholder="Enter Employee ID" name="employee_id" id="employee_id"
                                                    value="{{ old('employee_id', $employee->employee_id ?? '') }}">
                                                @error('employee_id')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-3">
                                                <label class="form-label">Joining Date</label>
                                                <input type="date"
                                                    class="form-control @error('joining_date') is-invalid @enderror"
                                                    placeholder="Select Date of Joining" name="joining_date" id="joining_date"
                                                    value="{{ old('joining_date', $employee->joining_date ?? '') }}">
                                                @error('joining_date')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-4">
                                                <label class="form-label">Company <span
                                                        class="text-danger">*</span></label>
                                                <select class="form-select" id="company_id" aria-label="Select Company" name="company_id">
                                                    <option value="">Select Company</option>
                                                    @foreach ($companies as $company)
                                                        <option value="{{ $company->id }}" {{ old('company_id', $employee->company_id ?? '') == $company->id ? 'selected' : '' }}>{{ $company->company_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <label class="form-label">Department <span class="text-danger">*</span></label>
                                                <select class="form-select @error('deptID') is-invalid @enderror"
                                                    id="deptID" name="deptID">
                                                    <option value="">Select Department</option>
                                                    @foreach ($departments as $dept)
                                                        <option value="{{ $dept->id }}"
                                                            {{ old('deptID', $employee->deptID ?? '') == $dept->id ? 'selected' : '' }}>
                                                            {{ $dept->deptName }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('deptID')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-4">
                                                <label class="form-label">Designation <span class="text-danger">*</span></label>
                                                <select class="form-select @error('des_id') is-invalid @enderror"
                                                    id="des_id" name="des_id">
                                                    <option value="">Select Designation</option>
                                                    @foreach ($designations as $des)
                                                        <option value="{{ $des->id }}"
                                                            {{ old('des_id', $employee->des_id ?? '') == $des->id ? 'selected' : '' }}>
                                                            {{ $des->designation_name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('des_id')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-4">
                                                <label class="form-label">Employee Grade</label>
                                                <input type="text"
                                                    class="form-control @error('employee_grade') is-invalid @enderror"
                                                    id="employee_grade" name="employee_grade"
                                                    placeholder="Enter Employee Grade"
                                                    value="{{ old('employee_grade', $employee->employee_grade ?? '') }}">
                                                @error('employee_grade')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>



                                            <div class="col-4">
                                                <label class="form-label">Gender </label>
                                                <select class="form-select @error('gender') is-invalid @enderror"
                                                    id="gender" name="gender">
                                                    <option value="male"
                                                        {{ old('gender', $employee->gender ?? '') == 'male' ? 'selected' : '' }}>
                                                        Male</option>
                                                    <option value="female"
                                                        {{ old('gender', $employee->gender ?? '') == 'female' ? 'selected' : '' }}>
                                                        Female</option>
                                                </select>
                                                @error('gender')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-4">
                                                <label class="form-label">Date of Birth</label>
                                                <input type="date" class="form-control @error('dob') is-invalid @enderror"
                                                    id="dob" name="dob"
                                                    value="{{ old('dob', $employee->dob ?? '') }}">
                                                @error('dob')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-4">
                                                <label class="form-label">Religion</label>
                                                <input type="text"
                                                    class="form-control @error('religion') is-invalid @enderror"
                                                    id="religion" name="religion" placeholder="Enter religion"
                                                    value="{{ old('religion', $employee->religion ?? '') }}">
                                                @error('religion')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-4">
                                                <label class="form-label">Blood Group</label>
                                                <input type="text"
                                                    class="form-control @error('blood_group') is-invalid @enderror"
                                                    name="blood_group" id="blood_group" placeholder="Enter blood group"
                                                    value="{{ old('blood_group', $employee->blood_group ?? '') }}">
                                                @error('blood_group')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-4">
                                                <label class="form-label">Age</label>
                                                <input type="text" class="form-control @error('age') is-invalid @enderror"
                                                    id="age" name="age" placeholder="Enter age"
                                                    value="{{ old('age', $employee->age ?? '') }}">
                                                @error('age')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-4">
                                                <label class="form-label">Login Email <span class="text-danger">*</span></label>
                                                <input type="email"
                                                    class="form-control @error('email') is-invalid @enderror" id="email"
                                                    name="email" value="{{ old('email', $employee->email ?? '') }}">
                                                @error('email')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>



                                            <div class="col-4">
                                                <label class="form-label">Passport Photo <span class="text-danger">*</span></label>
                                                <input class="form-control @error('passport_photo') is-invalid @enderror"
                                                    type="file" id="passport_photo" name="passport_photo"
                                                    accept="image/*">

                                                @error('passport_photo')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                                <span class="text-danger fst-italic">Max file size 3 MB file type jpg,png,jpeg,pdf </span>

                                                    <span class="d-block text-muted"><span class="text-primary">Passport photo </span> {{ basename($employee->passport_photo) }}</span> <!-- Display the file name -->
                                            </div>
                                        </div>
                                        <div class="btn btn-primary continue">Next</div>
                                    </div>

                                    <div class="tab-pane fade" id="employee-details" role="tabpanel">
                                        <div class="row mb-3 mt-1 g-2">
                                            <!-- New Section: Employee Details -->
                                            <div class="col-6">
                                                <label class="form-label">Father's Name</label>
                                                <input type="text"
                                                    class="form-control @error('fathers_name') is-invalid @enderror"
                                                    id="fathers_name" placeholder="Enter father's name" name="fathers_name"
                                                    value="{{ $employeeContact->fathers_name ?? '' }}">
                                                @error('fathers_name')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Mother's Name</label>
                                                <input type="text"
                                                    class="form-control @error('mothers_name') is-invalid @enderror"
                                                    id="mothers_name" placeholder="Enter mother's name" name="mothers_name"
                                                    value="{{ $employeeContact->mothers_name ?? '' }}">
                                                @error('mothers_name')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <label for="phone_number" class="form-label">Personal Phone Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('phone_number') is-invalid @enderror"
                                                    id="phone_number" name="phone_number"  value="{{ $employeeContact->phone_number ?? '' }}">
                                                @error('phone_number')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <label for="office_phone_number" class="form-label">Official Phone Number <span
                                                        class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('office_phone_number') is-invalid @enderror"
                                                    id="office_phone_number" name="office_phone_number"  value="{{ $employeeContact->office_phone_number ?? '' }}">
                                                @error('office_phone_number')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label">Email Address</label>
                                                <input type="email"
                                                    class="form-control @error('email_address') is-invalid @enderror"
                                                    id="email_address" name="email_address"
                                                    value="{{ $employeeContact->email_address ?? '' }}">
                                                @error('email_address')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <label class="form-label">Marital Status</label>
                                                <select class="form-select @error('marital_status') is-invalid @enderror" name="marital_status">
                                                    <option value="0" {{ $employeeContact->office_phone_number == 0 ? 'selected' : '' }}>Unmarried</option>
                                                    <option value="1" {{ $employeeContact->office_phone_number == 1 ? 'selected' : '' }}>Married</option>
                                                </select>
                                                @error('marital_status')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Spouse Info Fields -->
                                            <div class="col-md-4 spouse-info d-none">
                                                <label for="spouse_name" class="form-label">Spouse Name</label>
                                                <input type="text"
                                                    class="form-control @error('spouse_name') is-invalid @enderror"
                                                    id="spouse_name" name="spouse_name"
                                                    value="{{ $employeeContact->spouse_name ?? '' }}">
                                                @error('spouse_name')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 spouse-info d-none">
                                                <label for="spouse_nid" class="form-label">Spouse NID</label>
                                                <input type="text"
                                                    class="form-control @error('spouse_nid') is-invalid @enderror"
                                                    id="spouse_nid" name="spouse_nid"
                                                    value="{{ $employeeContact->spouse_nid ?? '' }}">
                                                @error('spouse_nid')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-md-4 spouse-info d-none">
                                                <label for="spouse_phone" class="form-label">Spouse Phone Number</label>
                                                <input type="text"
                                                    class="form-control @error('spouse_phone') is-invalid @enderror"
                                                    id="spouse_phone" name="spouse_phone"
                                                    value="{{ $employeeContact->spouse_phone ?? '' }}">
                                                @error('spouse_phone')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-6">
                                                <label class="form-label">Present Address</label>
                                                <textarea class="form-control @error('present_address') is-invalid @enderror" placeholder="Present Address"
                                                    name="present_address" id="present_address" rows="4">{{ old('present_address', $employeeContact->present_address) }}</textarea>
                                                @error('present_address')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <label for="present_district" class="form-label">District</label>
                                                <input type="text"
                                                    class="form-control @error('present_district') is-invalid @enderror"
                                                    id="present_district" name="present_district"
                                                    value="{{ old('present_district', $employeeContact->present_district) }}">
                                                @error('present_district')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <label for="present_postal_code" class="form-label">Postal Code</label>
                                                <input type="text"
                                                    class="form-control @error('present_postal_code') is-invalid @enderror"
                                                    id="present_postal_code" name="present_postal_code"
                                                    value="{{ old('present_postal_code', $employeeContact->present_postal_code) }}">
                                                @error('present_postal_code')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="col-12">
                                                <div class="form-check d-flex gap-2">
                                                    <input class="form-check-input" type="checkbox" id="sameAddressRadio">
                                                    <label class="form-check-label" for="sameAddressRadio">Same As Present
                                                        Address</label>
                                                </div>
                                            </div>

                                            <div class="col-6">
                                                <label class="form-label">Permanent Address</label>
                                                <textarea class="form-control @error('permanent_address') is-invalid @enderror" name="permanent_address"
                                                    placeholder="Permanent Address" id="permanent_address" rows="4">{{ old('permanent_address', $employeeContact->permanent_address) }}</textarea>
                                                @error('permanent_address')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <label for="permanent_district" class="form-label">District</label>
                                                <input type="text"
                                                    class="form-control @error('permanent_district') is-invalid @enderror"
                                                    id="permanent_district" name="permanent_district"
                                                    value="{{ old('permanent_district', $employeeContact->permanent_district) }}">
                                                @error('permanent_district')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-3">
                                                <label for="permanent_postal_code" class="form-label">Postal Code</label>
                                                <input type="text"
                                                    class="form-control @error('permanent_postal_code') is-invalid @enderror"
                                                    id="permanent_postal_code" name="permanent_postal_code"
                                                    value="{{ old('permanent_postal_code', $employeeContact->permanent_postal_code) }}">
                                                @error('permanent_postal_code')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="bordered-section p-3">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <label for="emergency_contact_person" class="form-label">Emergency
                                                            Contact Person</label>
                                                        <input type="text"
                                                            class="form-control @error('emergency_contact_person') is-invalid @enderror"
                                                            id="emergency_contact_person" name="emergency_contact_person"
                                                            value="{{ old('emergency_contact_person', $employeeContact->emergency_contact_person) }}">
                                                        @error('emergency_contact_person')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="emergency_contact_relation"
                                                            class="form-label">Relation</label>
                                                        <input type="text"
                                                            class="form-control @error('emergency_contact_relation') is-invalid @enderror"
                                                            id="emergency_contact_relation" name="emergency_contact_relation"
                                                            value="{{ old('emergency_contact_relation', $employeeContact->emergency_contact_relation) }}">
                                                        @error('emergency_contact_relation')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label for="emergency_contact_number" class="form-label">Contact
                                                            Number</label>
                                                        <input type="text"
                                                            class="form-control @error('emergency_contact_number') is-invalid @enderror"
                                                            id="emergency_contact_number" name="emergency_contact_number"
                                                            value="{{ old('emergency_contact_number', $employeeContact->emergency_contact_number) }}">
                                                        @error('emergency_contact_number')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-1">NID Front Image</label>
                                                        <div class="input-group mb-2">
                                                            <input type="file"
                                                                class="form-control @error('enid_front_image') is-invalid @enderror"
                                                                name="enid_front_image" id="enid_front_image">

                                                        </div>

                                                        @error('enid_front_image')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                        <span class="text-danger fst-italic">Max file size 3 MB file type jpg,png,jpeg,pdf </span>

                                                            <span class="d-block text-muted"><span class="text-primary">Emergency NID Front </span> {{ basename($employeeContact->enid_front_image) }}</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label mt-1">NID Back Image</label>
                                                        <div class="input-group mb-2">
                                                            <input type="file"
                                                                class="form-control @error('enid_back_image') is-invalid @enderror"
                                                                id="enid_back_image" name="enid_back_image">

                                                        </div>

                                                        @error('enid_back_image')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                        <span class="text-danger fst-italic">Max file size 3 MB file type jpg,png,jpeg,pdf </span>
                                                            <span class="d-block text-muted"><span class="text-primary">Emergency NID Back </span>{{ basename($employeeContact->enid_back_image) }}</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="form-label">Present Address</label>
                                                        <textarea class="form-control @error('address') is-invalid @enderror" placeholder="Present Address" name="address"
                                                            rows="4">{{ $employeeContact->address ?? '' }}</textarea>
                                                        @error('address')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-3">
                                                        <label for="district" class="form-label">District</label>
                                                        <input type="text"
                                                            class="form-control @error('district') is-invalid @enderror"
                                                            id="district" name="district"
                                                            value="{{  $employeeContact->district ?? '' }}">
                                                        @error('district')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-3">
                                                        <label for="postal_code" class="form-label">Postal Code</label>
                                                        <input type="text"
                                                            class="form-control @error('postal_code') is-invalid @enderror"
                                                            id="postal_code" name="postal_code"
                                                            value="{{  $employeeContact->postal_code ?? ''}}">
                                                        @error('postal_code')
                                                            <span class="invalid-feedback">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn btn-primary back">Previous</div>
                                        <div class="btn btn-primary continue">Next</div>
                                    </div>
                                    <div class="tab-pane fade" id="employee-documents" role="tabpanel">
                                        <div class="row mb-3 mt-1 g-2">
                                            <!-- Employee NID Number -->
                                            <div class="col-4">
                                                <label class="form-label">NID Number <span class="text-danger">*</span></label>
                                                <input type="text"
                                                    class="form-control @error('nid_number') is-invalid @enderror"
                                                    id="nid_number" name="nid_number"
                                                    value="{{ old('nid_number', $employeeDocs->nid_number ?? '') }}"
                                                    placeholder="Enter Employee NID Number">

                                                @error('nid_number')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- NID Front Image -->
                                            <div class="col-4">
                                                <label class="form-label">NID Front Image</label>
                                                <div class="input-group mb-2">
                                                    <input type="file"
                                                        class="form-control @error('nid_front_image') is-invalid @enderror"
                                                        id="nid_front_image" name="nid_front_image">

                                                </div>

                                                @error('nid_front_image')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                                <span class="text-danger fst-italic">Max file size 3 MB file type jpg,png,jpeg,pdf </span>
                                                    <span class="d-block text-muted"><span class="text-primary"> NID Front </span>{{ basename($employeeDocs->nid_front_image) }}</span>
                                            </div>

                                            <!-- NID Back Image -->
                                            <div class="col-4">
                                                <label class="form-label">NID Back Image</label>
                                                <div class="input-group mb-2">
                                                    <input type="file"
                                                        class="form-control @error('nid_back_image') is-invalid @enderror"
                                                        id="nid_back_image" name="nid_back_image">

                                                </div>

                                                @error('nid_back_image')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                                <span class="text-danger fst-italic">Max file size 3 MB file type jpg,png,jpeg,pdf </span>

                                                    <span class="d-block text-muted"><span class="text-primary"> NID Back </span>{{ basename($employeeDocs->nid_back_image) }}</span>
                                            </div>

                                            <!-- Employee Signature -->
                                            <div class="col-4">
                                                <label class="form-label">Signature</label>
                                                <div class="input-group mb-2">
                                                    <input type="file"
                                                        class="form-control @error('employee_signature') is-invalid @enderror"
                                                        name="employee_signature" id="employee_signature">

                                                </div>

                                                @error('employee_signature')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                                <span class="text-danger fst-italic">Max file size 3 MB file type jpg,png,jpeg,pdf </span>
                                                    <span class="d-block text-muted"><span class="text-primary"> Employee Signature  </span> {{ basename($employeeDocs->employee_signature) }}</span>
                                            </div>

                                            <!-- Resume -->
                                            <div class="col-4">
                                                <label class="form-label">Resume</label>
                                                <div class="input-group mb-2">
                                                    <input type="file"
                                                        class="form-control @error('resume') is-invalid @enderror"
                                                        name="resume" id="resume">

                                                </div>

                                                @error('resume')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                                <span class="text-danger fst-italic">Max file size 3 MB file type jpg,png,jpeg,pdf </span>

                                                    <span class="d-block text-muted"><span class="text-primary"> Employee resume  </span> {{ basename($employeeDocs->resume) }}</span>
                                            </div>

                                            <!-- Other Documents -->
                                            <div class="col-4">
                                                <label class="form-label">Other Documents</label>
                                                <div class="input-group mb-2">
                                                    <input type="file"
                                                        class="form-control @error('other_documents.*') is-invalid @enderror"
                                                        id="other_documents" name="other_documents[]" multiple>
                                                </div>
                                                @error('other_documents.*')
                                                    <span class="invalid-feedback">{{ $message }}</span>
                                                @enderror
                                                <span class="text-warning fst-italic">Max file size 5 MB file type jpg,png,jpeg
                                                </span>
                                               @if($employeeOtherDocs)
                                               @foreach($employeeOtherDocs as $empother_Doc_file)
                                                <span class="d-block text-muted"><span class="text-primary"> Other Documents  </span> {{ basename($empother_Doc_file->other_documents) }}</span>
                                                @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        <div class="btn btn-primary back">Previous</div>
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@push('script')
<script>
    document.querySelectorAll('.continue').forEach(function(button) {
        button.addEventListener('click', function() {
            var currentTab = document.querySelector('.nav-link.active');
            var nextTab = currentTab.parentElement.nextElementSibling;

            if (nextTab) {
                var nextTabLink = nextTab.querySelector('.nav-link');
                nextTabLink.click();
            }
        });
    });
    document.querySelectorAll('.back').forEach(function(button) {
        button.addEventListener('click', function() {
            var currentTab = document.querySelector('.nav-link.active');
            var prevTab = currentTab.parentElement.previousElementSibling;

            if (prevTab) {
                var prevTabLink = prevTab.querySelector('.nav-link');
                prevTabLink.click();
            }
        });
    });

    $(document).ready(function() {
        $('#sameAddressRadio').on('change', function() {
            if ($(this).is(':checked')) {
                // Copy present address, district, and postal code to permanent fields
                $('#permanent_address').val($('#present_address').val());
                $('#permanent_district').val($('#present_district').val());
                $('#permanent_postal_code').val($('#present_postal_code').val());
            } else {
                // Clear the permanent fields if the checkbox is unchecked
                $('#permanent_address').val('');
                $('#permanent_district').val('');
                $('#permanent_postal_code').val('');
            }
        });
        // Add change event listener to the radio buttons
        $('select[name="marital_status"]').on('change', function() {
            var selectedValue = $(this).val();
            if (selectedValue == 1) {
                $('.spouse-info').removeClass('d-none');
            } else {
                $('.spouse-info').addClass('d-none');
            }
        });

        $('#company_id').on('change', function() {
            var companyId = $(this).val();
            if (companyId) {
                $.ajax({
                    url: '/report/departments/' + companyId,
                    type: 'GET',
                    success: function(data) {
                        $('#deptID').empty().append('<option value="">Select Department</option>');
                        $.each(data, function(index, department) {
                            $('#deptID').append('<option value="' + department.id + '">' + department.deptName + '</option>');
                        });
                    }
                });
            } else {
                $('#deptID').empty().append('<option value="">Select Department</option>');
            }
        });

    });
</script>
@endpush
