<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Ticket;

class TypeChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $bugs = Ticket::where('type_id', '=', '1')->get()->count();
        $features = Ticket::where('type_id', '=', '2')->get()->count();
        $data = Ticket::where('type_id', '=', '3')->get()->count();
        $frontend = Ticket::where('type_id', '=', '4')->get()->count();
        $others = Ticket::where('type_id', '=', '4')->get()->count();
        return Chartisan::build()
            ->labels(['Ticket by Type'])
            ->dataset('Bugs', [$bugs])
            ->dataset('Features', [$features])
            ->dataset('Data Changes', [$data])
            ->dataset('Frontend Changes', [$frontend])
            ->dataset('Others', [$others]);
    }
}