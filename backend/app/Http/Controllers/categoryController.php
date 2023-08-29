<?php

namespace App\Http\Controllers;

use App\Models\thread_desc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class categoryController extends Controller
{
    public function category(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'thread' => 'required',
        ]);

        $thread_desc = new thread_desc;
        $category = $request->thread;
        $data = $thread_desc->where('thread', '=', $category)->first();
        // $data2 = $data->get();
        if ($data == null) {
            return response("Object not found", 404);
        }
        return response($data, 200);
    }

    public function threads()
    {
        $thread_desc  = thread_desc::all();
        return response($thread_desc, 200);
    }

    public function threadbyid($id)
    {
        $thread_desc = new thread_desc;
        $data = $thread_desc->where('id', '=', $id);
        $data2 = $data->get();
        return response($data2, 200);
    }
}
