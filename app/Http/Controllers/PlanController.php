<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans = Plan::all();
        return response()->view('cms.admin.plan.index', ['plans' => $plans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.admin.plan.create');
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
            'min_price' => 'required|numeric|min:1|max:99999',
            'max_price' => 'required|numeric|min:1|max:99999',
            'profit' => 'required|numeric',
            'days' => 'required|numeric',
        ]);

        if (!$validator->fails()) {
            $plan = new Plan();
            $plan->name = $request->get('name');
            $plan->min_price = $request->get('min_price');
            $plan->max_price = $request->get('max_price');
            $plan->profit = $request->get('profit');
            $plan->days = $request->get('days');

            $isSaved = $plan->save();

            return response()->json([
                'title' => $isSaved ? 'Successfully' : 'Error',
                'details' => $isSaved ? 'This plan has been added successfully' : $validator->getMessageBag()->first(),
                'icon' => $isSaved ? 'success' : 'warning'
            ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
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
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(Plan $plan)
    {
        return response()->view('cms.admin.plan.edit', ['plan' => $plan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plan $plan)
    {
        $request=$request->data;
        $validator = Validator($request, [
            'name' => 'required|string',
            'min_price' => 'required|numeric',
            'max_price' => 'required|numeric',
            'profit' => 'required|numeric',
            'days' => 'required|numeric',
        ]);

        if (!$validator->fails()) {

            $plan->name = $request['name'];
            $plan->min_price = $request['min_price'];
            $plan->max_price = $request['max_price'];
            $plan->profit = $request['profit'];
            $plan->days = $request['days'];

            $isSaved = $plan->save();

            return response()->json([
                'title' => $isSaved ? 'Successfully' : 'Error',
                'details' => $isSaved ? 'This plan has been updated successfully' : $validator->getMessageBag()->first(),
                'icon' => $isSaved ? 'success' : 'warning'
            ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
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
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan=Plan::find($id);
        $isDeleted = $plan->delete();

        if ($isDeleted) {
            return response()->json([
                'title' => 'Successfylly',
                'details' => 'Plan deleted successfully',
                'icon' => 'success'
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'title' => 'Error',
                'details' => 'Something went wrong while deleting the plan',
                'icon' => 'error'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
