<?php

namespace App\Http\Controllers;

use App\Models\MemberPost;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = MemberPost::latest()->paginate(5);

        return view('member.index',compact('posts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');
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
            'title' => 'required',
            'description' => 'required',
        ]);

        MemberPost::create($request->all());

        return redirect()->route('member.index')
            ->with('success','Members-only post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberPost  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = MemberPost::find($id);

        return view('member.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberPost  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = MemberPost::find($id);
        return view('member.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemberPost  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberPost $post)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $post->update($request->all());

        return redirect()->route('member.index')
            ->with('success','Post updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberPost $post)
    {
        $post->delete();

        return redirect()->route('member.index')
            ->with('success','Post deleted successfully');
    }
}
