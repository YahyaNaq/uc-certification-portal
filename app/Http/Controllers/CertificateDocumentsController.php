<?php

namespace App\Http\Controllers;

use App\Models\CertificateDocument;
use Illuminate\Http\Request;

class CertificateDocumentsController extends Controller
{
    public static function store($certificateId, $file, $certificateType, $docType)
    {
        $fileName = "$certificateType[1]-$docType[1]-$certificateId." . $file->getClientOriginalExtension();
        $file->storeAs('certificate_documents', $fileName, 'public');

        $document = new CertificateDocument();
        $document->document_type_id = $docType[0];
        $document->certificate_id = $certificateId;
        $document->certificate_type_id = $certificateType[0];
        $document->file_path = "certificate_documents/$fileName";
        $document->save();

        return $document->file_path;
    }
}
