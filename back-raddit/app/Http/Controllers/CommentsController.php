<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\CommentsResource;
use App\Http\Requests\StoreCommentRequest;
use App\Traits\HttpResponses;



/**
 * @group COMMENTS Management
 * 
 * APIs to manage the COMMENTS resources.
 */
class CommentsController extends Controller
{

    use HttpResponses;
    /**
     * Display a listing of the comments.
     */
    public function displayAll()
    {


        $comments = Comments::all();
        return $comments->toJson(JSON_PRETTY_PRINT);
    }


    /**
     * Display all comments by post id
     * 
     */

    public function displayAllByPost($id)
    {
        $comments = Comments::all()->where('post_id', $id)->values();
        // dump();
        return $comments;
    }
    /**
     * Display only one
     */

    public function displayOne($id)
    {
        return $id;
        $comment = Comments::get($id);

        return $comment;
    }

    /**
     * Store a newly created resource in storage.
     */
    // StoreCommentRequest
    public function store(Request $request)
    {


        // $request->validated($request->all());

        Comments::create([
            'author_id' => Auth::user()->id,
            'post_id' => $request->post_id,
            'content' => $request->content
        ]);

        // return new CommentsResource($comment);
        return Comments::all()->where('post_id', $request->post_id)->values();
    }

    /**
     * Display a comment info.
     * 
     * You need to add the comment id in the param
     */
    // public function displayOne(string $postId)
    // {

    //     return CommentsResource::collection(
    //         Comments::where('post_id', $postId)->get()
    //     );

    //     // return $subName;
    //     // $comment = Comments::where('name', $subName)->firstOrFail();
    //     // return $comment->toJson(JSON_PRETTY_PRINT);;
    // }



    /**
     * Update the comment info.
     */
    public function editOne($commentId)
    {

        // return $commentId;

        // $comment = Comments::where('id', $commentId);
        $comment = Comments::where('id', $commentId)->firstOrFail();
        // return $comment;

        if ($comment->author_id ===  Auth::user()->id) {
            // return [$comment, $request];
            $comment->update([
                'content' => request('content'),

            ]);

            return $this->success([]);
        } else {
            return $this->error('', 'Unauthorized', 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function deleteOne($commentId)
    {

        $comment = Comments::where('id', $commentId)->firstOrFail();

        if ($comment->author_id ===  Auth::user()->id) {
            // return [$comment, $request];

            $success =  $comment->delete();

            return $this->success([]);
        } else {
            return $this->error('', 'Unauthorized', 401);
        }
    }
}
