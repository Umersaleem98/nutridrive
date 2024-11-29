<!DOCTYPE html>
<html lang="en">

<head>
  <title>Category List</title>
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
                    
                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td>
                                        <a href="{{ url('categories_edit', $category->id) }}" class="btn btn-warning">Edit</a>
                                        <a href="{{ url('categories_delete', $category->id) }}" class="btn btn-danger">Delete</a>
                                       
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
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
