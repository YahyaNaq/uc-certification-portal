<?php

namespace App\Http\Controllers;

use App\Models\BirthCertificate;
use App\Models\BirthCertificateChild;
use Illuminate\Http\Request;

class BirthCertificateController extends Controller
{
    public function index()
    {
        return response()->json([
            'message' => 'Birth Certificate API',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'applicantName' => 'required|string|max:255',
            'applicantCnic' => 'required|string|max:255',
            'fatherName' => 'required|string|max:255',
            'fatherCnic' => 'required|string|max:255',
            'motherName' => 'required|string|max:255',
            'motherCnic' => 'required|string|max:255',
            'grandFatherName' => 'required|string|max:255',
            'grandFatherCnic' => 'required|string|max:255',
            'religion' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'districtOfBirth' => 'required|string|max:255',
            'homeOrHospital' => 'required|string|max:255',
            'disability' => 'required|string|max:255',
            'address' => 'required|string',
            // Handle children as needed
        ]);

        // Create a new BirthCertificate record
        $birthCertificate = new BirthCertificate();
        $birthCertificate->applicant_name = $validatedData['applicantName'];
        $birthCertificate->applicant_cnic = $validatedData['applicantCnic'];
        $birthCertificate->father_name = $validatedData['fatherName'];
        $birthCertificate->father_cnic = $validatedData['fatherCnic'];
        $birthCertificate->mother_name = $validatedData['motherName'];
        $birthCertificate->mother_cnic = $validatedData['motherCnic'];
        $birthCertificate->grand_father_name = $validatedData['grandFatherName'];
        $birthCertificate->grand_father_cnic = $validatedData['grandFatherCnic'];
        $birthCertificate->religion = $validatedData['religion'];
        $birthCertificate->gender = $validatedData['gender'];
        $birthCertificate->district_of_birth = $validatedData['districtOfBirth'];
        $birthCertificate->home_or_hospital = $validatedData['homeOrHospital'];
        $birthCertificate->disability = $validatedData['disability'];
        $birthCertificate->address = $validatedData['address'];
        $birthCertificate->save();

        foreach($request->children as $child) {
            $birthCertificateChildren = new BirthCertificateChild();
            $birthCertificateChildren->birth_certificate_id = $birthCertificate->id;
            $birthCertificateChildren->name = $child['name'];
            $birthCertificateChildren->date_of_birth = $child['dateOfBirth'];
            $birthCertificateChildren->save();
        }

        // Return a response or redirect as needed
        return response()->json([
            'message' => 'Birth certificate stored successfully!',
            'data' => $birthCertificate
        ], 201);
    }
}
