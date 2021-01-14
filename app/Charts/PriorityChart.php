<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Ticket;

class PriorityChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $none = Ticket::where('priority_id', '=', '1')->get()->count();
        $low = Ticket::where('priority_id', '=', '2')->get()->count();
        $medium = Ticket::where('priority_id', '=', '3')->get()->count();
        $high = Ticket::where('priority_id', '=', '4')->get()->count();
        return Chartisan::build()
            ->labels(['Ticket by Priority'])
            ->dataset('None', [$none])
            ->dataset('Low', [$low])
            ->dataset('Medium', [$medium])
            ->dataset('High', [$high]);
    }
}