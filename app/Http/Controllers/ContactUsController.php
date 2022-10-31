<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact_uss = ContactUs::all();
        return response()->view('cms.admin.contact.index' , ['contact_uss' => $contact_uss]);
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
    public function store(Request $request){}
      public function storee(Request $request)
    {
     // dd($request->all() );
        $validator = Validator( $request->all() , [
            'name' => 'required|string',
            'email' => 'required|email',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        if(! $validator->fails()){
            $contact_us = new ContactUs();
            $contact_us->name = $request->get('name');
            $contact_us->email = $request->get('email');
            $contact_us->title = $request->get('title');
            $contact_us->description = $request->get('description');
            $contact_us->status = false;

            $isSaved = $contact_us->save();

            return response()->json([
                'title' => $isSaved ? 'Successfully' : 'Error',
                'details' => $isSaved ? 'This contact us message has been added successfully' : $validator->getMessageBag()->first(),
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
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function show( $contactUs)
    {
      $contactUs = ContactUs::find($contactUs);
      //dd($contactUs);
        return response()->view('cms.admin.contact.show' , ['contactUs' => $contactUs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactUs $contactUs)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactUs $contactUs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactUs)
    {
        //
    }
}
