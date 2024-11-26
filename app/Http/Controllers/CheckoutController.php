<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Cart;
use App\Models\Order;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function checkoutpage()
    {
        // Get the orders of the currently authenticated user with a specific status
        $orders = Order::where('user_id', Auth::id())
                   ->with('items.product') // Load items and their associated products
                   ->get();

    return view('pages.checkout', compact('orders'));
    }


    public function checkout(Request $request)
{
    DB::beginTransaction();

    try {
        // Create a new order
        $order = Order::create([
            'user_id' => $request->user()->id, // Assuming the user is logged in
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'company_name' => $request->input('company_name'),
            'address' => $request->input('address'),
            'state' => $request->input('state_country'),
            'postal_code' => $request->input('postal_zip'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'order_notes' => $request->input('order_notes'),
            'status' => 'pending', // Default status
        ]);

        $cart = Cart::where('user_id', auth()->user()->id)->first();

        // Get cart items for the user
        $cartItems = CartItem::where('cart_id', $cart->id)->get();

        // Transfer cart items to order items
        $orderTotal = 0; // Initialize order total
        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->price,
                'total' => $cartItem->total,
            ]);

            // Add to order total
            $orderTotal += $cartItem->total;
        }

        // Update the order with the total amount
        $order->update([
            'total' => $orderTotal,
        ]);

        // Clear the cart after checkout
        CartItem::where('cart_id', $cart->id)->delete();

        DB::commit();

        return redirect()->back()->with('success', 'Your Order is place successful!');
    } catch (Exception $e) {
        DB::rollBack();
        return response()->json(['success' => false, 'message' => 'An error occurred during checkout.', 'error' => $e->getMessage()]);
    }
}



    // public function placeOrder(Request $request)
    // {
    //     // Validate billing and shipping details
    //     $validated = $request->validate([
    //         'c_fname' => 'required|string',
    //         'c_lname' => 'required|string',
    //         'c_address' => 'required|string',
    //         'c_email_address' => 'required|email',
    //         'c_phone' => 'required|string',
    //         // Add other required fields here
    //     ]);

    //     // Create the order
    //     $order = Order::create([
    //         'user_id' => auth()->id(),
    //         'first_name' => $validated['c_fname'],
    //         'last_name' => $validated['c_lname'],
    //         'address' => $validated['c_address'],
    //         'email' => $validated['c_email_address'],
    //         'phone' => $validated['c_phone'],
    //         // Add other fields as needed
    //     ]);

    //     // Get cart items and create order items
    //     $cartItems = CartItem::where('user_id', auth()->id())->get();
    //     foreach ($cartItems as $cartItem) {
    //         OrderItem::create([
    //             'order_id' => $order->id,
    //             'product_id' => $cartItem->product_id,
    //             'quantity' => $cartItem->quantity,
    //             'price' => $cartItem->price,
    //         ]);
    //     }

    //     // Clear the cart
    //     CartItem::where('user_id', auth()->id())->delete();

    //     // Redirect to thank you page
    //     return redirect()->route('thankyou');
    // }
}
