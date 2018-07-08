<?php
namespace App\Http\Controllers;
use Akaunting\Money\Money;
use App\Charts\DashboardChart;
use App\Pengajuan;
use App\Profile;
use ConsoleTVs\Charts;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $users = Pengajuan::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))
//            ->get();
//
//        $data['chart'] = Charts::database($users, 'bar', 'highcharts')
//            ->title("Monthly new Register Users")
//            ->elementLabel("Total Users")
//            ->dimensions(1000, 500)
//            ->responsive(true)
//            ->groupByMonth(date('Y'), true);
//        $data['chart'] = new DashboardChart();
//        $data['chart']->dataset('Sample', 'bar', [100, 65, 84, 45, 90]);
        $data['jumlah_dosen'] = Profile::count();
        $data['jumlah_pengajuan'] = Pengajuan::count();
        $data['didanai'] = Pengajuan::where('persetujuan_id',1)->count();
        $total = Pengajuan::where('persetujuan_id',1)->sum('total_dana');
        $data['total_dana'] = number_format($total,0, ',' , '.');


        return view('admin.dashboard.index', $data);
    }
}