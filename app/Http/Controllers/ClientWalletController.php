<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Image;
use App\Models\Payment;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientWalletController extends Controller
{
    /**
     * Show Referral in cms.
     *
     * @return \Illuminate\Http\Response
     */
    public function showWallet()
    { 
        $deposits = auth()->user()->deposits;
        $withdrawals = auth()->user()->withdrawals;
        $data = [
            'deposits' => $deposits,
            'withdrawals' => $withdrawals,
        ];
        return response()->view('cms.client.wallet.index', $data);
    }

    /**
     * Show Referral in cms.
     *
     * @return \Illuminate\Http\Response
     */
    public function showWithdrawalRequest()
    {
        $payments = Payment::all();
        $data = [
            'payments' => $payments,
        ];
        return response()->view('cms.client.wallet.withdrawal', $data);
    }


    /**
     * Show Deposit Request in cms.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDepositRequest()
    {
        $payments = Payment::all();
        $data = [
            'payments' => $payments,
        ];
        return response()->view('cms.client.wallet.deposit', $data);
    }

    /**
     * Store Deposit Request.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeDepositRequest(Request $request)
    {
        
        $validator = Validator($request->all(), [
            'payment_id' => 'required',
            'amount' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'transfer_id' => 'required|string',
        ]);

        if (!$validator->fails()) {
            $image =  new Image();
            $imageFile = $request->file('image');
            $imageName = time() . '_deposit.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(base_path().'/public_html/images/', $imageName);
            $imagePath = '/images' . '/' . $imageName;

            $image->name = $imageName;
            $image->path = $imagePath;

            $imageIsSaved = $image->save();

            if ($imageIsSaved) {

                $deposit = new Deposit();
                $deposit->payment_id = $request->get('payment_id');
                $deposit->amount = $request->get('amount');
                $deposit->transfer_id = $request->get('transfer_id');
                $deposit->image_id = $image->id;
                $deposit->client_id = auth()->user()->id;
                $deposit->status = false;

                $isSaved = $deposit->save();

                return response()->json([
                    'title' => $isSaved ? 'Successfully' : 'Error',
                    'details' => $isSaved ? 'This deposit has been added successfully' : $validator->getMessageBag()->first(),
                    'icon' => $isSaved ? 'success' : 'warning'
                ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json([
                    'title' => 'Error',
                    'details' => 'There was a problem while uploading the image',
                    'icon' => 'error'
                ], Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json([
                'title' => 'Error',
                'details' => $validator->getMessageBag()->first(),
                'icon' => 'error'
            ], Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Store Deposit Request.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeWithdrawalRequest(Request $request)
    {
        $validator = Validator($request->all(), [
            'payment_id' => 'required',
            'amount' => 'required|numeric',
            'account' => 'required|string',
        ]);

        if (!$validator->fails()) {

            if ($request->get('amount') >= auth()->user()->withdrawable_balance) {
                return response()->json([
                    'title' => 'Error',
                    'details' => 'You cannot withdraw an amount greater than the withdrawable amount',
                    'icon' => 'error'
                ], Response::HTTP_BAD_REQUEST);
            } else {
                $withdrawal = new Withdrawal();
                $withdrawal->payment_id = $request->get('payment_id');
                $withdrawal->amount = $request->get('amount');
                $withdrawal->account = $request->get('account');
                $withdrawal->client_id = auth()->user()->id;
                $withdrawal->status = false;

                $isSaved = $withdrawal->save();

                return response()->json([
                    'title' => $isSaved ? 'Successfully' : 'Error',
                    'details' => $isSaved ? 'This Withdrawal has been added successfully' : $validator->getMessageBag()->first(),
                    'icon' => $isSaved ? 'success' : 'warning'
                ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
            }
        } else {
            return response()->json([
                'title' => 'Error',
                'details' => $validator->getMessageBag()->first(),
                'icon' => 'error'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
