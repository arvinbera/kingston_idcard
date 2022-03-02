<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentImport;
use App\Core\FileHelper;
use Illuminate\Support\Facades\DB;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function search()
    {
        $search = $_GET["search"];
        $search_result = Student::where('student_name', 'like', '%' . $search . '%')->orWhere('college_id', 'like', '%' . $search . '%')->get();
        return view('search_result', array("students" => $search_result));
    }

    public function idcard_details()
    {
        $college_id = $_GET["college_id"];
        $row = Student::where('college_id', $college_id)->first();
        return view('idcard_details', array("student" => $row));
    }

    public function idcard_info_edit($id)
    {
        $student = Student::find($id);

        return view('idcard_info_edit')->with('student', $student);
    }

    public function idcard_info_update(Request $request)
    {
        $row = Student::where('id', $request->id)->first();

        if ($row) {
            $row->student_name = $request->student_name;
            $row->student_session = $request->student_session;
            $row->student_blood_group = $request->student_blood_group;
            $row->student_mobile = $request->student_mobile;
            $row->save();
            return redirect('idcard_info_edit/' . $request->id)
                ->with('success', 'Record updated successfully...');
        } else {
            return redirect('idcard_info_edit/' . $request->id)
                ->with('error', 'Something went wrong!');
        }
    }

    // public function photo_upload(Request $request)
    // {
    //     $college_id = $request->college_id;
    //     $student_photo = null;
    //     $row = Student::where("college_id", $college_id)->first();

    //     if ($request->hasFile("file")) {
    //         FileHelper::DeleteFile($row->student_photo);
    //         $student_photo = FileHelper::DoUpload($request->file);
    //     }

    //     $row->student_photo = $student_photo;
    //     Student::where("college_id", $college_id)->update($row->toArray());
    //     return back();
    // }

    public function idcard_photo_upload(Request $request)
    {
        $college_id = $request->college_id;
        $row = Student::where("college_id", $college_id)->first();

        if ($request->hasFile("student_photo")) {
            FileHelper::DeleteFile($row->student_photo);
            $student_photo = FileHelper::DoUpload($request->student_photo);
            $row->student_photo = $student_photo;
        }

        $res = array(
            "isSucess" => true,
            "data" => $row,
            "message" => "Got no error...",
        );
        Student::where("college_id", $row->college_id)->update($row->toArray());
        return json_encode($res);
    }

    public function idcard_status_update(Request $request)
    {
        $college_id = $request->college_id;
        $row = Student::where("college_id", $college_id)->first();

        if ($row) {
            $row->idcard_status = $request->idcard_status;
            $row->save();
        }

        return true;
    }

    public function add_student_single(Request $request)
    {
        $data = new Student();
        $data->college_name = $request->college_name;
        $data->college_id = $request->college_id;
        $data->student_name = $request->student_name;
        $data->student_session = $request->student_session;
        $data->student_blood_group = $request->student_blood_group;
        $data->student_mobile = $request->student_mobile;
        $data->idcard_status = 0;
        $student = Student::where('college_id', $request->college_id)->first();
        if ($student) {
            return redirect('upload_single')
                ->with('error', 'Student with this College ID already exists!');
        } else {
            $data->save();
            return redirect('upload_single')
                ->with('success', 'Record added successfully...');
        }
    }

    public function add_student_bulk(Request $request)
    {
        Excel::import(new StudentImport, $request->file);
        return redirect('upload_bulk')
            ->with('success_message', "Records added successfully...");
    }
}
