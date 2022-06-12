<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use Illuminate\Http\Request;
use Session;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $employees = Employee::orderBy('id', 'DESC')->get();
        return view('sysadmin.employee.index', compact('employees'));
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
        $validasi = Validator::make($request->all(), [
            'nomor' => 'required',
            'nama' => 'required',
            'address' => 'required',
            'birthdate' => 'required',
            'join' => 'required'
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $lahir = date('Y-m-d', strtotime($request->birthdate));
        $join = date('Y-m-d', strtotime($request->join));

        $mData = Employee::create(array_merge($request->all(), [
            'nip' => $request->nomor,
            'nama_employee' => $request->nama,
            'address' => $request->address,
            'birthdate' => $lahir,
            'join_date' => $join,
            'status' => 'AKTIF'
        ]));

        if ($mData) {
            return redirect()->route('employee.index')
            ->withSuccess(__('Data Pegawai Berhasil ditambahkan.'));
        } else {
            return redirect()->route('employee.index')
            ->withSuccess(__('Data Pegawai gagal ditambahkan.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employeeId = Employee::find($id);

        return view('sysadmin.employee.edit', compact('employeeId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi = Validator::make($request->all(), [
            'nomor' => 'required',
            'nama' => 'required',
            'address' => 'required',
            'birthdate' => 'required',
            'join' => 'required',
            'status' => 'required'
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $lahir = date('Y-m-d', strtotime($request->birthdate));
        $join = date('Y-m-d', strtotime($request->join));

        $mData = Employee::where('id', $id)->update(array_merge([
            'nip' => $request->nomor,
            'nama_employee' => $request->nama,
            'address' => $request->address,
            'birthdate' => $lahir,
            'join_date' => $join,
            'status' => $request->status
        ]));

        if ($mData) {
            return redirect()->route('employee.index')
            ->withSuccess(__('Data Pegawai Berhasil diubah.'));
        } else {
            return redirect()->route('employee.index')
            ->withSuccess(__('Data Pegawai gagal diubah.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $employee = Employee::find($id);
        $delete = $employee->delete();

        if($delete) {
            return redirect()->route('employee.index')
            ->withSuccess(__('Data Pegawai berhasil dihapus.'));
        }
    }
}
