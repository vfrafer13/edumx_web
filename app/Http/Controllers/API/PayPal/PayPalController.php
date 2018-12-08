<?php

namespace App\Http\Controllers\API\PayPal;

use App\Course;
use App\Http\Controllers\Controller;
use App\PayPalGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PayPalController extends Controller
{
    private $gateway;

    function __construct()
    {
        $this->gateway = new \Braintree_Gateway([
            'accessToken' => 'access_token$sandbox$5k25gnmw56d7qb5b$3c9bc67d9db41798548a0845aa2289c7'
        ]);
    }

    /**
     * Generates a client token to communicate with Braintree
     *
     * @return \Illuminate\Http\Response
     */
    public function clientToken()
    {


        $clientToken = $this->gateway->clientToken()->generate();

        return response()->json(compact('clientToken'));
    }

    /**
     * @param \Illuminate\Http\Request
     *
     * Generates a client token to communicate with Braintree
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        $course_id = $request->input('course_id');
        $course = Course::find($course_id);

        $result = $this->gateway->transaction()->sale([
            'amount' => $course->price,
            'paymentMethodNonce' => $request->input('nonce'),
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        if ($result->success) {

            $user_id = Auth::id();


            if (!$course->users()->find($user_id)) {
                $course->users()->attach($user_id);
            }

        }

        return response()->json($result);
    }
}
