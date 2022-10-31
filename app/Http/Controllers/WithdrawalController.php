<?php

namespace App\Http\Controllers;

use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $withdrawals = Withdrawal::latest()->get();
        return response()->view('cms.admin.withdrawal.index', ['withdrawals' => $withdrawals]);
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
     * @param  \App\Models\Withdrawal  $withdrawal
     * @return \Illuminate\Http\Response
     */
    public function show(Withdrawal $withdrawal)
    {
        return response()->view('cms.admin.withdrawal.show', ['withdrawal' => $withdrawal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Withdrawal  $withdrawal
     * @return \Illuminate\Http\Response
     */
    public function edit(Withdrawal $withdrawal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Withdrawal  $withdrawal
     * @return \Illuminate\Http\Response
     */
    public function update($withdrawal)
    {
        $withdrawal=Withdrawal::find($withdrawal);
        $withdrawal->status = true;

        $isSaved = $withdrawal->save();

        return response()->json([
            'title' => $isSaved ? 'Successfully' : 'Error',
            'details' => $isSaved ? 'withdrawal request accepted successfully' : 'withdrawal request not accepted',
            'icon' => $isSaved ? 'success' : 'warning'
        ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Withdrawal  $withdrawal
     * @return \Illuminate\Http\Response
     */
    public function destroy($withdrawal)
    {
        $withdrawal=Withdrawal::find($withdrawal);
        $isDeleted = $withdrawal->delete();

        if ($isDeleted) {
            return response()->json([
                'title' => 'Successfylly',
                'details' => 'withdrawal deleted successfully',
                'icon' => 'success'
            ], Response::HTTP_OK);
        } else {
            return response()->json([
                'title' => 'Error',
                'details' => 'Something went wrong while deleting the withdrawal',
                'icon' => 'error'
            ], Response::HTTP_BAD_REQUEST);
        }
    }
}
