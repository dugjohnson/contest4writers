<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Helpers\PayPalHelper;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
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
    protected $entry_id;

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

    public function kodcheck($entry, $kodmember = false)
    {
        if ($kodmember) {
            session()->put('KODMember', '1');
        }
        return $this->processTransaction($entry);
        //return $this->checkout($entry);
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

        if (session()->has('KODMember') && '1' == session('KODMember')) {
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

        if (session()->has('KODMember') && '1' == session('KODMember')) {
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

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction($entry)
    {
        if (session()->has('KODMember') && '1' == session('KODMember')) {
            $this->entryFee = self::KOD_UNPUB_FEE;
        } else {
            $this->entryFee = self::ALL_OTHER_FEE;
        }
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $this->entryFee
                    ],
                    "custom_id"=>$entry
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect()
                ->route('entries.index')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('entries.index')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            if (isset($response['purchase_units'][0]['payments']['captures'][0]['custom_id'])) {
                $entry = $response['purchase_units'][0]['payments']['captures'][0]['custom_id'];
                $findEntry = Entry::findOrFail($entry);
                $findEntry->invoiceNumber = $response['id'];
                $findEntry->save();
            }

            return redirect()
                ->route('entries.index')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('entries.index')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('entries.index')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }

}
