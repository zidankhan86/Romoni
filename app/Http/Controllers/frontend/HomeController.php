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
    $categorySlug = $request->input('category');

    // Base query
    $productsQuery = Product::where('status', 'active')->with('category');

    // Search filter
    if ($query) {
        $productsQuery->where(function ($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%")
              ->orWhere('description', 'LIKE', "%{$query}%");
        });
    }

    // Category filter
    if ($categorySlug) {
        $productsQuery->whereHas('category', function ($q) use ($categorySlug) {
            $q->where('slug', $categorySlug);
        });
    }

    // Get filtered results
    $products = $productsQuery->latest()->get();

    // All categories for filter buttons
    $categories = Category::where('status', 1)->orderBy('name')->get();

    return view('frontend.pages.product', compact('products', 'query', 'categories', 'categorySlug'));
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

    public function popularProduct(){

        $data['popularProducts'] = Product::where('status','active') ->where('is_popular', 1)->get();

        return view('frontend.pages.offer',$data);
    }

    public function studioIndex(){

        return view('frontend.pages.studio');

    }

}
