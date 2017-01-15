<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Curl;
use View;
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
    public function sendTransaction(Request $request,$affiliate_id,$campaign_id)
    {
        // $configuration = Configuration::apiKey(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
        // $client = Client::create($configuration);
        // $btc_current = $this->grab_currency_value('USD');

        // $amount = '0.10';//Hardcoded for now.

        // $account = $client->getPrimaryAccount();
        // $user = Auth::user();

        // $enduser = EndUserWallet::where('user_id', $user->id)->first();

        // $transaction = CTransaction::send([
        //     'toBitcoinAddress' => $enduser['hash'],
        //     'amount'           =>  new Money($amount, CurrencyCode::USD),
        //     'description'      => 'Reward message',
        //     'fee'              => '0.0001' // only required for transactions under BTC0.0001
        // ]);

        // $client->createAccountTransaction($account, $transaction);

        // Transaction::create([
        //     'user_id'     => $user->id,
        //     'campaign_id' => $campaign_id,
        //     'type'        => 'cpc',
        //     'wallet'      => $enduser['hash'],
        //     'amount'      => $amount,
        //     'amount_btc'      => $amount/$btc_current['last']

        // ]);
        if($request->input('thankyou')){
            return redirect('/thanks/'.$affiliate_id.'/'.$campaign_id);
        }else{
            return redirect('/dash');
    
        }
        
       // return response()->json(['status', 'success', 'transaction' => $transaction], 200);
    }

    /**
     * Get current balance
     *
     */
    public function getBalance()
    {
        $configuration = Configuration::apiKey(env('COINBASE_API_KEY'), env('COINBASE_API_SECRET'));
        $client = Client::create($configuration);

        $primaryAccount = $client->getPrimaryAccount();   
        dd($primaryAccount);
             
        $client->refreshAccount($primaryAccount);

        $balance = $primaryAccount->getBalance();

        return response()->json(['status' => 'success', 'balance' => $balance], 200);
    }

    public static function grab_currency_value($currency = null) {
      $response = Curl::to('https://blockchain.info/ticker')->get();
      $response = json_decode($response, true);
      if($currency != null && isset($response[$currency])){
        return $response[$currency];
      }
      return $response;
    }

}
