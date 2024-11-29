<!DOCTYPE html>
<html lang="en">

<head>
  <title>Update Category</title>
  @include('admin.css')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('admin.header')

  <!-- ======= Sidebar ======= -->
  @include('admin.sidebar')

  <main id="main" class="main">

    <div class="pagetitle">
        <h1>Edit Category</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('admindashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('categories') }}">Categories</a></li>
            <li class="breadcrumb-item active">Edit Category</li>
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
    
              <!-- Category Edit Form -->
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Edit Category</h5>
                    
                    <!-- Edit Category Form -->
                    <form action="{{ url('update_category', $category->id) }}" method="POST">
                      @csrf
                     

                      <div class="mb-3">
                        <label for="category_name" class="form-label">Category Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="category_name" name="name" value="{{ old('name', $category->name) }}" required>
                        @error('name')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>

                      <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4">{{ old('description', $category->description) }}</textarea>
                        @error('description')
                          <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>

                      <button type="submit" class="btn btn-primary">Update Category</button>
                    </form>
                    <!-- End Edit Category Form -->
                  </div>
                </div>
              </div><!-- End Category Edit Form -->
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
