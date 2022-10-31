<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClientMessageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeMessage(Request $request)
    {
        $validator = Validator($request->all(), [
            'message' => 'required|string',
        ]);

        if (!$validator->fails()) {
            $message = new Message();
            $message->message = $request->get('message');
            $message->client_id = auth()->user()->id;
            
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
}
