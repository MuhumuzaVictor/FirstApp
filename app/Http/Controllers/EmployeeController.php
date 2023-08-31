<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

// employee model

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $emps = Employee::all();
        return View('empmodel')->with('emps', $emps);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
        'fname' => 'required',
        'lname' => 'required',
        'address' => 'required',
        'mobile' => 'required',
       ]);

       $emps = new Employee;

       $emps->fname = $request->input('fname');
       $emps->lname = $request->input('lname');
       $emps->address = $request->input('address');
       $emps->mobile = $request->input('mobile');

       $emps->save();

       return redirect('/employee')->with('success','Data saved');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'mobile' => 'required',
           ]);

           $emps = Employee::find($id);

           $emps->fname = $request->input('fname');
           $emps->lname = $request->input('lname');
           $emps->address = $request->input('address');
           $emps->mobile = $request->input('mobile');

           $emps->save();

           return redirect('/employee')->with('success','Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $emps = Employee::find($id);
        $emps->delete();

        return redirect('/employee')->with('success','Data deleted Successfully');

    }
}
