<?php

namespace App\Console\Commands;

use App\Models\Divisa;
use GuzzleHttp\Promise\Promise;
use Illuminate\Console\Command;
use Illuminate\Support\Sleep;

class scraping extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:scraping';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Updated prices the USD';

    /**
     * Execute the console command.
     */

    public function handle()
    {

        ///fetch a url extern
        $client = new \GuzzleHttp\Client();
        $response = $client->get('http://0.0.0.0:3000/traer/usd');
        $number = $response->getBody();
        echo  $number;
        $cop = Divisa::where('name', "COP")->first();
        $cop->tasa = $number;
        $cop->save();

        

    }
}
