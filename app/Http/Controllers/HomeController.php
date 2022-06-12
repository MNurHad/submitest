<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Cuti;
use Illuminate\Http\Request;
use Session;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $empAktif   = Employee::where('status', 'AKTIF')->get();
        $empDeaktif = Employee::where('status', '!=', 'AKTIF')->get();
        $cuti       = Cuti::orderByDesc('id')->get();


        return view('sysadmin.index', compact(
            'empAktif',
            'empDeaktif',
            'cuti'
        ));
    }
}
