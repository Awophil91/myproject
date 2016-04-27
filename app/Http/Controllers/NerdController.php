<?php

namespace Manager\Http\Controllers;


use Manager\Http\Requests\NerdRequest;
use Manager\Models\Nerd;
use File;
use Intervention\Image\Facades\Image;


class NerdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // get all the nerds
        $nerds = Nerd::orderBy('id', 'desc')->paginate(3);
        // load the view and pass the nerds
        return view('nerd.index', compact('nerds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // load the create form (app/views/nerd/create.blade.php)
        return view('nerd.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NerdRequest $request)
    {
        // store
        $nerd = new Nerd;
        $this->saveNerd($request, $nerd);
        // redirect
        session()->flash('message', 'Successfully created Nerd!');
        return redirect('nerds');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the nerd
        $nerd = Nerd::findOrFail($id);
        // show the view and pass the nerd to it
        return view('nerd.show')->with('nerd', $nerd);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the nerd
        $nerd = Nerd::findOrFail($id);
        // show the edit form and pass the nerd
        return view('nerd.edit')->with('nerd', $nerd);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NerdRequest $request, $id)
    {
        $nerd = Nerd::findOrFail($id);
        $this->saveNerd($request, $nerd);
        // redirect
        session()->flash('message', 'Successfully updated nerd '. $nerd->name.'!');
        return redirect('nerds');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $nerd = Nerd::findOrFail($id);
        $imageName=$nerd->image_name;
        $nerdName=$nerd->name;
        $nerd->delete();
        File::delete(storage_path($this->getSubFolder().$imageName));
        // redirect
        session()->flash('message', 'Successfully deleted nerd '. $nerdName.'!');
        return redirect('nerds');
    }


    public function getImage($id)
    {
        //return $id;
        $nerd = Nerd::findOrFail($id);
        $filePath = storage_path($this->getSubFolder().$nerd->image_name);
        if (!file_exists($filePath))
            abort(404);

        //use intervention/image to create an image response with the necessary headers set
        $returnImage = Image::make($filePath);
        return $returnImage->response();
        //if images are not displaying in browser, make sure there are no empty spaces before
        //the opening php tag in routes.php
    }


    /**
     * @param NerdRequest $request
     * @param $nerd
     */
    private function saveNerd(NerdRequest $request, $nerd)
    {
        $nerd->name = $request->name;
        $nerd->email = $request->email;
        $nerd->nerd_level = $request->nerd_level;
        $nerd->save();

        if ($request->hasFile('image')) {
            $imageName = $nerd->id . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(storage_path($this->getSubFolder()), $imageName);
            //use intervention/image library to create a binary image file and resize it
            //->resize(200, 200)->save(); could be used instead of fit in cases where distortion doesn't matter
            //but we need to avoid distortion here
            //crop the best fitting 1:1 ratio (200x200) and resize to 200x200 pixel
            //add callback functionality to retain maximal original image size
            Image::make(storage_path($this->getSubFolder().$imageName))->fit(200, 200, function ($constraint) {
                $constraint->upsize();
            });

            $nerd->image_name = $imageName;
            $nerd->save();
        }
    }

    /**
     * @return string
     */
    private function getSubFolder()
    {
        //storage_path() gives path to app/storage folder
        return '/app/public/nerds/images/';
    }
}
