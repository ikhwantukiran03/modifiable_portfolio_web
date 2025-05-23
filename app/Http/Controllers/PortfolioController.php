<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;

class PortfolioController extends Controller{

    public function index()
    {
        $portfolio = Portfolio::latest()->paginate(10);
        return view('portfolio.index', compact('portfolios'));

    }

    public function create(){

        return view('portfolio.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|text',
            'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:2048',
        ]);

        $portfolio = new Portfolio();
        $portfolio->name = $request->name;
        $portfolio->description = $request->description;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $portfolio->file = file_get_contents($file->getRealPath());
            $portfolio->file_type = $file->getClientMimeType();
        }
        
        $portfolio->save();

        return redirect()->route('portfolio.index')->with('success', 'Portfolio created successfully');

        
        
    }

    public function show($id){

        $portfolio = Portfolio::findOrFail($id);
        return view('portfolio.show', compact('portfolio'));
    }

    public function edit($id){

        $portfolio = Portfolio::findOrFail($id);
        return view('portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|text',
            'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:2048',
        ]);

        $portfolio = Portfolio::findOrFail($id);
        $portfolio->name = $request->name;
        $portfolio->description = $request->description;

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $portfolio->file = file_get_contents($file->getRealPath());
            $portfolio->file_type = $file->getClientMimeType();
        }

        $portfolio->save();

        return redirect()->route('portfolio.index')->with('success', 'Portfolio updated successfully');

    }

    public function destroy($id){

        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();

        return redirect()->route('portfolio.index')->with('success', 'Portfolio deleted successfully');

    }
        
        
        
}
