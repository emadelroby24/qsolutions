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
        $all_posts = PostData::orderBy('created_at')->get();
        return response()->json([
            'all_posts' => $all_posts,
        ]);
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
        $store_post_data = PostData::create([
            'title' => $request->title,
            'content' => $request->content,
            'platform' => $request->platform,
            'status' => $request->status,
            'scheduled_at' => $request->scheduled_at,
        ]);

        $msg = 'Post created Successfully';

        if(!$store_post_data){
            $msg = 'There is something error';
        }
        
        return response()->json([
            'success' => $msg
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($postId)
    {
        $post = PostData::find($postId);
        
        if (!$post) {
            return response()->json([
                'error' => 'Post not found'
            ], 404);
        }

        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostData $postId)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostDataRequest $request, $postId)
    {
        $post = PostData::find($postId);
        if (!$post) {
            return response()->json([
                'error' => 'Post not found'
            ], 404);
        }
        $update_post_data = $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'platform' => $request->platform,
            'status' => $request->status,
            'scheduled_at' => $request->scheduled_at,
        ]);

        $msg = 'Post updated Successfully';

        if(!$update_post_data){
            $msg = 'There is something error';
        }
        
        return response()->json([
            'success' => $msg
        ]);
   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($postId)
    {
        $post = PostData::find($postId);
        
        if (!$post) {
            return response()->json([
                'error' => 'Post not found'
            ], 404);
        }

        $delete_post_data = $post->delete();
        
        $msg = 'Post updated Successfully';

        if(!$delete_post_data){
            $msg = 'There is something error';
        }
        
        return response()->json([
            'success' => $msg
        ]);
    }
}
