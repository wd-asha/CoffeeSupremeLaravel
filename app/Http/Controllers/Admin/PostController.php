<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Rubric;
use Image;

class PostController extends Controller
{
    public function __construct()
    {
        /* Actions for admin only */
        $this->middleware('admin');
    }

    /* ------------------- */
    /*    Show all posts   */
    /* ------------------- */
    public function index()
    {
        $posts = Post::latest()->orderBy('id', 'desc')->paginate(5);
        $trashPosts = Post::onlyTrashed()->orderBy('id', 'desc')->paginate(5);
        $rubrics = Rubric::all();
        return view('admin.post.index', compact('posts', 'rubrics', 'trashPosts'));
    }
    /* end show all posts */

    /* -------------------- */
    /*    Create new post   */
    /* -------------------- */
    public function create()
    {
        $rubrics = Rubric::all();
        /* show create new post form */
        return view('admin.post.create', compact('rubrics'));
    }
    /* end show new post form */

    /* ----------------- */
    /*    Trashed post   */
    /* ----------------- */
    public function delete($id)
    {
        Post::find($id)->delete();
        $notification = array(
            'message' => 'Post trashed',
            'alert-type' => 'success'
        );
        /* to page with list posts */
        return Redirect()->back()->with($notification);
    }
    /* end trashed post */

    /* ----------------- */
    /*    Restore post   */
    /* ----------------- */
    public function restore($id)
    {
        Post::withTrashed()->find($id)->restore();
        /* to page with list brands */
        $notification = array(
            'message' => 'Post restore',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }
    /* end restore post */

    /* ------------------ */
    /*    Save new post   */
    /* ------------------ */
    public function store(Request $request)
    {
        /* preparing the data that came from the form */
        $data = array();
        $data['post_title'] = $request->post_title;
        $data['rubric_id'] = $request->rubric_id;
        $data['post_content'] = $request->post_content;
        $data['created_at'] = Now();
        $data['updated_at'] = Now();
        $image_one = $request->post_image;
        if ($image_one) {
            $image_one_name = hexdec(uniqid()) . '.' . $image_one->getClientOriginalExtension();
            Image::make($image_one)->resize(600, 400)->save('media/post/' . $image_one_name);
            $data['post_image'] = 'media/post/' . $image_one_name;
        }
        /* save new post */
        Post::create($data);
        /* to page with list posts */
        $notification = array(
            'message' => 'Post successfully created',
            'alert-type' => 'success'
        );
        return Redirect()->route('admin.posts')->with($notification);
    }

    /* ---------------- */
    /*     Edit post    */
    /* ---------------- */
    public function edit($id)
    {
        $post = Post::find($id);
        $rubrics = Rubric::all();
        /* show edit post form */
        return view('admin.post.edit', compact('post', 'rubrics'));
    }
    /* end show edit post form */

    /* ---------------- */
    /*    Update post   */
    /* ---------------- */
    public function update(Request $request, $id)
    {
        /* preparing the data that came from the form */
        $data = array();
        $data['post_title'] = $request->post_title;
        $data['rubric_id'] = $request->rubric_id;
        $data['post_content'] = $request->post_content;
        /* update post */
        $update = Post::find($id)->update($data);
        if($update) {
            $notification = array(
                'message' => 'Post updated successfully',
                'alert-type' => 'success'
            );
            /* to page with list posts */
            return Redirect()->route('admin.posts')->with($notification);
        }else{
            $notification = array(
                'message' => 'Nothing to update',
                'alert-type' => 'success'
            );
            /* to page with list posts */
            return Redirect()->route('admin.cposts')->with($notification);
        }
    }
    /* end update post */

    /* ---------------------- */
    /*    Update photo post   */
    /* ---------------------- */
    public function updatePhoto(Request $request, $id)
    {
        $old_image_one = $request->old_image_one;
        $image_one = $request->file('image_one');
        $data = array();
        /* delete the previous image if there was one */
        if($image_one) {
            if($old_image_one !== 'media/post/empty-image.png') {
                unlink($old_image_one);
            };
            /* prepare and save a new image */
            $image_one = $request->file('image_one');
            $location = 'media/post/';
            $name_image_one = hexdec(uniqid());
            $ext_image = strtolower($image_one->getClientOriginalExtension());
            $full_image = $location.$name_image_one.'.'.$ext_image;
            $image_one->move($location, $full_image);
            $data['post_image'] = $full_image;
            /* updating post */
            Post::find($id)->update($data);
            $notification = array(
                'message' => 'Image updated',
                'alert-type' => 'success'
            );
        }else{
            $notification = array(
                'message' => 'Image not updated',
                'alert-type' => 'error'
            );
        }
        /* to page with list posts */
        return Redirect()->route('admin.posts')->with($notification);
    }
    /* end update photo post */
}
