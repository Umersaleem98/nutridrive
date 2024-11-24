<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.css')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('admin.header')

  <!-- ======= Sidebar ======= -->
  @include('admin.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Products List</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admindashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Products</li>
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
    
              <!-- Products List -->
              <div class="col-12">
                <div class="card recent-sales overflow-auto">
    
                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                      <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                      </li>
    
                      <li><a class="dropdown-item" href="#">Today</a></li>
                      <li><a class="dropdown-item" href="#">This Month</a></li>
                      <li><a class="dropdown-item" href="#">This Year</a></li>
                    </ul>
                  </div>
    
                  <div class="card-body">
                    <h5 class="card-title">Products List</h5>
    
                    <table class="table table-borderless datatable">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Category</th>
                          <th scope="col">Price</th>
                          <th scope="col">Sale Price</th> <!-- Sale Price Column -->
                          <th scope="col">Stock</th>
                          <th scope="col">Images</th> <!-- Images Column -->
                          <th scope="col">Status</th> <!-- Status Column -->
                          <th scope="col">Description</th>
                          <th scope="col">Actions</th> <!-- Actions Column -->
                        </tr>
                      </thead>
                      <tbody>
                        @if($products && $products->count() > 0)
                            @foreach($products as $product)
                                <tr>
                                    <th scope="row">{{ $product->id }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name ?? 'Uncategorized' }}</td>
                                    <td>${{ $product->price }}</td>
                                    <td>${{ $product->sale_price ?? 'N/A' }}</td>
                                    <td>{{ $product->stock }}</td>
                                    <td>
                                        @php
                                            // Decode the images JSON field and get the first image or use a default image
                                            $images = json_decode($product->images, true);
                                            $imagePath = isset($images[0]) ? 'products/' . $images[0] : 'templates/images/product_02.png'; // Fallback to default image
                                        @endphp
                                        <img src="{{ asset($imagePath) }}" alt="Product Image" width="50" height="50" class="img-thumbnail">
                                    </td>
                                    <td>
                                        <span class="badge {{ $product->status == 'active' ? 'bg-success' : 'bg-danger' }}">
                                            {{ ucfirst($product->status) }}
                                        </span>
                                    </td>
                                    <td>{{ \Illuminate\Support\Str::limit($product->description, 30) }}</td>
                                    <td>
                                        <a href="{{ url('edit/'.$product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="{{ url('delete/'.$product->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" class="text-center">No products available.</td>
                            </tr>
                        @endif
                    </tbody>
                    
                    </table>
                    
                    
    
                  </div>
    
                </div>
              </div><!-- End Products List -->
            </div>
          </div><!-- End Left side columns -->
    
        </div>
      </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  {{-- @include('admin.footer') --}}

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  @include('admin.script')

</body>

</html>
