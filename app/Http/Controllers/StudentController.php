<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    // public function index()
    // {
    //     return view('dashboard');
    // }


    public function GetAllStudents()
    {
        $students = Student::all();

        if ($students->isEmpty()) {
            return response()->json(["Result" => "No data found"], 404);
        } else {
            return response()->json($students, 200);
        }
    }

    public function AddData(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'department' => 'required|string|max:255',
            'section' => 'required|string|max:255',
        ]);

        $student = new Student;
        $student->name = $validated['name'];
        $student->email = $validated['email'];
        $student->department = $validated['department'];
        $student->section = $validated['section'];

        if ($student->save()) {
             return response()->json(["Result" => "Data Inserted Successfully"], 20001); // Created
        } else {
            return response()->json(["Result" => "Data Not Inserted"], 500); // Internal Server Error
        }
    }


    public function UpdateData(Request $request, $id)
    {
        $student = Student::find($id);

        if ($student) {
            $student->name = $request->name ?? $student->name;
            $student->email = $request->email ?? $student->email;
            $student->department = $request->department ?? $student->department;
            $student->section = $request->section ?? $student->section;

            if ($student->save()) {
                return response()->json(["Result" => "Data Updated Successfully"], 200); // Success
            } else {
                return response()->json(["Result" => "Data Not Updated"], 500); // Server error
            }
        } else {
            return response()->json(["Result" => "Student Not Found"], 404); // Not found
        }
    }

    public function updatepatch(Request $request, $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(["Result" => "Student Not Found"], 404); // Not found
        }

        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'department' => 'nullable|string|max:255',
            'section' => 'nullable|string|max:255',
        ]);

        // Update only provided fields
        foreach ($validatedData as $key => $value) {
            $student->$key = $value ?? $student->$key;
        }

        if ($student->save()) {
            return response()->json(["Result" => "Data Updated Successfully"], 200); // Success
        }

        return response()->json(["Result" => "Data Not Updated"], 500); // Server error
    }


    public function DeleteData($id)
    {
        $student = Student::find($id);
        if ($student) {
            if ($student->delete()) {
                return response()->json(["Result" => "Data Deleted Successfully"], 200); // Success
            } else {
                return response()->json(["Result" => "Data Not Deleted"], 500); // Server error
            }
        } else {
            return response()->json(["Result" => "Student Not Found"], 404); // Not found
        }
    }
}
