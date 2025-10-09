<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Category;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{


    public function index(Request $request)
    {
        $categories = Category::latest()->take(10)->get();

        // Check if a category filter is applied via slug
        if ($request->has('category')) {
            $selectedCategory = Category::where('slug', $request->category)->first();

            if ($selectedCategory) {
                $products = Product::where('category_id', $selectedCategory->id)
                                   ->where('status', 'active')
                                   ->get();
            } else {
                $products = collect();
            }
        } else {
            $products = Product::where('status', 'active')->get();
        }

        $testimonials = Testimonial::where('is_verified', true)->get();
        return view('frontend.pages.home', compact('products', 'categories', 'testimonials'));
    }



    public function product(Request $request)
    {
        $query = $request->input('query');

        if ($query) {
            $products = Product::where('name', 'LIKE', "%{$query}%")
                ->orWhere('description', 'LIKE', "%{$query}%")
                ->get();
        } else {
            $products = Product::where('status','active')->get();
        }
        $categories = Category::latest()->take(10)->get();
        return view('frontend.pages.product', compact('products', 'query','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function details($slug)
    {

        $data['product'] = Product::with('images')->where('slug', $slug)->firstOrFail();

        return view('frontend.components.product.details',$data);
    }


    // public function latestProduct(){

    //     $data['latestProducts'] = Product::where('status','active')->latest()->take(12)->get();

    //     return view('frontend.new_arrival.index',$data);
    // }

    // public function popularProduct(){

    //     $data['popularProducts'] = Product::where('status','active') ->where('is_popular', 1)->get();

    //     return view('frontend.popular_product.index',$data);
    // }

    public function studioIndex(){

        return view('frontend.pages.studio');

    }

}
