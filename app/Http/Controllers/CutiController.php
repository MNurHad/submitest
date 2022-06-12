<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;
use App\Models\Cuti;
use Illuminate\Http\Request;
use Session;
use DB;

class CutiController extends Controller
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
        $cutis = Cuti::from('cutis AS cuti')
                 ->select('cuti.id', 'emp.nip', 'emp.nama_employee AS nama', 'cuti.date_cuti AS tglCuti',
                 'cuti.cuti_long AS lamaCuti', 'cuti.note')
                 ->join('employees AS emp', 'emp.id', '=', 'cuti.employeeId')
                 ->orderByDesc('cuti.id')
                 ->get();
        
        $employee = Employee::orderBy('id', 'DESC')->get();

        return view('sysadmin.cuti.index', compact('cutis', 'employee'));
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
            'tglCuti' => 'required',
            'lama' => 'required',
            'note' => 'required'
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $date = date('Y-m-d', strtotime($request->tglCuti));

        $mData = Cuti::create(array_merge($request->all(), [
            'employeeId' => $request->nomor,
            'date_cuti' => $date,
            'cuti_long' => $request->lama,
            'note' => $request->note
        ]));

        if ($mData) {
            return redirect()->route('cuti.index')
            ->withSuccess(__('Data Cuti Pegawai Berhasil ditambahkan.'));
        } else {
            return redirect()->route('cuti.index')
            ->withSuccess(__('Data Cuti Pegawai gagal ditambahkan.'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function show(Cuti $cuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cutiId = Cuti::find($id);
        $employee = Employee::orderBy('id', 'DESC')->get();

        return view('sysadmin.cuti.edit', compact('cutiId', 'employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validasi = Validator::make($request->all(), [
            'nomor' => 'required',
            'tglCuti' => 'required',
            'lama' => 'required',
            'note' => 'required'
        ]);

        if ($validasi->fails()) {
            $val = $validasi->errors()->all();
            return $this->error($val[0]);
        }

        $date = date('Y-m-d', strtotime($request->tglCuti));

        $mData = Cuti::where('id', $id)->update(array_merge([
            'employeeId' => $request->nomor,
            'date_cuti' => $date,
            'cuti_long' => $request->lama,
            'note' => $request->note
        ]));

        if ($mData) {
            return redirect()->route('cuti.index')
            ->withSuccess(__('Data Cuti Pegawai Berhasil diperbarui.'));
        } else {
            return redirect()->route('cuti.index')
            ->withSuccess(__('Data Cuti Pegawai gagal diperbarui.'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cuti  $cuti
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cuti = Cuti::find($id);
        $delete = $cuti->delete();

        if($delete) {
            return redirect()->route('cuti.index')
            ->withSuccess(__('Data Pegawai berhasil dihapus.'));
        }
    }

    // controller baru
    public function employeeMember() {
        $members = Employee::orderBy('id', 'ASC')->limit('3')->get();

        return view('sysadmin.cuti.member', compact('members'));
    }

    public function cutiAktif() {
        $aktifs = DB::table('cutis AS cuti')
                  ->select('emp.nip', 'emp.nama_employee AS nama', 'cuti.date_cuti AS tglCuti', 'cuti.note')
                  ->join('employees AS emp', 'cuti.employeeId', '=', 'emp.id')
                  ->groupBy('emp.nip')
                  ->get();

        return view('sysadmin.cuti.aktif', compact('aktifs'));
    }

    public function cutiLebih() {
        $lebihs = DB::table('cutis AS cuti')
                ->select('emp.nip', 'emp.nama_employee AS nama', 'cuti.date_cuti AS tglCuti', 'cuti.note',
                DB::raw('COUNT(cuti.id) as countCuti'))
                ->join('employees AS emp', 'cuti.employeeId', '=', 'emp.id')
                ->having('countCuti', '>', 1)
                ->groupBy('emp.nip')
                ->get();

        return view('sysadmin.cuti.lebih', compact('lebihs'));
    }

    public function cutiSisa() {
        $sisas = DB::table('cutis AS cuti')
                    ->select('emp.nip', 'emp.nama_employee AS nama',
                    DB::raw('12 - COUNT(cuti.id) as sisaCuti'))
                    ->join('employees AS emp', 'cuti.employeeId', '=', 'emp.id')
                    ->groupBy('emp.nip')
                    ->get();
                    
        return view('sysadmin.cuti.sisa', compact('sisas'));
    }
}
