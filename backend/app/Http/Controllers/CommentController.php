<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comments;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function comments(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'Comment' => 'required',
        ]);

        $Comments = new Comments;
        $Comments->comments = $request['Comment'];
        $Comments->Thread_Cat_Id = $request['thread_cat_id'];
        $Comments->User_Email = $request['User_Email'];
        $Comments->save();
        return response($Comments, 200);
    }

    public function getcommentsbyid($id)
    {
        $Comments = new Comments;
        $data = $Comments->where('Thread_Cat_Id', '=', $id)->get();
        // $data2 = $data->get();
        if ($data == null) {
            return response("Object not found", 404);
        }
        return response($data, 200);
    }
}
