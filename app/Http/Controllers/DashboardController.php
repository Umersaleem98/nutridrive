<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the total number of orders
        $totalOrders = Order::count();

        // Get the number of pending orders
        $pendingOrders = Order::where('status', 'pending')->count();

        // Get the number of delivered orders
        $deliveredOrders = Order::where('status', 'delivered')->count();

        // Pass the data to the view
        return view('dashboard', compact('totalOrders', 'pendingOrders', 'deliveredOrders'));
    }
}
