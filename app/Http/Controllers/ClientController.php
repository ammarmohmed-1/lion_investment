<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Forget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        return response()->view('cms.admin.client.index' , ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator( $request->all() , [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|string',
            'email' => 'required|email|unique:admins|unique:clients',
            'password' => 'required|string',
        ]);

        if(! $validator->fails()){
            $client = new Client();
            $client->first_name = $request->get('first_name');
            $client->last_name = $request->get('last_name');
            $client->phone = $request->get('phone');
            $client->email = $request->get('email');
            $client->password = Hash::make($request->get('password')) ;
            $client->status = true;

            $isSaved = $client->save();

            return response()->json([
                'title' => $isSaved ? 'Successfully' : 'Error',
                'details' => $isSaved ? 'This client has been added successfully' : $validator->getMessageBag()->first(),
                'icon' => $isSaved ? 'success' : 'warning'
            ] , $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }
        else{
            return response()->json([
                'title' => 'Error',
                'details' => $validator->getMessageBag()->first(),
                'icon' => 'error'
            ] , Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return response()->view('cms.admin.client.edit' , ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request=$request->data;
        $validator = Validator( $request , [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|numeric|unique:clients,phone,'.$client->id,
            'email' => 'required|email|unique:admins|unique:clients,email,'.$client->id,
            'password' => 'required|string',
        ]);
       

        if(! $validator->fails()){

            $client->first_name = $request['first_name'];
            $client->last_name = $request['last_name'];
            $client->phone = $request['phone'];
            $client->email = $request['email'];
            $client->password = Hash::make($request['password']);
            $client->status = true;

            $isSaved = $client->save();

            return response()->json([
                'title' => $isSaved ? 'Successfully' : 'Error',
                'details' => $isSaved ? 'This client has been added successfully' : $validator->getMessageBag()->first(),
                'icon' => $isSaved ? 'success' : 'warning'
            ] , $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
        }
        else{
            return response()->json([
                'title' => 'Error',
                'details' => $validator->getMessageBag()->first(),
                'icon' => 'error'
            ] , Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client=Client::find($id);
        $clientemail = $client->email;
        $forgetExists = Forget::where('email', $clientemail)->exists();
        if($forgetExists != null)
          $forgetDeleted = Forget::where('email', $clientemail)->first()->delete();
        
        $isDeleted = $client->delete();

        if($isDeleted){
            return response()->json([
                'title' => 'Successfylly',
                'details' => 'Client deleted successfully',
                'icon' => 'success'
            ] , Response::HTTP_OK);
        }
        else{
            return response()->json([
                'title' => 'Error',
                'details' => 'Something went wrong while deleting the client',
                'icon' => 'error'
            ] , Response::HTTP_BAD_REQUEST);
        }
    }
}
