<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return response()->view('cms.admin.admin.index' , ['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.admin.admin.create');
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
            'email' => 'required|unique:admins|unique:clients|email',
            'password' => 'required|string',
        ]);

        if(! $validator->fails()){
            $admin = new Admin();
            $admin->first_name = $request->get('first_name');
            $admin->last_name = $request->get('last_name');
            $admin->email = $request->get('email');
            $admin->password = Hash::make($request->get('password')) ;
            $admin->status = true;

            $isSaved = $admin->save();
            return response()->json([
                'title' => $isSaved ? 'Successfully' : 'Error',
                'details' => $isSaved ? 'This admin has been added successfully' : $validator->getMessageBag()->first(),
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return response()->view('cms.admin.admin.edit' , ['admin'=>$admin]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $request=$request->data;
        // dd($request['first_name']);
        $validator = Validator( $request , [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:admins,email,'.$admin->id,
            'password' => 'required|string',
        ]);

        if(! $validator->fails()){
            $admin->first_name = $request['first_name'];
            $admin->last_name = $request['last_name'];
            $admin->email = $request['email'];
            $admin->password = Hash::make($request['password']) ;
            $admin->status = true;
            $isSaved = $admin->save();
            return response()->json([
                'title' => $isSaved ? 'Successfully' : 'Error',
                'details' => $isSaved ? 'This admin has been updated successfully' : $validator->getMessageBag()->first(),
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
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $admin=Admin::find($id);
        if($admin->email === 'admin@admin.com'){
            return response()->json([
                'title' => 'Error',
                'details' => 'This admin cannot be deleted',
                'icon' => 'error'
            ] , Response::HTTP_BAD_REQUEST);
        }
        else{

           
            $isDeleted = $admin->delete();

            if($isDeleted){
                return response()->json([
                    'title' => 'Successfylly',
                    'details' => 'Admin deleted successfully',
                    'icon' => 'success'
                ] , Response::HTTP_OK);
            }
            else{
                return response()->json([
                    'title' => 'Error',
                    'details' => 'Something went wrong while deleting the admin',
                    'icon' => 'error'
                ] , Response::HTTP_BAD_REQUEST);
            }
        }
    }
}
