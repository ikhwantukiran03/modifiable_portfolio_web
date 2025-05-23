<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;

class CertificateController extends Controller{

    public function index(){

        $certificates = Certificate::latest()->paginate(10);
        return view('certificate.index', compact('certificates'));
    }

    public function create(){

        return view('certificate.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|text',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:2048',
        ]);

        $certificate = new Certificate();
        $certificate->name = $request->name;
        $certificate->description = $request->description;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $certificate->file = file_get_contents($file->getRealPath());
            $certificate->file_type = $file->getClientMimeType();
        }

        $certificate->save();

        return redirect()->route('certificate.index')->with('success', 'Certificate created successfully');
        

    }

    public function show($id){

        $certificate = Certificate::findOrFail($id);
        return view('certificate.show', compact('certificate'));
    }

    public function edit($id){

        $certificate = Certificate::findOrFail($id);
        return view('certificate.edit', compact('certificate'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|text',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:2048',
        ]);

        $certificate = Certificate::findOrFail($id);
        $certificate->name = $request->name;
        $certificate->description = $request->description;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $certificate->file = file_get_contents($file->getRealPath());
            $certificate->file_type = $file->getClientMimeType();
        }

        $certificate->save();

        return redirect()->route('certificate.index')->with('success', 'Certificate updated successfully');

    }

    public function destroy($id){

        $certificate = Certificate::findOrFail($id);
        $certificate->delete();

        return redirect()->route('certificate.index')->with('success', 'Certificate deleted successfully');

}
}    
    
