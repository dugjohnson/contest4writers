<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\PayPalHelper;
use Illuminate\Http\Request;
use App\Models\Entry;

/**
 * Class PayPalController
 * @package App\Http\Controllers
 */
class PayPalController extends KODController
{
    const KOD_UNPUB_FEE = 15.00;
    const ALL_OTHER_FEE = 30.00;

    protected $entryFee = self::ALL_OTHER_FEE;

    public function precheck($entry)
    {
        $findEntry = Entry::findOrFail($entry);
        session()->forget('KODMember');

        //pricing change for KOD member published
        if (false && $findEntry->published) {
            return $this->checkout($entry);
        } else {
            return view('entry.amikod', compact('entry'));
        }


    }

    public function kodcheck($entry, $kodmember = false, Request $request)
    {
        if ($kodmember) {
            session()->put('KODMember','1');
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

        if ( session()->has('KODMember') && '1' == session('KODMember')) {
            $this->entryFee = self::KOD_UNPUB_FEE;
        } else {
            $this->entryFee = self::ALL_OTHER_FEE;
        }

        $response = $paypal->purchase([
            'amount' => $paypal->formatAmount($this->entryFee),
            'transactionId' => $entry,
            'description' => $findEntry->title,
            'currency' => 'USD',
            'cancelUrl' => $paypal->getCancelUrl($findEntry),
            'returnUrl' => $paypal->getReturnUrl($findEntry),
        ]);

        if ($response->isRedirect()) {
            $response->redirect();
        }

        return redirect('entries')->with([
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

        if ( session()->has('KODMember') && '1' == session('KODMember')) {
            $this->entryFee = self::KOD_UNPUB_FEE;
        } else {
            $this->entryFee = self::ALL_OTHER_FEE;
        }

        $response = $paypal->complete([
            'amount' => $paypal->formatAmount($this->entryFee),
            'transactionId' => $findEntry->id,
            'currency' => 'USD',
            'cancelUrl' => $paypal->getCancelUrl($findEntry),
            'returnUrl' => $paypal->getReturnUrl($findEntry),
//            'notifyUrl' => $paypal->getNotifyUrl($findEntry),
        ]);

        if ($response->isSuccessful()) {
            $findEntry->invoiceNumber = $response->getTransactionReference();
            $findEntry->save();

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
