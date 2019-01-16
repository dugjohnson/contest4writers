<?php


namespace Contest\Http\Controllers;

use Contest\Http\Controllers\Helpers\PayPalHelper;
use Illuminate\Http\Request;
use Contest\Entry;
use Illuminate\Support\Facades\Log;

/**
 * Class PayPalController
 * @package App\Http\Controllers
 */
class PayPalController extends Controller
{
    const KOD_UNPUB_FEE = 15.00;
    const ALL_OTHER_FEE = 30.00;

    protected $entryFee = self::ALL_OTHER_FEE;

    public function precheck($entry)
    {
        $findEntry = Entry::findOrFail($entry);
        Log::debug('In Precheck');

        if ($findEntry->published)
        {
           $this->checkout($entry);
        } else {
            return view('entry.amikod', compact('entry'));
        }


    }

    public function kodcheck($entry, $kodmember = false, Request $request)
    {
        if ($kodmember){
            $this->entryFee = self::KOD_UNPUB_FEE;
        } else {
            $this->entryFee = self::ALL_OTHER_FEE;
        }
        return $this->checkout($entry);
    }

    /**
     * @param $entry
     * @param Request $request
     * @return redirect
     */
    public function checkout($entry)
    {
        $findEntry = Entry::findOrFail($entry);

        $paypal = new PayPalHelper;

        $response = $paypal->purchase([
            'amount' => $paypal->formatAmount($this->entryFee),
            'transactionId' => $entry,
            'currency' => 'USD',
            'cancelUrl' => $paypal->getCancelUrl($findEntry),
            'returnUrl' => $paypal->getReturnUrl($findEntry),
        ]);
        Log::debug('In checkout. returnURL = '. $paypal->getReturnUrl($findEntry));

        if ($response->isRedirect()) {
            $response->redirect();
        }

        return redirect()->back()->with([
            'message' => $response->getMessage(),
        ]);
    }

    /**
     * @param $entry
     * @param Request $request
     * @return mixed
     */
    public function completed($entry)
    {
        $findEntry = Entry::findOrFail($entry);

        $paypal = new PayPalHelper;

        $response = $paypal->complete([
            'amount' => $paypal->formatAmount($this->entryFee),
            'transactionId' => $findEntry->id,
            'currency' => 'USD',
            'cancelUrl' => $paypal->getCancelUrl($findEntry),
            'returnUrl' => $paypal->getReturnUrl($findEntry),
//            'notifyUrl' => $paypal->getNotifyUrl($findEntry),
        ]);
        Log::debug('In completed. returnURL = '. $paypal->getReturnUrl($findEntry));

        if ($response->isSuccessful()) {
            Log::debug('In completed...successful');
            $findEntry->invoiceNumber = $response->getTransactionReference();
            $findEntry->save();
            Log::debug('In completed...transactionID = '.$findEntry->invoiceNumber );

            return redirect('entries')->with([
                'message' => 'You recent payment is sucessful with reference code ' . $response->getTransactionReference(),
            ]);
        }

        return redirect('entries')->with([
            'message' => $response->getMessage(),
        ]);
    }

    /**
     * @param $entry
     * @return redirect
     */
    public function cancelled($entry)
    {
        return redirect('entries')->with([
            'message' => 'You have cancelled your recent PayPal payment !',
        ]);
    }

    /**
     * @param $entry
     * @param $env
     * @param Request $request
     */
    public function webhook($entry, $env, Request $request)
    {
        // to do with new release of sudiptpa/paypal-ipn v3.0 (under development)
    }
}
