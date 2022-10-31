<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
        $messages = Message::latest()->get();
        $data = [
            'messages' => $messages,
            'clients' => $clients,
        ];

        return response()->view('cms.admin.message.index' , $data);
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
        $validator = Validator($request->all(), [
            'message' => 'required|string',
        ]);

        if (!$validator->fails()) {
            $message = new Message();
            $message->message = $request->get('message');
            $message->admin_id = auth()->user()->id;
            $message->client_id =  $request->get('client_id');

            $isSaved = $message->save();
            return response()->json([
                'title' => $isSaved ? 'Successfully' : 'Error',
                'details' => $isSaved ? 'This message has been send successfully' : $validator->getMessageBag()->first(),
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
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        $messages = Message::where('client_id' , '=' , $message->client->id )->latest()->get();
        $data = [
            'message' =>$message,
            'messages' =>$messages,
        ];
        return response()->view('cms.admin.message.show' , $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
