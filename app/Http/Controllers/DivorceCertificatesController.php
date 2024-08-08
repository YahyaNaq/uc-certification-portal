<?php

namespace App\Http\Controllers;

use App\Models\DivorceCertificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DivorceCertificatesController extends Controller
{
    public function index()
    {
        $certificates = DivorceCertificate::all();

        return response()->json([
            'certificates' => $certificates
        ]);
    }

    public function store(Request $request)
    {
        $validation = Validator::make([
            'divorcer_name' => 'required|string|max:255',
            'divorcer_cnic' => 'required|string|max:15',
            'divorcer_father_name' => 'required|string|max:255',
            'divorcer_father_cnic' => 'required|string|max:15',
            'divorcer_address' => 'required|string|max:500',
            'divorcee_name' => 'required|string|max:255',
            'divorcee_cnic' => 'required|string|max:15',
            'divorcee_father_name' => 'required|string|max:255',
            'divorcee_father_cnic' => 'required|string|max:15',
            'divorcee_address' => 'required|string|max:500',
            'authority' => 'required|string|max:255',
            'details' => 'required|string',
            'place_of_marriage' => 'required|string|max:255',
            'arbitration_details' => 'required|string',
            'children_count' => 'required|integer|min:0',
            'husband_previous_divorces' => 'required|integer|min:0',
            'wife_previous_divorces' => 'required|integer|min:0',
            'reconciliation_failure_date' => 'required|date',
            'notice_date' => 'required|date',
            'registration_date' => 'required|date',
            'marriage_date' => 'required|date',
            'divorce_effective_date' => 'required|date',

            'cell_no' => 'required|string|max:15',
        ]);

        if ($validation->fails()) {
            return response()->json([
                'message' => "Input could not be validated",
                'errors' => $validation->errors()
            ], 422);
        }

        $certificate = DivorceCertificate::create($request->all());

        return response()->json([
            'certificate' => $certificate,
            'message' => "certificate saved successfully"
        ], 201);
    }
}
