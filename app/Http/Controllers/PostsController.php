<?php

namespace App\Http\Controllers;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Http\Requests\StorePost;
class PostsController extends Controller
{

    // private $blogPosts = [
    //     1 => [
    //         'title' => 'Intro to Laravel',
    //         'content' => 'This is a short intro to Laravel',
    //         'is_new' => true,
    //         'has_comments' => true
    //     ],
    //     2 => [
    //         'title' => 'Intro to PHP',
    //         'content' => 'This is a short intro to PHP',
    //         'is_new' => false
    //     ],
    //     3 => [
    //         'title' => 'Intro to golang',
    //         'content' => 'This is a short intro to goland',
    //         'is_new' => false
    //     ]
    // ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return view('blog_posts.index', ['blog_posts' => $this->blogPosts]);
        return view('posts.index', ['posts' => BlogPost::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePost $request)
    {
        //
      $validated = $request -> validated();
      $post = BlogPost::create($validated);

        // $post = new BlogPost();
        // $post->title = $validated['title'];
        // $post->content = $validated['content'];

        // $post->save();

// $post2 = BlogPost::make();

// $post2->save();
        $request->session()->flash('status', 'the blog poast was created!');
        return redirect()->route('posts.show', ['post' => $post->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //
      
//  abort_if(!isset($this -> blogPosts[$id]), 404);




    //  return view('blog_posts.show', ['blog_post' => $this -> blogPosts[$id]]);  
    return view('posts.show', ['post' => BlogPost::findOrFail($id)]);  
  
}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('posts.edit', ['post' => BlogPost::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        //
        $post = BlogPost::findOrFail($id);
        $validated = $request->validated();
        $post->fill($validated);
        $post->save();

        $request->session()->flash('status', 'BLOG post was updated@');
        return redirect()->route('posts.show', ['post' => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // dd($id);
        $post = BlogPost::findOrFail($id);
        $post->delete();
        session() -> flash('status', 'blog post was deleted');
        return redirect()->route('posts.index');
    }
}
