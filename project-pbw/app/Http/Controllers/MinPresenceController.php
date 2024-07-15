<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Worker;
use App\Models\MinPresence;
use Carbon\Carbon;

class MinPresenceController extends Controller
{
    public function showMinPresenceForm()
    {
        $workers = Worker::all();
        return view('minPresence.form', compact('workers'));
    }

    public function recordMinPresence(Request $request)
    {
        $month = Carbon::now()->month;

        foreach ($request->input('workers') as $workerId => $minPres) {
            MinPresence::updateOrCreate(
                ['id_worker' => $workerId, 'no_month' => $month],
                ['min_pres' => $minPres]
            );
        }

        return redirect()->route('minPresence.form')->with('success', 'Minimum presence recorded successfully.');
    }
}
