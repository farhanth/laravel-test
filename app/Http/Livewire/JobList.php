<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use App\Support\Collection;

class JobList extends Component
{
    public function render()
    {
    	$response = Http::get('https://jobs.github.com/positions.json')->body();
        $responseBody = json_decode($response);

        return view('livewire.job-list', [
        	'responseBody' =>  collect($responseBody)->paginate(9)
        ]);
    }
}
