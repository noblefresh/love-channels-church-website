<?php

namespace App\Http\Controllers\Backend;

use App\Customs\Utilities;
use App\Http\Controllers\Controller;
use App\Models\ChurchEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ChurchEventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $events = ChurchEvent::latest()->paginate(20);
            $title = 'View Events';
            return view('admin.events.index', compact('events', 'title'));
        } catch (Exception $e) {
            
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create', ['title' => 'Create Events']);
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
            'name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'string', 'max:255'],
            'end_date' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'cover_image' => ['required', 'image', 'max:2084']
        ]);
        try {
            $thumbnail = Utilities::createThumbnails($request->file('cover_image'), 'event_cover_images', '.webp', 370, 264);
            $cover_image = $request->file('cover_image')->store('/uploads/events_cover_images/'.date('Y/m'), 'public');
            if (ChurchEvent::create(array_merge($data, ['cover_image' => $cover_image, 'thumbnail' => $thumbnail]))) {
                return back()->withSuccess('New event created successfully.');
            } else {
                return back()->withError('An error occured while creating event');
            }
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        } catch (\Error $e) {
            return back()->withError('An error occured');
        }
        
        
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ChurchEvent $event)
    {
        try {
            $title = 'Edit Event >> '. $event->name; 
            return view('admin.events.edit', compact('event', 'title'));
        } catch (\Exception $e) {
            dd("An exceptional error occured");
        } catch (\Error $e) {
            dd("An error occured");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChurchEvent $event)
    {
        $data = $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'start_date' => ['required', 'string', 'max:255'],
            'end_date' => ['required', 'string', 'max:255'],
            'description' => ['required']
        ]);
        try {
            if ($request->hasFile('cover_image')) {
                $thumbnail = Utilities::createThumbnails($request->file('cover_image'), 'event_cover_images', '.webp', 370, 264);
                $cover_image = $request->file('cover_image')->store('/uploads/events_cover_images/'.date('Y/m'), 'public');
                if ($event->update(array_merge($data, ['cover_image' => $cover_image, 'thumbnail' => $thumbnail]))) {
                    return back()->withSuccess('Event updated successfully.');
                } else {
                    return back()->withError('An error occured while creating event');
                }
            }
            if ($event->update($data)) {
                return back()->withSuccess('Event updated successfully.');
            } else {
                return back()->withError('An error occured while updating event');
            }
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        } catch (\Error $e) {
            return back()->withError('An error occured');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChurchEvent $event)
    {
        try {
            if ($event->delete()) {
                return back()->withSuccess("Event deleted successfully.");
            } else {
                return back()->withError("Error occured while deleting event.");
            }
        } catch (\Exception $e) {
            dd("An exceptional error occured");
        } catch (\Error $e) {
            dd("An error occured");
        }
    }
}
