<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use App\Http\Requests\PostFormRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        Carbon::setLocale('pt-BR');
        //fetch 5 posts from database which are active and latest
        $posts = Posts::where('active', 1)->orderBy('created_at', 'desc')->paginate(3);

        $posts->each(function($d){
            $d->hummans_date = $d->created_at->diffForHumans(Carbon::now());
        });

        //page heading
        $title = 'Latest Posts';
        //return home.blade.php template from resources/views folder
        return view('home')->withPosts($posts)->withTitle($title);
    }

    public function create(Request $request)
    {
        // if user can post i.e. user is admin or author
        if ($request->user()->can_post()) {
            return view('posts.create');
        } else {
            return redirect('/')->withErrors('You have not sufficient permissions for writing post');
        }
    }

    public function store(Request $request)
    {
        $post = new Posts();
        $post->title = $request->get('title');
        $post->sumary = $request->get('sumary');
        $post->body = trim($request->get('body'));
        $post->slug = str_slug($post->title);
        $post->author_id = Auth::id(); //$request->user()->id;
        if ($request->has('save')) {
            $post->active = 0;
            $message = 'Post saved successfully';
        } else {
            $post->active = 1;
            $message = 'Post published successfully';
        }
        $post->save();
        return redirect('edit/' . $post->slug)->withMessage($message);
    }

    public function show($slug)
    {
        $post = Posts::where('slug', $slug)->first();
        if (!$post) {
            return redirect('/')->withErrors('requested page not found');
        }
        Carbon::setLocale('pt-BR');
        $post->hummans_date = $post->created_at->diffForHumans(Carbon::now());
        $comments = $post->comments;
        return view('posts.show')->withPost($post)->withComments($comments);
    }

    public function edit(Request $request, $slug)
    {
        $post = Posts::where('slug', $slug)->first();
        if ($post && ($request->user()->id == $post->author_id || $request->user()->is_admin()))
            return view('posts.edit')->with('post', $post);
        return redirect('/')->withErrors('you have not sufficient permissions');
    }

    public function update(Request $request)
    {
        //
        $post_id = $request->input('post_id');
        $post = Posts::find($post_id);

        if ($post && ($post->author_id == $request->user()->id || $request->user()->is_admin())) {
            $title = $request->input('title');
            $sumary = $request->input('sumary');
            $slug = str_slug($title);
            $active = $request->input('active');
            $duplicate = Posts::where('slug', $slug)->first();
            if ($duplicate) {
                if ($duplicate->id != $post_id) {
                    return redirect('edit/' . $post->slug)->withErrors('Title already exists.')->withInput();
                } else {
                    $post->slug = $slug;
                }
            }
            $post->active = ($active)? "1": "0";
            $post->title = $title;
            $post->sumary = $sumary;
            $post->body = $request->input('body');

            if ($request->has('save')) {
                $message = 'Post saved successfully';
                $landing = '/my-all-posts';
            } else {
                $message = 'Post updated successfully';
                //$landing = $post->slug;
                $landing = '/my-all-posts';
            }
            $post->save();
            return redirect($landing)->with(['message'=> $message, 'status' => 'success']);
        } else {
            return redirect('/')->with('message', 'you have not sufficient permissions');
        }
    }

    public function destroy(Request $request, $id)
    {
        //
        $post = Posts::find($id);
        if ($post && ($post->author_id == $request->user()->id || $request->user()->is_admin())) {
            $post->delete();
            $data['message'] = 'Post deleted Successfully';
        } else {
            $data['errors'] = 'Invalid Operation. You have not sufficient permissions';
        }
        return redirect('/my-all-posts')->with($data);
    }
}
