<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller{

    public function index(){

        $contacts = Contact::latest()->paginate(10);
        return view('contact.index', compact('contacts'));
    }

    public function create(){

        return view('contact.create');
    }

    public function store(Request $request){

        $request->validate([
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'proz' => 'nullable|string',
            'additional_info' => 'nullable|text',
        ]);

        $contact = new Contact();
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->linkedin = $request->linkedin;
        $contact->proz = $request->proz;
        $contact->additional_info = $request->additional_info;
        $contact->save();

        return redirect()->route('contact.index')->with('success', 'Contact created successfully');
    }

    public function show($id){

        $contact = Contact::findOrFail($id);
        return view('contact.show', compact('contact'));
    }

    public function edit($id){

        $contact = Contact::findOrFail($id);
        return view('contact.edit', compact('contact'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'email' => 'required|email',
            'phone' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'proz' => 'nullable|string',
            'additional_info' => 'nullable|text',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->linkedin = $request->linkedin;
        $contact->proz = $request->proz;
        $contact->additional_info = $request->additional_info;
        $contact->save();

        return redirect()->route('contact.index')->with('success', 'Contact updated successfully');
    }

    public function destroy($id){

        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contact.index')->with('success', 'Contact deleted successfully');
    }


    
    
}
