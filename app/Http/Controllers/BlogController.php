<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Image;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return response()->view('cms.admin.blog.index', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.admin.blog.create');
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
            'writer' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        if (!$validator->fails()) {
            $image =  new Image();
            $imageFile = $request->file('image');
            $imageName = time(). '_blog.' . $imageFile->getClientOriginalExtension();
            $imageFile->move(base_path().'/public_html/images/', $imageName);
            $imagePath = '/images'.'/'.$imageName;

            $image->name = $imageName;
            $image->path = $imagePath;
            
            $imageIsSaved = $image->save();

            if($imageIsSaved){

                $blog = new Blog();
                $blog->writer = $request->get('writer');
                $blog->image_id = $image->id;
                $blog->title = $request->get('title');
                $blog->description = $request->get('description');
    
                $isSaved = $blog->save();
    
                return response()->json([
                    'title' => $isSaved ? 'Successfully' : 'Error',
                    'details' => $isSaved ? 'This blog has been added successfully' : $validator->getMessageBag()->first(),
                    'icon' => $isSaved ? 'success' : 'warning'
                ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
            }
            else{
                return response()->json([
                    'title' => 'Error',
                    'details' => 'There was a problem while uploading the image',
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
     * Display the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return response()->view('cms.admin.blog.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator($request->except(['id']), [
            'writer' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title' => 'required|string',
            'description' => 'required|string',
        ]);

        if (!$validator->fails()) {
            $image =  new Image();
            $imageFile = $request->file('image');
            $imageName = time(). '_blog.' . $imageFile->getClientOriginalExtension();
            $imageFile->move( base_path().'/public_html/images/' , $imageName);
            $imagePath = '/images'.'/'.$imageName;

            $image->name = $imageName;
            $image->path = $imagePath;
            
            $imageIsSaved = $image->save();

            if($imageIsSaved){
                $blog=Blog::find($request->get('id'));
                $blog->writer = $request->get('writer');
                $blog->image_id = $image->id;
                $blog->title = $request->get('title');
                $blog->description = $request->get('description');
    
                $isSaved = $blog->save();
    
                return response()->json([
                    'title' => $isSaved ? 'Successfully' : 'Error',
                    'details' => $isSaved ? 'This blog has been added successfully' : $validator->getMessageBag()->first(),
                    'icon' => $isSaved ? 'success' : 'warning'
                ], $isSaved ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
            }
            else{
                return response()->json([
                    'title' => 'Error',
                    'details' => 'There was a problem while uploading the image',
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
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog=Blog::find($id);
        $isDeleted = $blog->delete();

        if($isDeleted){
            return response()->json([
                'title' => 'Successfylly',
                'details' => 'blog deleted successfully',
                'icon' => 'success'
            ] , Response::HTTP_OK);
        }
        else{
            return response()->json([
                'title' => 'Error',
                'details' => 'Something went wrong while deleting the blog',
                'icon' => 'error'
            ] , Response::HTTP_BAD_REQUEST);
        }
    }
}
