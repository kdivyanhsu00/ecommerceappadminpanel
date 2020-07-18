<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Card;
use App\Cart;
use App\Ticket;
use Carbon\Carbon;
use App\PaymentResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Maybe we could bind the program into the view?
     *
     * @param Program $program
     */
    public function __construct(User $user, Card $card, PaymentResponse $paymentResponse, Cart $cart, Ticket $ticket)
    {
        $this->user = $user;
        $this->card = $card;
        $this->cart = $cart;
        $this->paymentResponse = $paymentResponse;
        $this->ticket = $ticket;
    }

    public function payment(Request $request)
    {
        $merchant_reference = rand(1111, 9999) . "_" . time();
        $amountVal = number_format(($request->get('amount') * 100), 2);
        $amount = floatval(str_replace(",", "", $amountVal));
        $user = $this->user->find($request->get('user_id'));
        if(empty($user)){
            # Get the data
            $data = array(
                'code' => 404,
                'message'=> 'User not found',
            );
            return response()->json($data);
        }
        $card = $this->card->find($request->get('card_id'));
        if(empty($card)){
            # Get the data
            $data = array(
                'code' => 404,
                'message'=> 'Card not found',
            );
            return response()->json($data);
        }
        $orderId = $request->get('order_id');
        
        $dataPayment = array();
        $dataPayment['command']            = 'PURCHASE';
        $dataPayment['merchant_reference'] = $merchant_reference;
        $dataPayment['amount']             = $amount;
        $dataPayment['customer_email']     = $user->email;
        $dataPayment['token_name']         = $card->tokenName;
        $dataPayment['user_id']            = $user->_id;
        $data = $this->paymentAuthorization($dataPayment, $orderId);
        
        # Get the data
        $response = array(
        'code' => 200,
        'message' => 'success',
        'data' => $data,
        );

        return response($response, 200)
                        ->header('Content-Type', 'application/json');
    }

    function paymentAuthorization($dataSend, $orderId) 
    {
        $data['command']             = $dataSend['command'];
        $data['access_code']         = env('ACCESS_CODE');
        $data['merchant_identifier'] = env('MERCHANT_IDENTIFIER');
        $data['merchant_reference']  = $dataSend['merchant_reference'];
        $data['amount']              = $dataSend['amount'];
        $data['currency']            = "SAR";
        $data['language']            = "en";
        $data['customer_email']      = $dataSend['customer_email'];
        $data['eci']                 = "MOTO";
        $data['token_name']          = $dataSend['token_name'];
        $data['customer_ip']         = $_SERVER['REMOTE_ADDR'];
        $signature                   = $this->signature($data);
        $data['signature']           = $signature;

        # Testing Mode
        $url = 'https://sbpaymentservices.PayFort.com/FortAPI/paymentApi';

        $curl = curl_init();
        
        $jsonData = json_encode($data);
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $jsonData,
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/json",
                "postman-token: a5db09bf-dd3a-8640-2597-710710180779"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          # echo "cURL Error #:" . $err;
        } else {

            $data = json_decode($response, TRUE);
        }
        $dataSave = array();
        $dataSave['response']  = $response;
        $dataSave['userId']    = $dataSend['user_id'];
        $this->paymentResponse->create($dataSave);

        if($data['status'] == 14) {
            $cart = $this->cart->where($dataSend['user_id']);
            $cart->update(['items'=>[]]);
            $ticket = $this->ticket->where('orderId', $orderId);
            $ticket->update(['isPayments'=> 'success']);
        } else {
            $ticket = $this->ticket->where('orderId', $orderId);
            $ticket->update(['isPayments'=> 'faild']);
        }
        return $data;
    }

    function signature($arrData) {

        # calculating signature
        $shaString = '';
        ksort($arrData);
        $SHARequestPhrase  = env('SHA_REQUEST_PHRASE');
        $SHAResponsePhrase = env('SHA_RESPONSE_PHRASE');
        $SHAType           = 'SHA256';
        foreach ($arrData as $k => $v) {
            $shaString .= "$k=$v";
        }

        $shaString = $SHARequestPhrase . $shaString . $SHARequestPhrase;

        $signature = hash($SHAType, $shaString);

        return $requestParams['signature'] = hash($SHAType, $shaString);
    }
}