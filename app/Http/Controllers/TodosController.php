<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\TodosRequests;
use App\Helpers\Message;
use Uuid;
use Auth;

class TodosController extends Controller
{

    use Message;
    protected $view = 'pages.todos.';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $todos = new Post();
        return view($this->view.'form', compact('todos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodosRequests $request)
    {
        $data = new Post();
        $data->name = $request->name;
        $data->user_id = Auth::user()->id;
        $data->organization_id = Auth::user()->organization_id;
        $data->description = $request->description;
        $data->deadline = date('Y-m-d H:i:s', strtotime($request->deadline));
        $data->uuid = Uuid::generate(4);
        $data->save();

        return redirect()->route('home')->with('success', $this->SUCCESS_ADD);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $todos = Post::where('uuid', $id)->isOrganization()->isNotDeleted()->first();
        if(!$todos) {
            return view('pages.404');
        }
        return view($this->view.'show', compact('todos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todos = Post::where('uuid', $id)->isOrganization()->isNotDeleted()->first();
        if(!$todos) {
            return view('pages.404');
        }
        return view($this->view.'form', compact('todos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TodosRequests $request, $id)
    {
        $data = Post::where('uuid', $id)->isOrganization()->isNotDeleted()->first();
        if(!$data) {
            return view('pages.404');
        }

        $data->name = $request->name;
        $data->description = $request->description;
        $data->deadline = date('Y-m-d H:i:s', strtotime($request->deadline));
        $data->save();

        return redirect()->route('home')->with('success', $this->SUCCESS_UPDATE);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Post::where('uuid', $id)->isOrganization()->isNotDeleted()->first();
        if(!$data) {
            return view('pages.404');
        }

        $data->status = -1;
        $data->save();

        return redirect()->route('home')->with('success', $this->SUCCESS_DELETE);
    }

    public function done($id)
    {
        $data = Post::where('uuid', $id)->isOrganization()->isNotDeleted()->first();
        if(!$data) {
            return view('pages.404');
        }

        $data->status = 10;
        $data->save();
        
        return redirect()->route('home')->with('success', $this->SUCCESS_UPDATE);
    }
}
