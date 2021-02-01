<?php

namespace App\Http\Livewire;

use Livewire\Component;
use GuzzleHttp\Client;
// use Illuminate\Support\Facades\Http;

class JobDetail extends Component
{
	public JobDetail $job_id;

    public function render($job_id)
    {
    	$client = new Client();
        $url = "https://jobs.github.com/positions/$job_id.json";

        $response = $client->request('GET', $url, [
            'verify'  => false,
        ]);

        $responseBody = json_decode($response->getBody());

        return view('livewire.job-detail', compact('responseBody'))->layout('layouts.main');
    }
}
