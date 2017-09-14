<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Category;
use App\Tag;

use Session;
use Purifier;
use Image;
use Storage;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all the blog posts in it from the database
        $posts = Post::orderBy('id', 'desc')->paginate(5);
        
        // pass into the index view
        return view('posts.index')->withPosts($posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //validate request
        $this->validate($request, array(
            'title' => 'bail|required|max:255',
            'category_id' => 'required|integer',
            'slug' => 'required|alpha_dash|min:5|max:255|bail',
            'body' => 'required',
            'featured_image' => 'sometimes|image'
        ));

        // store data
        $post = new Post;

        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->slug = $request->slug;
        $post->body = ($request->body);

        // save image
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = date('mjY').'_'.time().'.'.$image->getCLientOriginalExtension();
            $location = public_path('img\featured_images\\'.$filename);
            
            Image::make($image)->save($location);

            $post->image = $filename;
        }

        

        // Save
        $post->save();

        $post->tags()->sync($request->tags, false);

        // Session flash
        Session::flash('success', 'The post saved successfully. Its title is '.$post->title.'.');

        // redirect
        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);


        //show the post
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get all categories 
        $categories = Category::all();
        //find post in the database
        $post = Post::find($id);

        $tags = Tag::all();
        $tags2 = array();
        foreach ($tags as $tag) {
            $tags2[$tag->id] = $tag->name;
        }

        // return the view and pass in the variable
        return view('posts.edit')->withPost($post)->withCategories($categories)->withTags($tags2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        if ($request->input('slug') == $post->slug ) {
                //validate the data
                $this->validate($request, array(
                    'title' => 'bail|required|max:255',
                    'category_id' => 'required|integer',
                    'body' => 'required'
                    ));
        } else {
            //validate the data
            $this->validate($request, array(
                'title' => 'bail|required|max:255',
                'category_id' => 'required|integer',
                'slug' => "required|alpha_dash|min:5|max:255|unique:posts,slug,$id",
                'body' => 'required',
                'featured_image' => 'image'
            ));
        }
        
        
        // save the data
        $post->title = $request->input('title');
        $post->category_id = $request->input('category_id');
        $post->slug = $request->input('slug');
        $post->body = Purifier::clean($request->input('body'));

        if ($request->hasFile('featured_image')) {
            // Add new photo
            $image = $request->file('featured_image');
            $filename = date('mjY').'_'.time().'.'.$image->getCLientOriginalExtension();
            $location = public_path('img\featured_images\\'.$filename);
            Image::make($image)->save($location);
            $oldFilename = $post->image;
            // Update the DB
            $post->image = $filename;
            // Delete the old photo
            // $oldLocation = public_path('featured_images\\'.$oldFilename);
            Storage::delete($oldFilename);
        }

        $post->save();

        if (isset($request->tags)) {
            $post->tags()->sync($request->tags);
        } else {
            $post->tags()->sync([]);
        }
        // set flash data with success message
        Session::flash('success', 'Your post was successfully saved.' );

        // redirect with flash data
        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);

        $post->delete();

        Session::flash('success', 'The Post was sucessfully deleted');
        return redirect()->route('posts.index');
    }
}