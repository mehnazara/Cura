<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    public function show($id)
    {
        $nurse = Nurse::findOrFail($id);
        return view('nurses.show', ['nurse' => $nurse]);
    }


    public function create()
    {
        Nurse::create([
            'name' => 'Nurse Name',
            'qualification' => 'Registered Nurse',
            'description' => 'Experienced in elderly care.',
            // Add other fields as needed
        ]);

        return 'Nurse created successfully!';
    }

    public function index()
    {
        $nurses = Nurse::all();
        return view('/nurses/index', ['nurses' => $nurses]);
    }
}