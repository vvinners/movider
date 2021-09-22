<?php

namespace VVinners\Movider;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Carbon\Carbon;

class MoviderController extends Controller
{
    public function totalUsage()
    {
        $model = MoviderLog::count();

        return response()->json($model, 200);
    }

    public function receiver($to)
    {
        $model = MoviderLog::where('to', 'like', "%{$to}%")
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json($model, 200);
    }

    // 2021:09:23-2021:09:30
    // Y:m:d-Y:m:d
    public function filter($dateRange)
    {
        $dates = explode('-', $dateRange);
        $from = Carbon::createFromFormat('Y:m:d', $dates[0]);
        $to = Carbon::createFromFormat('Y:m:d', $dates[1]);

        $model = MoviderLog::whereBetween('created_at', [
            $from->startOfDay()->toDateString(),
            $to->endOfDay()->toDateString()
        ])->get();

        return response()->json($model, 200);
    }

    // 2021:09:23-2021:09:30
    // Y:m:d-Y:m:d
    public function usage($dateRange)
    {
        $dates = explode('-', $dateRange);
        $from = Carbon::createFromFormat('Y:m:d', $dates[0]);
        $to = Carbon::createFromFormat('Y:m:d', $dates[1]);

        $model = MoviderLog::whereBetween('created_at', [
            $from->startOfDay()->toDateString(),
            $to->endOfDay()->toDateString()
        ])->count();

        return response()->json($model, 200);
    }
}
