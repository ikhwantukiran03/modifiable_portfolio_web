<?php

namespace App\Http\Controllers;

use App\Models\About_me;
use App\Models\Contact;
use App\Models\Portfolio;
use App\Models\Certificate;

class HomeController extends Controller
{
    public function index()
    {
        $about = About_me::first();
        $portfolio = Portfolio::all();
        $certificates = Certificate::all();
        $contact = Contact::first();

        return view('home', compact('about', 'portfolio', 'certificates', 'contact'));
    }
}
    
