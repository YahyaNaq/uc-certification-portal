<?php

namespace App\Http\Controllers;

use App\Models\BirthCertificate;
use App\Models\BirthCertificateChild;
use App\Models\Certificate;
use App\Models\CertificateDocument;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BirthCertificateController extends Controller
{
    public function index(Request $request)
    {
        $birth_certificates = BirthCertificate::join('verification_statuses as statuses', 'statuses.id', 'birth_certificates.status_id')
            ->leftjoin('birth_certificate_children as bcc', 'bcc.birth_certificate_id', 'birth_certificates.id')
            ->orderBy('birth_certificates.id', 'DESC')
            ->get([
                'birth_certificates.id',
                'birth_certificates.applicant_name',
                'birth_certificates.applicant_cnic',
                'birth_certificates.father_name',
                'birth_certificates.father_cnic',
                'birth_certificates.mother_name',
                'birth_certificates.mother_cnic',
                'birth_certificates.grand_father_name',
                'birth_certificates.grand_father_name',
                'birth_certificates.religion',
                'birth_certificates.gender',
                'birth_certificates.district_of_birth',
                'birth_certificates.home_or_hospital',
                'birth_certificates.disability',
                'birth_certificates.address',
                'birth_certificates.phone_number',
                'statuses.name as status',
                'statuses.id as status_id',
            ]);

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
            'religion' => 'required|max:255',
            'gender' => 'required|max:255',
            'districtOfBirth' => 'required|string|max:255',
            'homeOrHospital' => 'required|string|max:255',
            'disability' => 'required|string|max:255',
            'address' => 'required|string',
            'cellNo' => 'required|string',
            // Handle children as needed
        ]);

        DB::beginTransaction();

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
    
            // foreach ($request->children as $child) {
            //     $birthCertificateChildren = new BirthCertificateChild();
            //     $birthCertificateChildren->birth_certificate_id = $birthCertificate->id;
            //     $birthCertificateChildren->name = $child['name'];
            //     $birthCertificateChildren->date_of_birth = Carbon::parse($child['dateOfBirth']);
            //     $birthCertificateChildren->save();
            // }

            $certId = $birthCertificate->id;
            CertificateDocumentsController::store($certId, $request->file('hospitalBirthCertificate'), [1, 'birth'], [1, 'certificate']);
            CertificateDocumentsController::store($certId, $request->file('copyOfFatherNic'), [1, 'birth'], [1, 'cnic']);
            CertificateDocumentsController::store($certId, $request->file('copyOfMotherNic'), [1, 'birth'], [1, 'cnic']);
            CertificateDocumentsController::store($certId, $request->file('copyOfGrandFatherNic'), [1, 'birth'], [1, 'cnic']);
            CertificateDocumentsController::store($certId, $request->file('affidavit'), [1, 'birth'], [1, 'affidavit']);   

            DB::commit();
    
            // Return a response or redirect as needed
            return response()->json([
                'message' => 'Birth certificate stored successfully!',
                'data' => $birthCertificate
            ], 201);

        } catch (QueryException $qe) {
            DB::rollBack();
            return response()->json([
                'message' => "Error storing data",
                'details' => $qe->getMessage()
            ], 500);
        }

        // Create a new BirthCertificate record
    }

    public function getDocuments(Request $request)
    {
        $filePaths = CertificateDocument::where('certificate_id', $request->id)
            ->pluck('file_path');     

        $existingFiles = $filePaths->filter(function ($filePath) {
            return Storage::disk('public')->exists($filePath);
        });

        if ($existingFiles->isEmpty()) {
            return response()->json(['message' => 'No files found'], 404);
        }

        $fileUrls = $existingFiles->map(function ($filePath) {
            return Storage::url($filePath);
        });

        return response()->json($fileUrls);
    }

    public function updateStatus(Request $request)
    {
        $birth_certificate = BirthCertificate::where('id', $request->certificate['id'])
            ->first(['id', 'status_id', 'applicant_name']);
        $birth_certificate->status_id = $request->status;
        $birth_certificate->save();

        return response()->json([
            'new_status' => $birth_certificate->status->name,
            'applicant_name' => $birth_certificate->applicant_name
        ]);
    }

    public function update()
    {
        
    }
}
