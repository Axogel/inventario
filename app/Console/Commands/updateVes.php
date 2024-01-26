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
        $client = new Client;
        $url = 'https://www.xe.com/es/currencyconverter/convert/?Amount=1&From=USD&To=VES';

        $crawler = $client->request('GET', $url);

        $secondColumnValue = $crawler->filter('.currency-conversion-tables__ConverterTable-sc-3fg8ob-5.kwmBWW tbody tr:first-child td:nth-child(2)')->text();
        $numericString = preg_replace("/[^0-9,.]/", "", $secondColumnValue);

        $numericString = str_replace(",", ".", $numericString);

        $number = floatval($numericString);
        $bs = Divisa::where('name', "Bs")->first();
        $bs->tasa = $number;
        $bs->save();


    }
}
