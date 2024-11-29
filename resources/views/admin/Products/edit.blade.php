<!DOCTYPE html>
<html lang="en">

<head>
  <title>Product Update</title>
  @include('admin.css')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('admin.header')

  <!-- ======= Sidebar ======= -->
  @include('admin.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Update Product</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admindashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Update Product</li>
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

              <!-- Product Update Form -->
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Edit Product</h5>
                    
                    <!-- Form for updating a product -->
                    <form action="{{ url('updateproduct/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                    
                    
                      <!-- Product Name -->
                      <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
                      </div>
                    
                      <!-- Product Category -->
                      <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select" id="category_id" name="category_id" required>
                          <option value="">Select Category</option>
                          @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    
                      <!-- Product Price -->
                      <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
                      </div>
                    
                      <!-- Sale Price -->
                      <div class="mb-3">
                        <label for="sale_price" class="form-label">Sale Price</label>
                        <input type="number" class="form-control" id="sale_price" name="sale_price" value="{{ $product->sale_price }}">
                      </div>
                    
                      <!-- Product Stock -->
                      <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stock" name="stock" value="{{ $product->stock }}" required>
                      </div>
                    
                      <!-- Product Images -->
                      <div class="mb-3">
                        <label for="images" class="form-label">Product Images</label>
                        <input type="file" class="form-control" id="images" name="images[]" multiple>
                       
                      </div>
                    
                      <!-- Product Status -->
                      <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" id="status" name="status">
                          <option value="active" {{ $product->status == 'active' ? 'selected' : '' }}>Active</option>
                          <option value="inactive" {{ $product->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                      </div>
                    
                      <!-- Product Description -->
                      <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required>{{ $product->description }}</textarea>
                      </div>
                    
                      <!-- Submit Button -->
                      <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Product</button>
                      </div>
                    </form>
                    
                  </div>
                </div>
              </div><!-- End Product Update Form -->
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
