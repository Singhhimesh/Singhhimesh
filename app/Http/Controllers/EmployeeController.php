<?php

namespace App\Http\Controllers;

use App\Models\EmployeeModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = EmployeeModel::paginate(4);
        return view('home.home',compact("employees"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("home.create");
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
            'email' => ['required', 'min:10','unique:employee'],
            'name' => ['required', 'min:5'],
            'phone' => ['required', 'min:10', 'max:11'],
            'salary' => ['required'],
            'address' => ['required']
        ]);

        $emp = new EmployeeModel;
        $emp->name = $request->name;
        $emp->address  = $request->address;
        $emp->phone = $request->phone;
        $emp->salary = $request->salary;
        $emp->email = $request->email;

        $emp->save();

        return Redirect()->back()->with('status','Employee record has been added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = EmployeeModel::find($id);
        return view('home.edit',array("employee"=>$employees));
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
        EmployeeModel::find($id)->update($request -> except('_tokten'));
        return redirect(route('home.index'))->with('status','Record has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EmployeeModel::where(['id' => $id])->delete();
        return redirect(route('home.index'))->with("status", "Record delete successfully");
    }
}
