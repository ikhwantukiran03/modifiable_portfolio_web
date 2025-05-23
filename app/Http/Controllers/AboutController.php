<?php

namespace App\Http\Controllers;

use App\Models\About_me;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $about = About_me::first();
        return view('about', compact('about'));
    }

    public function create()
    {
        return view('about.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'description' => 'required|text',
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
        );

        $about = new About_me();
        $about->name = $request->name;
        $about->description = $request->description;

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $about->profile_image = file_get_contents($image->getRealPath());
            $about->profile_image_type = $image->getClientMimeType();
        }
        $about->save();

        return redirect()->route('about.index')->with('success', 'About me created successfully');

    }

    public function edit($id)
    {
        $about= About_me::findOrFail($id);
        return view('about.edit', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'description' => 'required|text',
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]
            );

            $about = About_me::findOrFail($id);
            $about->name = $request->name;
            $about->description = $request->description;

            if ($request->hasFile('profile_image')) {
                $image = $request->file('profile_image');
                $about->profile_image = file_get_contents($image->getRealPath());
                $about->profile_image_type = $image->getClientMimeType();
            }

            $about->save();

            return redirect()->route('about.index')->with('success','About me updated successfully');


    }

    public function show($id)
    {
        $about = About_me::findOrFail($id);
        return view('about.show', compact('about'));
    }
    
    
}
