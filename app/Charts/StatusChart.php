<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use App\Models\Ticket;

class StatusChart extends BaseChart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        $open = Ticket::where('status_id', '=', '1')->get()->count();
        $progress = Ticket::where('status_id', '=', '2')->get()->count();
        $resolved = Ticket::where('status_id', '=', '3')->get()->count();
        $closed = Ticket::where('status_id', '=', '4')->get()->count();
        return Chartisan::build()
            ->labels(['Ticket by Status'])
            ->dataset('Open', [$open])
            ->dataset('In Progress', [$progress])
            ->dataset('Resolved', [$resolved])
            ->dataset('Closed', [$closed]);
    }
}