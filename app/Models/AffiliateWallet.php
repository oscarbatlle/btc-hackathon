<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AffiliateWallet extends Model
{
    protected $table = "affiliate_wallets";

    protected $fillable = [
        'affiliate_id',
        'hash'
    ];

    /**
     * Get Affiliate
     *
     */
    public function affiliate()
    {
        return $this->belongsTo('App\Models\Affiliate');
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
        $address = new Address();
        $transaction = Transaction::send();
        $transaction->setToBitcoinAddress($address->getAddress());
        $transaction->setAmount(new Money(0.01, CurrencyCode::BTC));
        $transaction->setDescription('For being awesome!');

        $this->client->createAccountTransaction($primaryAccount, $transaction);

        // TODO:: Save transaction

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
