<?php

namespace App\Http\Controllers;

use App\Models\BirthCertificate;
use App\Models\BirthCertificateChild;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class BirthCertificateController extends Controller
{
    public function index(Request $request)
    {
        $birth_certificates = BirthCertificate::join('verification_statuses as statuses', 'statuses.id', 'birth_certificates.status_id')
            ->join('birth_certificate_children as bcc', 'bcc.birth_certificate_id', 'birth_certificates.id')
            ->orderBy('birth_certificates.id', 'DESC')
            ->get();

        return response()->json([
            'data' => $birth_certificates,
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
            'cellNo' => 'required|string',
            // Handle children as needed
        ]);

        try {

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
            $birthCertificate->phone_number = $validatedData['cellNo'];
            $birthCertificate->status_id = 1;
            $birthCertificate->save();
    
            foreach ($request->children as $child) {
                $birthCertificateChildren = new BirthCertificateChild();
                $birthCertificateChildren->birth_certificate_id = $birthCertificate->id;
                $birthCertificateChildren->name = $child['name'];
                $birthCertificateChildren->date_of_birth = Carbon::parse($child['dateOfBirth']);
                $birthCertificateChildren->save();
            }
    
            dd($request->all());
            // if ()
            $path = $request->file('hospitalBirthCertificate')->store('images', 'public');

            DB::commit();
    
            // Return a response or redirect as needed
            return response()->json([
                'message' => 'Birth certificate stored successfully!',
                'data' => $birthCertificate
            ], 201);

        } catch (QueryException $qe) {
            return response()->json([
                'message' => "Error storing data",
                'details' => $qe->getMessage()
            ], 500);
        }

        // Create a new BirthCertificate record
    }

    public function update()
    {
        
    }
}
