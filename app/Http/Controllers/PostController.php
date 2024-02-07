<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if(session('user') != null){
            $posts = Post::where('author', '=', session('user')->id)->orderBy('created_at', 'desc')->simplePaginate(5);
            return view('post.index')->with(['posts' => $posts]);
        }else{
            return redirect()->route('login-user');
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        if(session('user') == null) return redirect()->route('login-user');
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        try {

            $validated = $request->validate([
                'title' => 'required|max:255',
                'content' => 'required|max:255'
            ]);

            if(!$validated){
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = Post::create($request->all());
            if($data->count() > 0){
                return redirect(route('dashboard'))->with('success', 'Post Created Successfully!');
            }else{
                return redirect()->back()->withErrors($validator)->withInput();
            }
        } catch (\Throwable $th) {
            throw $th;
            // return response()->json($th, 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        if(session('user') == null) return redirect()->route('login-user');
        try {

            $post = Post::find($id);
            if($post !== null && $post->count() > 0){
                return view('post.view', ['post' => $post]);
            }
            

            
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validate = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        if(!$validate){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = Post::find($id);

        if($data !== null && $data->count() > 0){
            $data->update($request->all());
            return redirect()->back()->with('message', 'Updated Successfully')->withInput();
        }else{
            return redirect()->back()->withErrors($validator)->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $post = Post::find($id);    
        if($post !== null && $post->count() > 0){
            $post->delete();
            return redirect('dashboard')->with('success', 'Post Deleted Successfully');
        }else{
            return redirect()->back()->withErrors([
                'message', 'Something went wrong'
            ])->withInput();
        }
        
    
    }
}
