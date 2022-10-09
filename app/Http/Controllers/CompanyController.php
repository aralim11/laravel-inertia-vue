<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        return Inertia::render('Company/Index');
    }

    public function create()
    {
        return Inertia::render('Company/AddForm');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_name' => 'required|string|unique:companies|max:255',
            'slogan' => 'required|string|max:255',
            'std' => 'required|date',
        ]);

        if ($validated) {
            Company::create([
                'company_name' => $request->company_name,
                'slogan' => $request->slogan,
                'std' => $request->std,
            ]);

            return redirect()->route('company.create')->with('success', 'Company Create Successfully!!');
        } else {
            return redirect()->route('company.create')->with('error', 'Company Not Created!!');
        }
    }

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
