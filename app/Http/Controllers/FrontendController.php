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

    /**
     * Show the properties.
     *
     * @return \Illuminate\View\View
     */
    public function properties()
    {
        $categories = Category::all();
        $zones = Zone::all();
        $properties = Property::where('published', true)->paginate(20);
        return view('frontend.properties', compact('categories', 'zones', 'properties'));
    }

    /**
     * Search properties.
     *
     * @return Response
     */
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $output = "";
            if ($request->status == 'all') {
                $properties = Property::where('city', 'LIKE', '%' . $request->city . "%")
                    ->where('category_id', 'LIKE', '%' . $request->category . '%')
                    ->where('zone_id', 'LIKE', '%' . $request->zone . '%')
                    ->paginate(20);
            } else {
                $properties = Property::where('city', 'LIKE', '%' . $request->city . "%")
                    ->where('category_id', 'LIKE', '%' . $request->category . '%')
                    ->where('zone_id', 'LIKE', '%' . $request->zone . '%')
                    ->where('status', $request->status)
                    ->paginate(20);
            }

            if ($properties) {
                $output .= '<div class="col-lg-12 properties-container">';
                foreach ($properties as $property) {
                    $output .= '<div class="property-container">';
                    $output .= '<div class="image-container">';
                    $output .= '<img src="' . $property->images->first()->path . '">';
                    $output .= '</div>';
                    $output .= '<div class="property-info">';
                    $output .= '<div class="row">';
                    $output .= '<div class="col-md-12">';
                    $output .= '<div class="floating-info">';
                    $output .= '<span class="price">' . number_format($property->price, 0, ',', '.') . ' €' . ($property->status ? '' : '/M') . '</span>';
                    $output .= '<span class="status">' . ($property->status ? 'En Venta' : 'Lloguer') . '</span>';
                    $output .= '<span class="surface">' . $property->surface . '&#13217;</span>';
                    $output .= '</div>';
                    $output .= '<div class="info-container">';
                    $output .= '<span class="category"><i class="fas fa-building"></i> ' . $property->category->name . '</span>';
                    $output .= '<span class="zone">' . $property->zone->name . '</span>';
                    $output .= '</div>';
                    $output .= '<h5 class="name">' . ucfirst($property->name) . '</h5>';
                    $output .= '<span class="city"><i class="fas fa-map-marker-alt"></i> ' . ucfirst($property->city) . '</span> <span class="address">' . $property->address . '</span>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                }
                $output .= '</div>';
                $output .= '<div class="ajax-pagination">';
                $output .= $properties->links();
                $output .= '</div>';
            }
            return Response($output);
        }
    }
}
