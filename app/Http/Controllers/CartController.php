<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
   public function addToCart($productId){
    $Product = Product::find($productId);

    $userId = auth()->user()->id;

    // Add the product to the cart
    \Cart::session($userId)->add(array(
        'id' => $Product->id, // Use the product's actual ID as the cart item ID
        'name' => $Product->name,
        'price' => $Product->price,
        'quantity' => 1, // Set the initial quantity as 1
        'attributes' => array(),
        'associatedModel' => $Product

    ));

        return back()->with('success','Product added to the cart');

   }



   public function removeFromCart(Product $product)
   {

     // Retrieve the currently authenticated user
     $userId = auth()->user()->id;

     // Get the row ID of the product in the cart
     $rowId = $product->id; // You need to use the row ID

     // Remove the product from the cart
     \Cart::session($userId)->remove($rowId);


       return redirect()->back()->with('success', 'Product removed from cart.');
   }

   public function updateCart(Request $request, $productId)
{
    $userId = auth()->user()->id;

    // Validate quantity
    $request->validate([
        'quantity' => 'required|integer|min:1|max:10',
    ]);

    // Update the quantity directly (replace, not add)
    \Cart::session($userId)->update($productId, [
        'quantity' => [
            'relative' => false, // false = set new quantity instead of adding
            'value' => $request->quantity,
        ],
    ]);

    return back()->with('success', 'Cart updated successfully!');
}

   public function showCart()
   {

      // Retrieve the currently authenticated user
      $userId = auth()->user();

      // Get the cart contents for the user
      $cartContents = \Cart::session(auth()->user()->id)->getContent();

      $subTotal = \Cart::session($userId)->getSubTotal();

        // Retrieve the total for the specific user's cart
        //$total = \Cart::session($userId)->getTotal();
        $total = \Cart::getTotal();



        $totalPrice = 0; // Initialize the total price

                foreach ($cartContents as $item) {
            $itemTotalPrice = $item->price * $item->quantity;
            $totalPrice += $itemTotalPrice;
            $image = $item->image;
        }

       return view('frontend.pages.add-to-cart', compact('cartContents','userId','subTotal','total','totalPrice'));
   }


   public function clearCart()
   {
       // Retrieve the currently authenticated user
       $user = auth()->user();

       // Clear the cart for the user
       \Cart::session($user->id)->clear();

       return redirect()->route('cart.show')->with('success', 'Cart cleared successfully.');
   }




 public function updateTime(Request $request, $productId)
{
    $userId = auth()->user()->id;

    // Validate the time slot
    $request->validate([
        'time' => 'required|in:' . implode(',', array_map(fn($h) => sprintf('%02d:00', $h), range(10, 17))),
    ]);

    // Check if the cart item exists
    $cartItem = \Cart::session($userId)->get($productId);
    if (!$cartItem) {
        return redirect()->back()->with('error', 'Cart item not found.');
    }

    // Update the cart item's attributes, preserving existing ones
    \Cart::session($userId)->update($productId, [
        'attributes' => array_merge($cartItem->attributes->toArray(), [
            'time' => $request->time,
        ]),
    ]);

    return redirect()->back()->with('success', 'Time updated to ' . \Carbon\Carbon::createFromFormat('H:i', $request->time)->format('g A') . ' successfully.');
}

public function updateDate(Request $request, $id)
{
    $userId = auth()->user()->id;

    // Validate the request
    $request->validate([
        'date' => [
            'required',
            'date',
            function ($attribute, $value, $fail) {
                $today = \Carbon\Carbon::today();

                // Parse the date from d-m-Y format
                try {
                    $selectedDate = \Carbon\Carbon::createFromFormat('d-m-Y', $value);
                } catch (\Exception $e) {
                    $fail('Invalid date format.');
                    return;
                }

                // Check if date is in the past
                if ($selectedDate->lt($today)) {
                    $fail('The selected date cannot be in the past.');
                }

                // Check if date is more than 31 days from today
                if ($selectedDate->gt($today->copy()->addDays(31))) {
                    $fail('The selected date cannot be more than 31 days from today.');
                }
            },
        ],
    ]);

    // Check if the cart item exists
    $cartItem = \Cart::session($userId)->get($id);
    if (!$cartItem) {
        return redirect()->back()->with('error', 'Cart item not found.');
    }

    // Update the cart item's attributes, preserving existing ones
    \Cart::session($userId)->update($id, [
        'attributes' => array_merge($cartItem->attributes->toArray(), [
            'date' => \Carbon\Carbon::createFromFormat('d-m-Y', $request->date)->format('Y-m-d'), // Store in Y-m-d format
        ]),
    ]);

    return redirect()->back()->with('success', 'Date updated to ' . $request->date . ' successfully.');
}

}
