<?php

namespace App\Http\Controllers\Backend;

use App\Customs\Utilities;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sermon;

class SermonController extends Controller
{
    public function create()
    {
        return view('admin.sermon.create', ['title' => 'Create Sermons']);
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
            'minister_name' => ['required', 'string', 'max:255'],
            'description' => ['required'],
            'cover_image' => ['required', 'image', 'max:2084']
        ]);
        try {
            $thumbnail = Utilities::createThumbnails($request->file('cover_image'), 'event_cover_images', '.webp', 370, 264);
            $cover_image = $request->file('cover_image')->store('/uploads/events_cover_images/'.date('Y/m'), 'public');
            if (Sermon::create(array_merge($data, ['cover_image' => $cover_image, 'thumbnail' => $thumbnail]))) {
                return back()->withSuccess('New sermon created successfully.');
            } else {
                return back()->withError('An error occured while creating sermon');
            }
        } catch (\Exception $e) {
            return back()->withError($e->getMessage());
        } catch (\Error $e) {
            return back()->withError('An error occured');
        }


    }
}
