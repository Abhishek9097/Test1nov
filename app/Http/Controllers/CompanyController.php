<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CompanyList = Company::all();
        return view('company.index', compact('CompanyList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'logo' => 'required',
            'website' => 'required',
        ]);
        
        if($request->hasFile('logo'))
        {
            $file = $request->file('logo');
            $filename = 'logo'.time().'.'.$request->logo->getClientOriginalExtension();
            $destination = storage_path('app/public');
            $request->logo->move($destination , $filename);
            $path = $filename;
            $file_image = $path;
        }
        else{
            $file_image = "";
        }

        $company = new Company();

        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $file_image;
        $company->website = $request->website;

        $company->save();

        return back()->with('success','Company add success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Company = Company::findOrFail($id);
        return view('company.edit', compact('Company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $company = Company::find($request->id);
        
        if($request->hasFile('logo'))
        {
            $file = $request->file('logo');
            $filename = 'logo'.time().'.'.$request->logo->getClientOriginalExtension();
            $destination = storage_path('app/public');
            $request->logo->move($destination , $filename);
            $path = $filename;
            $file_image = $path;
        }
        else{
            $file_image = $request->logo;
        }

        $company->name = $request->name;
        $company->email = $request->email;
        $company->logo = $file_image;
        $company->website = $request->website;

        $company->save();

        return redirect()->route('company.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Company = Company::find($id);
        $Company->delete();

        // redirect
        return back();
    }
}
