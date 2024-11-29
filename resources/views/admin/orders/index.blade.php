<!DOCTYPE html>
<html lang="en">

<head>
    <title>Order List</title>
    @include('admin.css')
</head>

<body>

    <!-- ======= Header ======= -->
    @include('admin.header')

    <!-- ======= Sidebar ======= -->
    @include('admin.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Create Product</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admindashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Create Product</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->


        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-12">
                    <div class="row">
                        <!-- Order List -->
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Order List</h5>
                                    <!-- Add horizontal scroll -->
                                    <div class="table-responsive">
                                        <table class="table table-borderless datatable">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Customer Name</th>
                                                    <th>Customer Email</th>
                                                    <th>Customer Phone</th>
                                                    {{-- <th>Company Name</th> --}}
                                                    <th>Address</th>
                                                    <th>State</th>
                                                    <th>Postal Code</th>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th>Order Status</th>
                                                    <th>Product Image</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if($orders->count() > 0)
                                                    @foreach($orders as $order)
                                                        @foreach($order->items as $item)
                                                            <tr>
                                                                <th scope="row">{{ $order->id }}</th>
                                                                <td>{{ $order->user->name ?? 'N/A' }}</td>
                                                                <td>{{ $order->email ?? 'N/A' }}</td>
                                                                <td>{{ $order->phone ?? 'N/A' }}</td>
                                                                {{-- <td>{{ $order->company_name ?? 'N/A' }}</td> --}}
                                                                <td>{{ $order->address ?? 'N/A' }}</td>
                                                                <td>{{ $order->state ?? 'N/A' }}</td>
                                                                <td>{{ $order->postal_code ?? 'N/A' }}</td>
                                                                <td>{{ $item->product->name ?? 'Unknown Product' }}</td>
                                                                <td>{{ $item->price }} RS</td>
                                                                <td>{{ $item->quantity }}</td>
                                                                <td>{{ $item->quantity * $item->price }} RS</td>
                                                                <td>
                                                                    <span class="badge 
                                                                        {{ 
                                                                            $order->status == 'pending' ? 'bg-primary' : 
                                                                            ($order->status == 'cancelled' ? 'bg-danger' : 
                                                                            ($order->status == 'delivered' ? 'bg-success' : 'bg-secondary')) 
                                                                        }}">
                                                                        {{ ucfirst($order->status) }}
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    @php
                                                                        // Decode the images JSON field
                                                                        $images = json_decode($item->product->images, true);
                
                                                                        // Check if images exist and set the image path
                                                                        $imagePath = (!empty($images) && isset($images[0])) 
                                                                            ? 'products/' . $images[0] 
                                                                            : 'templates/images/product_02.png'; // Fallback to default image
                                                                    @endphp
                                                                    <!-- Display the image -->
                                                                    <img src="{{ asset($imagePath) }}" alt="Product Image" 
                                                                         width="50" height="50" 
                                                                         class="img-thumbnail" style="object-fit: cover;">
                                                                </td>
                                                                <td>
                                                                    <a href="{{ url('delivered', $order->id) }}" class="btn btn-warning btn-sm mb-2">Delivered</a>
                                                                    <a href="{{ url('canceled', $order->id) }}" class="btn btn-danger btn-sm">Canceled</a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endforeach
                                                @else
                                                    <tr>
                                                        <td colspan="15" class="text-center">No orders available.</td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div> <!-- End of table-responsive -->
                                </div>
                            </div>
                        </div><!-- End Order List -->
                    </div>
                </div><!-- End Left side columns -->
                
            </div>
        </section>

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    {{-- @include('admin.footer') --}}

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('admin.script')

</body>

</html>
