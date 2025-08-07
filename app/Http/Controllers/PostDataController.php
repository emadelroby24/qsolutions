<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostDataRequest;
use App\Http\Requests\UpdatePostDataRequest;
use App\Models\PostData;
use App\Http\Resources\PostDataCollection;

class PostDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $all_posts = PostData::all();
        // $all_posts_collections = PostDataCollection::collection($all_posts);
        return view('welcome', ['all_posts' => $all_posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostDataRequest $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'platform' => 'required',
            'status' => 'required',
            'scheduled_at' => 'required'
        ]);

        $store_post_data = PostData::create([
            'title' => $request->title,
            'content' => $request->content,
            'platform' => $request->platform,
            'status' => $request->status,
            'scheduled_at' => $request->scheduled_at,
        ]);

        return response()->json([
            'success' => 'Post created Successfully'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PostData $postData)
    {
        return $postData;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostData $postData)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostDataRequest $request, PostData $postData)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'platform' => 'required',
            'status' => 'required',
            'scheduled_at' => 'required'
        ]);

        $store_post_data = $postData->update([
            'title' => $request->title,
            'content' => $request->content,
            'platform' => $request->platform,
            'status' => $request->status,
            'scheduled_at' => $request->scheduled_at,
        ]);

        return response()->json([
            'success' => 'Post updated Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostData $postData)
    {
        $postData->delete();
        
        return response()->json([
            'success' => 'Post deleted Successfully'
        ]);
    }
}
