<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Plan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders =  auth()->user()->orders;
        $data = [
            'orders' => $orders
        ];
        return response()->view('cms.client.order.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $plans =  Plan::all();
        $data = [
            'plans' => $plans
        ];
        return response()->view('cms.client.order.create', $data);
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
            'plan_id' => 'required',
            'price' => 'required|numeric',
        ]);

        if (!$validator->fails()) {
            $price = $request->get('price');
            $plan = Plan::findOrFail($request->get('plan_id'));
            if (($price >= $plan->min_price) && ($price <= $plan->max_price)) {

                if ($price <= auth()->user()->available_balance) {
                    $Order = new Order();
                    $Order->price = $request->get('price');
                    $Order->client_id = auth()->user()->id;
                    $Order->plan_id = $request->get('plan_id');
                    $Order->status = 0;

                    $isSaved = $Order->save();

                    return response()->json([
                        'title' => $isSaved ? 'Successfully' : 'Error',
                        'details' => $isSaved ? 'This Order has been added successfully' : $validator->getMessageBag()->first(),
                        'icon' => $isSaved ? 'success' : 'warning'
                    ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
                } else {
                    return response()->json([
                        'title' => 'Error',
                        'details' => 'You do not have enough money, please charge your wallet',
                        'icon' => 'error'
                    ], Response::HTTP_BAD_REQUEST);
                }
            } else {
                return response()->json([
                    'title' => 'Error',
                    'details' => 'The price must be within the limits of the selected plan',
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
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $data = [
            'order' => $order,
        ];
        return response()->view('cms.client.order.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
