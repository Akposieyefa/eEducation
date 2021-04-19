<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment as PaymentData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Yabacon\Paystack;
use App\Models\Student;
use App\Models\Fee;
use Auth;

class PaymentController extends Controller
{

    /**
     * payment form display
     */
    public function  paymentForm()
    {
        return view('fee-payment');
    }

    /**
     * @return Application|RedirectResponse|Redirector
     * initialize paystack payment
     */
    public function initialize()
    {
        request()->validate([
            'student_id' => 'required'
        ]);

        $student = Student::where('student_id', request()->student_id)->first();
        $level = $student->level_id;

        $fee = Fee::where('level_id', $level)->where('term_id', activeTermId())->first();

        if ($fee) {
            $amount = $fee->amount;
            $paymentReference = "VS" . sprintf("%0.9s", str_shuffle(rand(12, 30000) * time()));

            $tr = PaymentData::create([
                'student_id' => request()->student_id,
                'trans_ref' => $paymentReference,
                'guardian_id' => auth()->user()->guardian->id,
                'term_id' => activeTermId(),
                'amount' =>  $amount,
                'status' => false
            ]);

            $payStack = new Paystack('sk_test_2a3345566113793b468c574ea74028fa50c2497d');
            $trx = $payStack->transaction->initialize(
                [
                    'amount' => $amount * 100, /* in kobo */
                    'email' => auth()->user()->email,
                    'reference' => $paymentReference,
                    'callback_url' => "http://127.0.0.1:8000/verify/$paymentReference",
                    'metadata' => [
                        'student_id' => request()->student_id,
                        'reference' => $paymentReference,
                        'transaction_id' => $tr->id,
                    ],
                ]
            );
            if (!$trx) {
                exit($trx->data->message);
            }
            return redirect($trx->data->authorization_url);
        } else {
            return view('fee-payment')->with('error', 'Cannot make payment for this ward. Contact School Administrator');
        }
    }

    /**
     * @param $reference
     * @return Application|RedirectResponse|Redirector
     * verify paystack payment
     */
    public function verify($reference)
    {
        if (!$reference) {
            die('No reference supplied');
        }
        $payStack = new Paystack('sk_test_2a3345566113793b468c574ea74028fa50c2497d');
        $trx = $payStack->transaction->verify([
            'reference' => $reference
        ]);

        if (!$trx->data->status = "success") {
            exit($trx->message);
        }
        $trans_ref = $trx->data->metadata->reference;

        PaymentData::where('trans_ref', $trans_ref)
            ->where('guardian_id', auth()->user()->guardian->id)
            ->update([
                'status' => true,
            ]);
        return redirect(url('verify-confirmed'));
    }


    public function allFees()
    {
        $payments = PaymentData::where('term_id', activeTermId())->get();
        return view('fees_payment', compact('payments'));
    }

    /**
     * confirmation page
     */
    public function confirmed()
    {
        return view('fee-payment')->with('success', 'Payment Successful.');
    }
}
