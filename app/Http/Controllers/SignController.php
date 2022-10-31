<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Client;
use App\Models\Forget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SignController extends Controller
{

    /**
     * Show the form for sign In.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSignIn(Request $request)
    {

      //  $client = new Admin();
      //   $client->first_name = 'admin';
     //    $client->last_name = 'admin';
      //   $client->status = 1;
      //   $client->email = 'admin@admin.com';
    //     $client->password = Hash::make('admin123');
   //     $client->role_id = 2;
      

   //      $isSaved = $client->save();

        $referrer = null;
        if ($request->has('ref')) {
            $referrer = Client::find($request->query('ref'));
        }

        return response()->view('sign.signin', [
            'ref' => $referrer
        ]);
    }

    /**
     * Show the form for sign Up.
     *
     * @return \Illuminate\Http\Response
     */
    public function showSignUp(Request $request)
    {
        $referrer = null;
        if ($request->has('ref')) {
            $referrer = Client::find($request->query('ref'));
        }
        return response()->view('sign.signup', [
            'ref' => $referrer
        ]);
    }

    /**
     * Show the form for sign Up.
     *
     * @return \Illuminate\Http\Response
     */
    public function showForgetPassword(Request $request)
    {
        $referrer = null;
        if ($request->has('ref')) {
            $referrer = Client::find($request->query('ref'));
        }
        return response()->view('sign.reset-password', [
            'ref' => $referrer
        ]);
    }


    /**
     * sign Up In System.
     *
     * @return \Illuminate\Http\Response
     */
    public function signUp(Request $request)
    {
        $validator = Validator($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|string',
            'email' => 'required|email|unique:admins|unique:clients',
            'password' => 'required|string|confirmed|min:8|max:20',
        ]);

        if (!$validator->fails()) {
            $referrer_id = $request->get('referrer_id');
            
            if ( $referrer_id === null ) {
                $referrer_id = null;
            }
            else{
                $referrer = Client::findOrFail($referrer_id);

                if ( $referrer === null ) {
                    $referrer_id = null;
                }
                else{
                    $referrer_id = $referrer->id;
                }
            }

            $client = new Client();
            $client->first_name = $request->get('first_name');
            $client->last_name = $request->get('last_name');
            $client->phone = $request->get('phone');
            $client->email = $request->get('email');
            $client->password = Hash::make($request->get('password'));
            $client->referrer_id = $referrer_id;
            $client->status = 1;

            $isSaved = $client->save();

            return response()->json([
                'title' => $isSaved ? 'Successfully' : 'Error',
                'details' => $isSaved ? 'This client has been added successfully' : $validator->getMessageBag()->first(),
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
     * Sign In System.
     *
     * @return \Illuminate\Http\Response
     */
    public function signIn(Request $request)
    {
       
        $validator = Validator($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8|max:20',
            'remember' => 'required|boolean',
        ]);

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->get('remember');
        $userIsAdmin = Admin::where('email', '=', $request->get('email'))->first(); 
       // dd($userIsAdmin);
        $guard = ($userIsAdmin === null) ? 'client' : 'admin';

        if (!$validator->fails()) {

            if (Auth::guard($guard)->attempt($credentials, $remember)) {
                return response()->json([
                    'title' => 'Success',
                    'details' => 'You are Sign In As Client successfully',
                    'icon' => 'success',
                    'guard' => $guard
                ], Response::HTTP_OK);
            } else {
                return response()->json([
                    'title' => 'Error',
                    'details' => 'Sign In Error, Please check login information',
                    'icon' => 'error',
                    'guard' => $guard
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
     * sign Up In System.
     *
     * @return \Illuminate\Http\Response
     */
    public function forgetPassword(Request $request)
    {
        $validator = Validator($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8|max:20',
        ]);

        if (!$validator->fails()) {

            $client = Client::where('email', '=', $request->get('email'))->first();
            $isExisting = ($client === null) ? false : true;


            if ($isExisting) {

                $forget = new Forget();
                $forget->email = $request->get('email');
                $forget->password = $request->get('password');

                $isSaved = $forget->save();

                return response()->json([
                    'title' => $isSaved ? 'Successfully' : 'Error',
                    'details' => $isSaved ? 'Your request has been successfully received, it will be processed and emailed to you' : 'Something went wrong',
                    'icon' => $isSaved ? 'success' : 'warning'
                ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
            } else {
                return response()->json([
                    'title' => 'Error',
                    'details' => 'Sorry, there is no account for this email',
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
     * Sign Out
     *
     * @return \Illuminate\Http\Response
     */
    public function signOut(Request $request)
    {
        $guard = auth('admin')->check() ? 'admin' : 'client';

        Auth::guard($guard)->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('sign-in');
    }
}
