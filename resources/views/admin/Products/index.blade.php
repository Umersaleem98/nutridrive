<!DOCTYPE html>
<html lang="en">

<head>
  <title>Create Product</title>
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
    
              <!-- Product Form -->
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Add New Product</h5>
                    
                    <!-- Form for creating a new product -->
                    <form action="{{ url('store') }}" method="POST" enctype="multipart/form-data">
                      @csrf
                    
                      <!-- Product Name -->
                      <div class="mb-3">
                        <label for="name" class="form-label">Product Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                        @error('name')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    
                      <!-- Product Category -->
                      <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                          <option value="">Select Category</option>
                          @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                          @endforeach
                        </select>
                        @error('category_id')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    
                      <!-- Product Price -->
                      <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ old('price') }}" required>
                        @error('price')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    
                      <!-- Sale Price -->
                      <div class="mb-3">
                        <label for="sale_price" class="form-label">Sale Price</label>
                        <input type="number" class="form-control @error('sale_price') is-invalid @enderror" id="sale_price" name="sale_price" value="{{ old('sale_price') }}">
                        @error('sale_price')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    
                      <!-- Product Stock -->
                      <div class="mb-3">
                        <label for="stock" class="form-label">Stock</label>
                        <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock') }}" required>
                        @error('stock')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    
                      <!-- Product Images -->
                      <div class="mb-3">
                        <label for="images" class="form-label">Product Images</label>
                        <input type="file" class="form-control @error('images') is-invalid @enderror" id="images" name="images[]" multiple>
                        @error('images')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    
                      <!-- Product Status -->
                      <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                          <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                          <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        @error('status')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    
                      <!-- Product Description -->
                      <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description') }}</textarea>
                        @error('description')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    
                      <!-- Submit Button -->
                      <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Product</button>
                      </div>
                    </form>
                    
                  </div>
                </div>
              </div><!-- End Product Form -->
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
