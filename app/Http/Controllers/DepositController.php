<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deposits = Deposit::latest()->get();
        // dd($deposits);
        return response()->view('cms.admin.deposit.index', ['deposits' => $deposits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        return response()->view('cms.admin.deposit.show', ['deposit' => $deposit]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update($deposit)

    {
        $deposit=Deposit::find($deposit);
        $deposit->status = true;

        $isSaved = $deposit->save();

        return response()->json([
            'title' => $isSaved ? 'Successfully' : 'Error',
            'details' => $isSaved ? 'Deposit request accepted successfully' : 'Deposit request not accepted',
            'icon' => $isSaved ? 'success' : 'warning'
        ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy($deposit)
    {   $deposit=Deposit::find($deposit);
        $isDeleted = $deposit->delete();

        if ($isDeleted) {
            return response()->json([
                'title' => 'Successfylly',
                'details' => 'deposit deleted successfully',
                'icon' => 'success'
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'title' => 'Error',
                'details' => 'Something went wrong while deleting the deposit',
                'icon' => 'error'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
