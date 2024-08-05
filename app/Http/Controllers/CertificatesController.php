<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificatesController extends Controller
{
    public function index()
    {
        $certificates = Certificate::all();

        return response()->json([
            'certificates' => $certificates
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'issued_at' => 'required|date',
        ]);

        $certificate = Certificate::create($request->all());
        return response()->json($certificate, 201);
    }
}
