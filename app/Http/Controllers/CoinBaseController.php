<?php

namespace App\Http\Controllers;

use Coinbase\Wallet\Client;
use Illuminate\Http\Request;
use Coinbase\Wallet\Value\Money;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Account;
use Coinbase\Wallet\Resource\Address;
use Coinbase\Wallet\Enum\CurrencyCode;
use Coinbase\Wallet\Resource\Transaction;

class CoinBaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->configuration = Configuration::apiKey(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
        $this->client = Client::create($this->configuration);
    }
    

    
}
