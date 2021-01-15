<?php

namespace App\Http\Controllers\Helpers;

use http\Env\Response;
use Omnipay\Omnipay;

/**
 * Class PayPalHelper
 * @package Contest
 */
class PayPalHelper
{
    /**
     * @return mixed
     */
    public function gateway()
    {
        $gateway = Omnipay::create('PayPal_Express');

        $gateway->setUsername(config('contest.paypal.username'));
        $gateway->setPassword(config('contest.paypal.password'));
        $gateway->setSignature(config('contest.paypal.signature'));
//        $gateway->setClientId(config('contest.paypal.clientid'));
//        $gateway->setSecret(config('contest.paypal.secret'));
        $gateway->setTestMode(config('contest.paypal.sandbox'));

        return $gateway;
    }

    /**
     * @param array $parameters
     * @return mixed
     */
    public function purchase(array $parameters)
    {
        $response = $this->gateway()
            ->purchase($parameters)
            ->send();

        return $response;
    }

    /**
     * @param array $parameters
     * @return Response
     */
    public function complete(array $parameters)
    {
        $response = $this->gateway()
            ->completePurchase($parameters)
            ->send();

        return $response;
    }

    /**
     * @param $amount
     * @return string
     */
    public function formatAmount($amount)
    {
        return number_format($amount, 2, '.', '');
    }

    /**
     * @param $entry
     * @return route
     */
    public function getCancelUrl($entry)
    {
        return route('paypal.payment.cancelled', $entry->id);
    }

    /**
     * @param $entry
     */
    public function getReturnUrl($entry)
    {
        return route('paypal.payment.completed', $entry->id);
    }

    /**
     * @param $entry
     */
    public function getNotifyUrl($entry)
    {
        $env = config('services.paypal.sandbox') ? "sandbox" : "live";

        return route('webhook.paypal.ipn', [$entry->id, $env]);
    }
}
