<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Employee;

class TestController extends Controller
{

    public function index()
    {
        // $emp = Employee::with('month')->all();
        $emp = array(
            "01" => array('Name' => "Alim"),
            "02" => array('Name' => "Rubel"),
        );

        foreach($emp as $emps){
            echo $emps['Name'];
        }

        // return $emp;
    }
}
