<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Sermon;
use App\Models\Contact;
use App\Models\Product;
use App\Models\LiveStream;
use App\Models\ChurchEvent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function welcome()
    {
        try {
            $livestream = LiveStream::latest()->first();
            return view('welcome', compact('livestream'));
        } catch (\Exception $e) {
            dd("ooOps! An exceptional error occured");
        }
    }

    public function products()
    {
        // dd(Session::get('cartItems'));
        $products = Product::latest()->paginate(20);
        return view('products.index', compact('products'));
    }

    public function cart()
    {
        // dd(Session::get('cartItems'));
        $products = Product::latest()->paginate(20);
        return view('products.cart', compact('products'));
    }

    public function about()
    {
        return view('about');
    }

    public function sermon()
    {
        $sermon = Sermon::latest()->get();
        return view('sermon', ['sermons' => $sermon]);
    }

    public function sermon_read($slug)
    {
        $sermon = Sermon::where('slug',$slug)->get();
        return view('sermon-read',['sermon' => $sermon]);
    }

    public function events()
    {
        $event = ChurchEvent::latest()->get();
        return view('event', ['events'=> $event]);
    }

    public function event_read($slug)
    {
        $event = ChurchEvent::where('slug',$slug)->get();
        return view('event-read',['event'=>$event]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function save_contact(Request $request)
    {
        $saveContact = new Contact;
        $saveContact->name = $request->name;
        $saveContact->email = $request->email;
        $saveContact->message = $request->message;
        if ($saveContact->save()) {
            return redirect('/')->with('success','Message sent successfully.');
        } else {
            return redirect('/')->with('error','An Error Occured.');
        }

    }

    public function checkout()
    {
        // dd(Session::get('cartItems'));
        $products = Product::latest()->paginate(20);
        return view('products.checkout', compact('products'));
    }

    public function thankyou()
    {
        return view('products.thankyou');
    }
}
