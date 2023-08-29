<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\threads;

class ThreadController extends Controller
{
    public function UserThread(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'user_email' => 'required'
        ]);

        $threads = new threads;
        $threads->title = $request['title'];
        $threads->description = $request['description'];
        $threads->thread_id = $request['thread_id'];
        $threads->User_Id = $request['user_id'];
        $threads->User_Email = $request['user_email'];
        $threads->save();
        return response($threads, 200);
    }

    public function getThreadData($id)
    {

        $thread = new threads;
        $data = $thread->where('thread_id', '=', $id)->get();
        // $data2 = $data->get();
        if ($data == null) {
            return response("Object not found", 404);
        }
        return response($data, 200);
    }

    public function getthreadbyid($id)
    {

        $thread = new threads;
        $data = $thread->where('id', '=', $id)->get();
        // $data2 = $data->get();
        if ($data == null) {
            return response("Object not found", 404);
        }
        return response($data, 200);
    }
}
