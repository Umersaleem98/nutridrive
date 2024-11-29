<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderDashboardController extends Controller
{
    public function show()
    {
        // Fetch orders with related user, items, and products
        $orders = Order::with(['user', 'items.product'])->get();
        
        // Pass the orders to the view
        return view('admin.orders.index', compact('orders'));
    }


    public function markAsDelivered($id)
    {
        // Find the order by ID
        $order = Order::find($id);
    
        // Check if the order exists
        if ($order) {
            // Update the status of the order to 'delivered'
            $order->status = 'delivered';
            
            // Save the changes
            $order->save();
    
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Order marked as delivered!');
        } else {
            // If the order is not found, redirect with an error message
            return redirect()->back()->with('error', 'Order not found!');
        }
    }
   
    public function markAsCanceled($id)
    {
        // Find the order by ID
        $order = Order::find($id);
    
        // Check if the order exists
        if ($order) {
            // Update the status of the order to 'delivered'
            $order->status = 'canceled';
            
            // Save the changes
            $order->save();
    
            // Redirect back with a success message
            return redirect()->back()->with('success', 'Order marked as canceled!');
        } else {
            // If the order is not found, redirect with an error message
            return redirect()->back()->with('error', 'Order not found!');
        }
    }
    

}
