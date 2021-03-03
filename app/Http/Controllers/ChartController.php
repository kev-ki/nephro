<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function piechart_first()
    {
        $user = Patient::all();
        $users = count($user);
        $cinq = Patient::where('age', '<', 5)
            ->get();

        $cinq_pourcentage = (count($cinq)*0.1)/$users;

        $huit = Patient::where('age','>=',5)
            ->where('age','<=',18)
            ->get();

        $huit_pourcentage = (count($huit)*0.1)/$users;

        $sup_huit = Patient::where('age', '>', 18)
            ->get();

        $sup_huit_pourcentage = (count($sup_huit)*0.1)/$users;

        return view('graphe.chart', compact('cinq_pourcentage', 'huit_pourcentage', 'sup_huit_pourcentage'));
    }

    public function piechart_second()
    {

    }

    public function barchart($req)
    {
        $users = Patient::select(DB::raw("count(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');

        $months = Patient::select(DB::raw("Month(created_at) as month"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('month');

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($months as $key => $value)
        {
            $datas[$value] = $users[$key];
        }

        return view('medecin.statindex', compact('datas'));
    }
}
