<?php

namespace App\Console\Commands;

use App\Models\Divisa;
use Goutte\Client;
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
        $client = new Client;
        $url = 'https://www.xe.com/es/currencyconverter/convert/?Amount=1&From=USD&To=COP';

        $crawler = $client->request('GET', $url);

        
       $sleep =  Sleep::sleep(30);
        

        $secondColumnValue = $crawler->filter('.currency-conversion-tables__ConverterTable-sc-3fg8ob-5.kwmBWW tbody tr:first-child td:nth-child(2)')->text();
        $numericString = preg_replace("/[^0-9,.]/", "", $secondColumnValue);
        $fecha = $crawler->filter('.result__FlippingContainer-sc-1bsijpp-5')->text();
        $numericString = str_replace(",", ".", $numericString);

        $test = $crawler->filter('.result__BigRate-sc-1bsijpp-1')->text();
        echo $test . "testing de la promesa";

        $number = floatval($numericString);
        $cop = Divisa::where('name', "COP")->first();
        $cop->tasa = $number;
        $cop->save();

        

    }
}
