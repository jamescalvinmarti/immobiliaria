<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Zone;
use App\Property;
use App\Message;

class FrontendController extends Controller
{
    /**
     * Show the application home.
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        $categories = Category::all();
        $zones = Zone::all();
        $properties = Property::where('published', true)->get();
        return view('home', compact('categories', 'zones', 'properties'));
    }

    /**
     * Show the contact view.
     *
     * @return \Illuminate\View\View
     */
    public function contact()
    {
        return view('frontend.contact');
    }

    /**
     * Store message.
     *
     * @return Response
     */
    public function storeMessage(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'message' => ['required', 'string'],
        ]);

        $message = new Message();
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();

        return redirect(route('contact'))->withStatus(__('Missatge enviat correctament.'));
    }
}
