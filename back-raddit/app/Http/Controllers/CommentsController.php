<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    /**
     * Display a listing of the comments.
     */
    public function displayAll()
    {

        $comments = Comments::all();
        return $comments->toJson(JSON_PRETTY_PRINT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',

        ]);

        $created =  Comments::create([
            'name' => $request->name,
            'about' => $request->about,
            'comment_picture_URL' => $request->comment_picture_URL,
            'banner_picture_URL' => $request->banner_picture_URL
        ]);

        return ["isCreated" => $created];
    }

    /**
     * Display a comment info.
     * 
     * You need to add the comment id in the param
     */
    public function displayOne(string $subName)
    {
        // return $subName;
        $comment = Comments::where('name', $subName)->firstOrFail();

        return $comment->toJson(JSON_PRETTY_PRINT);;
    }



    /**
     * Update the comment info.
     */
    public function editOne(string $subName)
    {

        $comment = Comments::where('name', $subName)->firstOrFail();

        $success =  $comment->update([
            'name' => request('name'),
            'about' => request('about'),
        ]);

        return [
            'success' => $success
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteOne(string $subName)
    {


        $comment = Comments::where('name', $subName)->firstOrFail();

        $success =  $comment->delete();

        return [
            'deleted' => $success
        ];
    }
}
