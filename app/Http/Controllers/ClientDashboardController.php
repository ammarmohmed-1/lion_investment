<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ClientDashboardController extends Controller
{
    /**
     * Show home in cms.
     *
     * @return \Illuminate\Http\Response
     */
    public function showHome()
    {
        // $numberOfAdmins = Admin::count();
        // $data = [
        //     'numberOfAdmins' => $numberOfAdmins
        // ];
        return response()->view('cms.client.home');
    }

    /**
     * Show profile in cms.
     *
     * @return \Illuminate\Http\Response
     */
    public function showProfile()
    {
        return response()->view('cms.client.profile');
    }

    /**
     * Show Referral in cms.
     *
     * @return \Illuminate\Http\Response
     */
    public function showReferral()
    {
        return response()->view('cms.client.referral');
    }

    /**
     * Show Referral in cms.
     *
     * @return \Illuminate\Http\Response
     */
    public function showChat()
    {
        $messages = Message::where('client_id', '=', auth()->user()->id)->latest()->get();
        $data = [
            'messages' => $messages,
        ];
        return response()->view('cms.client.chat', $data);
    }
}
