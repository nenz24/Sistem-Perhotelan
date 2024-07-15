<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\MonthlyPresence;
use Carbon\Carbon;

class PresenceController extends Controller
{
    public function showPresenceForm()
    {
        $workers = Worker::all();
        return view('presence.form', compact('workers'));
    }

    public function recordPresence(Request $request)
    {
        $today = $request->input('date');
        if (!$today){
            $today = Carbon::today()->toDateString();
        }
        $month = Carbon::today()->month;

        foreach ($request->input('workers') as $workerData) {
            $workerId = $workerData['id_worker'];
            $statusPres = isset($workerData['status_pres']) ? true : false;
            MonthlyPresence::create([
                'id_worker' => $workerId,
                'date' => $today,
                'no_month' => $month,
                'status_pres' => $statusPres,
            ]);
        }

        return redirect()->route('presence.form')->with('success', 'Presence recorded successfully.');
    }
}
