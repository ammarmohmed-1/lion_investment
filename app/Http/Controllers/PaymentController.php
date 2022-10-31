<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Payment;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all();
        return response()->view('cms.admin.payments.index', ['payments' => $payments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.admin.payments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator($request->all(), [
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'account' => 'required|string',
        ]);

        if (!$validator->fails()) {
            $image =  new Image();
            $imageFile = $request->file('image');
            $imageName = time() . '_payment.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(base_path().'/public_html/images/', $imageName);
            $imagePath = '/images' . '/' . $imageName;

            $image->name = $imageName;
            $image->path = $imagePath;

            $imageIsSaved = $image->save();

            if ($imageIsSaved) {

                $payment = new Payment();
                $payment->name = $request->get('name');
                $payment->image_id = $image->id;
                $payment->account = $request->get('account');

                $isSaved = $payment->save();

                return response()->json([
                    'title' => $isSaved ? 'Successfully' : 'Error',
                    'details' => $isSaved ? 'This payment has been added successfully' : $validator->getMessageBag()->first(),
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
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        return response()->view('cms.admin.payments.edit', ['payment' => $payment]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       
        $validator = Validator($request->except(['id']), [
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'account' => 'required|string',
        ]);
       
        
        
        if (!$validator->fails()) {
            $image =  new Image();
            $imageFile = $request->file('image');
            $imageName = time() . '_payment.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(base_path().'/public_html/images/', $imageName);
            $imagePath = '/images' . '/' . $imageName;

            $image->name = $imageName;
            $image->path = $imagePath;

            $imageIsSaved = $image->save();

            if ($imageIsSaved) {
                $payment=Payment::find($request['id']);
                $payment->name = $request['name'];
                $payment->image_id = $image->id;
                $payment->account = $request['account'];

                $isSaved = $payment->save();

                return response()->json([
                    'title' => $isSaved ? 'Successfully' : 'Error',
                    'details' => $isSaved ? 'This payment has been updated successfully' : $validator->getMessageBag()->first(),
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment=Payment::find($id);
        $isDeleted = $payment->delete();

        if ($isDeleted) {
            return response()->json([
                'title' => 'Successfylly',
                'details' => 'Payment deleted successfully',
                'icon' => 'success'
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'title' => 'Error',
                'details' => 'Something went wrong while deleting the payment',
                'icon' => 'error'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
    //  public function updatee(Request $request){
    //     dd($request->except(['id']));
    //  }
}
