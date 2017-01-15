<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\EndUserWallet;
use App\Models\Transaction;
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Value\Money;
use Coinbase\Wallet\Configuration;
use Coinbase\Wallet\Resource\Account;
use Coinbase\Wallet\Resource\Address;
use Coinbase\Wallet\Enum\CurrencyCode;
use Coinbase\Wallet\Resource\Transaction as CTransaction;

class CoinBaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Create coinbase wallet
     *
     */
    public function createWallet($name)
    {
        // Create new wallet
        $account = new Account();
        $this->client->createAccount($account);       
        $account->setName($name);

        return response()->json(['status' => 'success'], 200);
    }

    /**
     * Get Coinbase wallet
     *
     */
    public function getWallet()
    {

    }

    /**
     * Send Money
     * Pay customers from primary account
     */
    public function sendTransaction()
    {
        $configuration = Configuration::apiKey(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
        $client = Client::create($configuration);

        $amount = '0.01';

        $account = $client->getPrimaryAccount();
        $enduser = EndUserWallet::where('user_id', 7)->first();

        $transaction = CTransaction::send([
            'toBitcoinAddress' => $enduser['hash'],
            'amount'           =>  new Money($amount, CurrencyCode::USD),
            'description'      => 'Your first bitcoin!',
            'fee'              => '0.0001' // only required for transactions under BTC0.0001
        ]);

        $client->createAccountTransaction($account, $transaction);

        Transaction::create([
            'user_id'     => 7,
            'campaign_id' => 1,
            'type'        => 'cpc',
            'wallet'      => $enduser['hash'],
            'amount'      => $$amount
        ]);

        return response()->json(['status', 'success', 'transaction' => $transaction], 200);
    }

    /**
     * Get current balance
     *
     */
    public function getBalance()
    {
        $this->client->refreshAccount($primaryAccount);

        $balance = $primaryAccount->getBalance();

        return response()->json(['status' => 'success', 'balance' => $balance], 200);
    }

}
