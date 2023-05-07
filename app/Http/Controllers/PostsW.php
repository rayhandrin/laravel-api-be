<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class PostsW extends Controller
{
    /**
     * @return Return the list of all posts to view
     */
    public function index()
    {
        $posts = Post::all();
        $response = [
            'success' => true,
            'message' => 'List Semua Posts',
            'data' => $posts
        ];

        return view('display', compact('posts'));
    }

    // This function input data to database
    public function store(Request $request)
    {
        // Validate the input data from the input form
        if ($request->isMethod('post')) {
            $validator = Validator::make(
                $request->all(),
                [
                    'title'     => 'required',
                ],
                [
                    'title.required' => 'Masukkan Title Post!',
                ]
            );

            // If the input data is not valid, return to the input form
            if ($validator->fails()) {
                return redirect('posts/create')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                // If the input data is valid, save the data to database
                $post = new Post();
                $post->title = $request->input('title');
                $post->save();

                // If the data is saved, return to the list of all posts
                return redirect('posts');
            }
        }
    }
}
