<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\LiveStream;
use Illuminate\Http\Request;
use Str;

class LiveStreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $livestreams = LiveStream::latest()->paginate(20);
            $title = "All livestreams";
            return view('admin.livestreams.index', compact('livestreams', 'title'));
        } catch (\Exception $e) {
            dd("ooOps! An exceptional error occured");
        } catch (\Error $e) {
            dd("ooOps! An error occured");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.livestreams.create', ['title' => 'Add liveStream']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'string', 'max:255'],
            'end_date' => ['required', 'string', 'max:255'],
            'description' => [],
            'video_id' => ['required', 'string', 'max:255'],
        ]);

        try {
            if (LiveStream::create($data)) {
                return back()->withSuccess("Live stream added successfully.");
            } else {
                return back()->withError("An error occured while adding liveStream");
            }
        } catch (\Exception $e) {
            return back()->withError("ooOps! An exceptional error occured");
        } catch (\Error $e) {
            return back()->withError("ooOps! An error occured");
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LiveStream  $liveStream
     * @return \Illuminate\Http\Response
     */
    public function show(LiveStream $liveStream)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LiveStream  $liveStream
     * @return \Illuminate\Http\Response
     */
    public function edit($liveStream)
    {
        try {
            $liveStream = LiveStream::findOrFail($liveStream);
            $title = "Edit $liveStream->title (Live Streaming)";
            return view('admin.livestreams.edit', compact('liveStream', 'title'));
        } catch (\Exception $e) {
            dd("ooOps! An exceptional error occured");
        } catch (\Error $e) {
            dd("ooOps! An error occured");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LiveStream  $liveStream
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $liveStream)
    {
        $data = $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'string', 'max:255'],
            'end_date' => ['required', 'string', 'max:255'],
            'description' => [],
            'video_id' => ['required', 'string', 'max:255'],
        ]);

        try {
            $liveStream = LiveStream::findOrFail($liveStream);
            if ($liveStream->update($data)) {
                return back()->withSuccess("Live stream added successfully.");
            } else {
                return back()->withError("An error occured while updating liveStream");
            }
        } catch (\Exception $e) {
            return back()->withError("ooOps! An exceptional error occured");
        } catch (\Error $e) {
            return back()->withError("ooOps! An error occured");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LiveStream  $liveStream
     * @return \Illuminate\Http\Response
     */
    public function destroy($liveStream)
    {
        try {
            $liveStream = LiveStream::findOrFail($liveStream);
            if ($liveStream->delete()) {
                return back()->withSuccess("LiveStream deleted successfully.");
            } else {
                return back()->withError("Error occured while deleting livestream.");
            }
        } catch (\Exception $e) {
            dd("An exceptional error occured");
        } catch (\Error $e) {
            dd("An error occured");
        }
    }
}
