<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment as PaymentData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Yabacon\Paystack;
use App\Models\Student;
use App\Models\Fee;
use App\Models\Level;
use Auth;
use Carbon\Carbon;

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

        $student = Student::where('admission_no', request()->student_id)->get()->toArray();

        if (count($student) > 0) {
            $level_id = $student[0]['level_id'];

            $fee = Fee::where('level_id', $level_id)->where('term_id', activeTermId())->first();
            $level = Level::where('id', $level_id)->get()->toArray();

            if ($fee) {
                $amount = $fee->amount;
                $paymentReference = "VS" . sprintf("%0.9s", str_shuffle(rand(12, 30000) * time()));

                $tr = PaymentData::create([
                    'student_id' => $student[0]['student_id'],
                    'trans_ref' => $paymentReference,
                    'guardian_id' => auth()->user()->guardian->id,
                    'term_id' => activeTermId(),
                    'amount' =>  $amount,
                    'status' => false
                ]);

                $current = Carbon::now();
                $duedate = $current->format('m/d/Y');

                return json_encode(
                    array(
                        'status' => 'success',
                        'message' => 'Successfully verified student',
                        'amount' => $amount,
                        'item' => 'Daarul Hadeethis Salafiyyah Nigeria (DHSN) Fees Payment for ' . request()->student_id,
                        'description' => 'Payment for ' . $level[0]['name'],
                        'duedate' => $duedate,
                        'first_name' => '' . $student[0]['fname'],
                        'email' => '' . auth()->user()->guardian->email,
                        'phone' => '' . auth()->user()->guardian->phone,
                        'in_app_reference' => $paymentReference,
                        'transaction_id' => $tr->id,
                    )
                );

                /*$payStack = new Paystack('sk_test_2a3345566113793b468c574ea74028fa50c2497d');
                $trx = $payStack->transaction->initialize(
                    [
                        'amount' => $amount * 100,
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
                return redirect($trx->data->authorization_url);*/
            } else {
                return json_encode(array('status' => 'error', 'message' => 'Error retrieving fee information. Contact School Administrator'));
                //return view('fee-payment')->with('error', 'Cannot make payment for this ward. Contact School Administrator');
            }
        } else {
            return json_encode(array('status' => 'error', 'message' => 'Student with Registration Number : ' . request()->student_id . ' not found. Contact School Administrator'));
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
            return json_encode(array('status' => 'error', 'message' => 'Error Verifying Transaction.'));
            //die('No reference supplied');
        }
        /*$payStack = new Paystack('sk_test_2a3345566113793b468c574ea74028fa50c2497d');
        $trx = $payStack->transaction->verify([
            'reference' => $reference
        ]);

        if (!$trx->data->status = "success") {
            exit($trx->message);
        }
        $trans_ref = $trx->data->metadata->reference;*/

        PaymentData::where('trans_ref', $reference)
            ->where('guardian_id', auth()->user()->guardian->id)
            ->update([
                'status' => true,
            ]);
        return json_encode(array('status' => 'success', 'message' => 'Transaction Successfull.', 'url' => url('verify-confirmed')));
        //return redirect(url('verify-confirmed'));
    }


    public function allFees()
    {
        $userRoles = auth()->user()->roles->pluck('name');
        if ($userRoles[0] == 'Admin') {
            $payments = PaymentData::where('term_id', activeTermId())->get();
        } elseif ($userRoles[0] == 'Guardian') {
            $payments = PaymentData::where('guardian_id', auth()->user()->guardian->id)->get();
        }
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
