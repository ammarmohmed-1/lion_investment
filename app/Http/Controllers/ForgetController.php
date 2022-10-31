<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Forget;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class ForgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forgets = Forget::latest()->get();


        $data = [
            'forgets' => $forgets,
        ];
        return response()->view('cms.admin.forget.index', $data);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Forget  $forget
     * @return \Illuminate\Http\Response
     */
    public function show(Forget $forget)
    {
        $client = Client::where('email', '=', $forget->email)->first();
        $data = [
            'forget' => $forget,
            'client' => $client,
        ];
        return response()->view('cms.admin.forget.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Forget  $forget
     * @return \Illuminate\Http\Response
     */
    public function edit(Forget $forget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Forget  $forget
     * @return \Illuminate\Http\Response
     */
    public function update($forget)
    {
         $forget=Forget::find($forget);
        $client = Client::where('email', '=', $forget->email)->first();

        $client->password = Hash::make($forget->password);
       
        $forget->status = true;
        $forget->save();
        
        $isSaved = $client->save();

        return response()->json([
            'title' => $isSaved ? 'Successfully' : 'Error',
            'details' => $isSaved ? 'The password has been changed successfully' : 'Password has not been changed',
            'icon' => $isSaved ? 'success' : 'warning'
        ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Forget  $forget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forget $forget)
    {
        //
    }
}
