<?php

namespace App\Http\Controllers;

use App\Models\EmployeeModel;
use Exception;
use Illuminate\Http\Request;

class EmployeeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emp_data = EmployeeModel::all();
        return json_encode(array("res" => "success", "msg" => $emp_data));
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
        $validation = $request->validate([
            'name' => ['required', 'min:3'],
            'phone' => ['required', 'min:10', 'max:12'],
            'email' => ['required', 'email', 'min:3'],
            'mark' => ['required']
        ]);

        if (EmployeeModel::create($request->except('_token'))) {
            return json_encode(array("res" => "error", "msg" => "data is inserted"));
        } else {
            return json_encode(array("res" => "error", "msg" => "data is not inserted"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $emp_data = EmployeeModel::find($id);
        if ($emp_data == "") {
            return json_encode(array("res" => "error", "msg" => "No data"));
        } else {
            return json_encode(array("res" => "success", "msg" => $emp_data));
        }
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
        $validation = $request->validate([
            'name' => ['required', 'min:3'],
            'phone' => ['required', 'min:10', 'max:12'],
            'email' => ['required', 'email', 'min:3'],
            'mark' => ['required']
        ]);

        $emp = EmployeeModel::find($id);
        if ($emp->update($request->all())) {
            return json_encode(["res" => "success", "msg" => "updated"]);
        } else {
            return json_encode(["res" => "success", "msg" => "not updated"]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $emp_del = EmployeeModel::find($id)->delete();
        if ($emp_del) {
            return json_encode(["res" => "success", "msg" => "record deleted"]);
        } else {
            return json_encode(["res" => "success", "msg" => "record not delete"]);
        }
    }
}
