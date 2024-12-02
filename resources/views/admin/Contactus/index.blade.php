<!DOCTYPE html>
<html lang="en">

<head>
    <title>Contact List</title>
    @include('admin.css')
</head>

<body>

    <!-- ======= Header ======= -->
    @include('admin.header')

    <!-- ======= Sidebar ======= -->
    @include('admin.sidebar')

    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Contact us</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admindashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Contact us</li>
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
                                    <h5 class="card-title">Contact-us Messages</h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Subject</th>
                                            <th>Message</th>
                                            <th>Actions</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($contact as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td> <!-- Displays the row number -->
                                                <td>{{ $item->first_name }}</td>
                                                <td>{{ $item->last_name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->subject }}</td>
                                                <td>{{ $item->message }}</td>
                                                <td>
                                                    {{-- <a href="{{ url('view/'.$item->id) }}" class="btn btn-info btn-sm">View</a> --}}
                                                    <a href="{{ url('delete/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
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

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    @include('admin.script')

</body>

</html>
