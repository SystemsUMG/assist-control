<?php

namespace App\Http\Controllers;

use App\Models\StudentAssignment;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function student(Request $request)
    {
        $data = [];
        try {
            $student = StudentAssignment::where('user_id', $request->student_id)->get();
            $student->each(function ($studentAssignment) use (&$data) {
                $studentAssignment->assistances->each(function ($assignment) use ($studentAssignment, &$count, &$data) {
                    $data[$assignment->created_at->format('d-m-Y')] = isset($data[$assignment->created_at->format('d-m-Y')]) ? $data[$assignment->created_at->format('d-m-Y')] + 1 : 1;
                });
            });
        } catch (\Exception $e) {
            $data = $e->getMessage();
        } finally {
            return response()->json($data, 200);
        }
    }
}
