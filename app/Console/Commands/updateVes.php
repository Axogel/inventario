<?php

namespace App\Console\Commands;

use App\Models\Divisa;
use Goutte\Client;
use Illuminate\Console\Command;

class updateVes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-ves';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        echo "/";

        $client = new \GuzzleHttp\Client();
        $response = $client->get('http://localhost:3000/traer/bs');
        $number = $response->getBody();
        echo  $number;
        $bs = Divisa::where('name', "Bs")->first();
        $bs->tasa = $number;
        $bs->save();
    }
}
