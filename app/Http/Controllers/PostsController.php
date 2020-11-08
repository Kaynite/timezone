<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Image;
use Illuminate\Support\Str;
use App\Traits\ImagesUpload;
use Illuminate\Http\Request;
use App\DataTables\PostsDatatable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostsController extends Controller
{
    use ImagesUpload;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PostsDatatable $datatable)
    {
        return $datatable->render('adminlte.posts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminlte.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'   => 'string|required',
            'content' => 'string|required',
            'slug'    => 'string|required',
            'image'   => 'image|required',
        ]);
        $post = Post::create($request->all());
        $this->upload($post, 'image', 'blog');
        return redirect()->route('posts.index')->with('success', 'Post was created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id, $slug)
    {
        $post = Post::where('id', $id)
            ->where('slug', $slug)
            ->with('comments')
            ->withCount('comments')
            ->firstOrFail();
        return view('site.blog.post')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('adminlte.posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $request->validate([
            'title'   => 'string|required',
            'content' => 'string|required',
            'slug'    => 'string|required',
            'image'   => 'image|sometimes',
        ]);
        $post->update($request->all());

        if($request->hasFile('image')) {
            if (isset($post->cover)) {
                $post->cover->delete();
                Storage::delete($post->cover->path ?? '');
            }
            $originalName = $request->file('image')->getClientOriginalName();
            $mime         = $request->file('image')->getClientMimeType();
            $size         = $request->file('image')->getSize();
            $path         = $request->file('image')->store("blog/$id");
            Image::create([
                'imageable_id'   => $post->id,
                'imageable_type' => get_class($post),
                'original_name'  => $originalName,
                'path'           => $path,
                'mime_type'      => $mime,
                'size'           => $size,
            ]);
        }
        return redirect()->route('posts.index')->with('success', 'Post was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Post::findOrFail($id);
        $admin->delete();
        return redirect()->route('posts.index')
            ->with('success', __('admin.posts.form.success delete'));
    }

    public function multipleDelete(Request $request)
    {
        if (!$request->has('posts')) {
            return back()->withErrors(['message' => __('admin.posts.form.no selection')]);
        }

        Post::destroy($request->posts);
        return redirect()->route('posts.index')
            ->with('success', __('admin.posts.form.success multiple delete'));
    }

    public function imagesUpload(Request $request)
    {
        if ($request->hasFile('upload')) {
            $v = Validator::make($request->all(), [
                'upload' => 'image',
            ]);
            if ($v->fails()) {
                $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                $msg             = 'Only Images allowed';
                $response        = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$msg', '$msg')</script>";
                @header('Content-type: text/html; charset=utf-8');
                echo $response;
            } else {
                $fileName        = $request->file('upload')->store('blog');
                $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                $url             = Storage::url($fileName);
                $msg             = 'Image successfully uploaded';
                $response        = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
                @header('Content-type: text/html; charset=utf-8');
                echo $response;
            }
        }
    }

    public function makeSlug(Request $request)
    {
        if ($request->ajax() && $request->has('slug')) {
            $slug  = Str::slug($request->title);
            $times = Post::where('slug', 'LIKE', "%$slug%")->count();
            if ($times > 0) {
                $slug = $slug . '-' . strval($times + 1);
            }
            if ($slug != '') {
                return response()->json([
                    'slug'   => $slug,
                    'status' => 'success',
                ]);
            } else {
                return response()->json([
                    'message' => 'Please enter a valid title',
                    'status'  => 'error',
                ]);
            }

        }
    }
}
