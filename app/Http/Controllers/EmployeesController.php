<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employees;
use App\Models\Company;

class EmployeesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $EmployeesList = Employees::all();
        return view('employees.index', compact('EmployeesList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = Company::get();
        return view('employees.create',compact('company'));
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
            'firstName' => 'required|max:255',
            'lastName' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            
        ]);
        
        $Employees = new Employees();

        $Employees->firstName = $request->firstName;
        $Employees->lastName = $request->lastName;
        $Employees->company_id = $request->company_id;
        $Employees->email = $request->email;
        $Employees->phone = $request->phone;


        $Employees->save();

        return back()->with('success','Employees add success');
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
        $employees = Employees::findOrFail($id);
        $company = Company::get();

        return view('Employees.edit', compact('employees','company'));
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
        $Employees = Employees::find($request->id);
        $Employees->firstName = $request->firstName;
        $Employees->lastName = $request->lastName;
        $Employees->company_id = $request->company_id;
        $Employees->email = $request->email;
        $Employees->phone = $request->phone;
        $Employees->save();

        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Employees = Employees::find($id);
        $Employees->delete();

        // redirect
        return back();
    }
}
