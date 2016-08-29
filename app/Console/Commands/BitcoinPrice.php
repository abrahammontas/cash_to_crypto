<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Inspiring;

class BitcoinPrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'BitcoinPrice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update bitcoin price from CoinDesk';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $result = file_get_contents('https://api.gemini.com/v1/pubticker/btcusd', true);

        if ($result) {

            $result = json_decode($result);
            $price = $result->last;
            $ourprice = $price * 1.065;

            \App\Settings::setParam('bitcoinPrice', $price);
            \App\Settings::setParam('ourprice', $ourprice);

        }
        
    }
}
