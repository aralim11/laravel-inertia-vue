<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $datas = Company::all();

        return Inertia::render('Company/Index', compact('datas'));
    }

    public function create()
    {
        return Inertia::render('Company/AddForm');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|unique:companies|max:255',
            'slogan' => 'required|string|max:255',
            'std' => 'required|date',
        ]);

        if (!$validator->fails()) {
            $query = Company::create([
                'company_name' => $request->company_name,
                'slogan' => $request->slogan,
                'std' => $request->std,
            ]);

            if ($query) {
                return redirect()->route('company.create')->with('success', 'Company Create Successfully!!');
            } else {
                return redirect()->route('company.create')->with('error', 'Company Not Created!!');
            }
        } else {
            return redirect()->route('company.create')->withErrors($validator);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $company = Company::find($id);

        return Inertia::render('Company/EditForm', compact('company'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'company_name' => 'required|string|max:255|unique:companies,company_name,' . $id,
            'slogan' => 'required|string|max:255',
            'std' => 'required|date',
        ]);

        if (!$validator->fails()) {
            $query = Company::where('id', $id)
                        ->update(['company_name' => $request->company_name, 'slogan' => $request->slogan, 'std' => $request->std]);

            if ($query) {
                return redirect()->route('company.edit', $id)->with('success', 'Company Update Successfully!!');
            } else {
                return redirect()->route('company.edit', $id)->with('error', 'Company Not updated!!');
            }
        } else {
            return redirect()->route('company.edit', $id)->withErrors($validator);
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $query = Company::where('id', $id)->delete();

            if ($query) {
                return redirect()->route('company.index')->with('success', 'Company Delete Successfully!!');
            }
        }
    }
}
