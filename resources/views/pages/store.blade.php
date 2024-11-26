<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
    <style>
        /* Set custom font for the page */
        body {
            font-family: 'Arial', sans-serif;
            /* Replace with your preferred font */
        }

        /* Optional: Adding a shadow to the card */
        .product-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            /* Adds a subtle shadow */
            transition: box-shadow 0.3s ease-in-out;
            /* Smooth transition */
        }

        .product-card:hover {
            box-shadow: 0 8px 16px rgba(228, 111, 111, 0.2);
            /* Deeper shadow on hover */
        }

        .product-card img {
        width: 100%; /* Make the image take the full width of its container */
        height: auto; /* Maintain aspect ratio */
        object-fit: contain; /* Ensure the image fits without distortion */
        max-height: 200px; /* Optional: Limit the height for consistency */
    }
    </style>
</head>

<body>

    <div class="site-wrap">
        @include('layouts.header')

        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 mb-0">
                        <a href="index.html">Home</a>
                        <span class="mx-2 mb-0">/</span>
                        <strong class="text-black">Store</strong>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row">
                    <!-- Search Products -->
                    <div class="col-lg-6">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Search Products</h3>
                        <form method="GET" action="{{ url('store') }}">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Search by name or description" value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>
                    </div>

                    <!-- Filter by Reference -->
                    <div class="col-lg-6">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Reference</h3>
                        <form id="reference-filter-form" method="GET" action="{{ url('store') }}">
                            <button type="button" class="btn btn-secondary btn-md dropdown-toggle px-4"
                                id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                                <a class="dropdown-item" href="#" onclick="applySort('relevance')">Relevance</a>
                                <a class="dropdown-item" href="#" onclick="applySort('name_asc')">Name, A to Z</a>
                                <a class="dropdown-item" href="#" onclick="applySort('name_desc')">Name, Z to
                                    A</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick="applySort('price_asc')">Price, low to
                                    high</a>
                                <a class="dropdown-item" href="#" onclick="applySort('price_desc')">Price, high to
                                    low</a>
                            </div>
                            <input type="hidden" name="sort" id="sort-input" />
                        </form>
                    </div>
                </div>

                <script>
                    function applySort(value) {
                        document.getElementById('sort-input').value = value;
                        document.getElementById('reference-filter-form').submit();
                    }
                </script>

                <div class="row mt-5">
                    @foreach ($products as $item)
                        <div class="col-md-3 text-center item mb-4 product-card">
                            @if ($item->sale_price)
                                <span class="tag">Sale</span>
                            @else
                                <span class=""></span>
                            @endif

                            <!-- Display Product Images -->
                            <a href="{{ url('storesingle/' . $item->id) }}">
                                @php
                                    $images = json_decode($item->images);
                                    $imagePath =
                                        !empty($images) && is_array($images)
                                            ? 'products/' . $images[0]
                                            : 'templates/images/product_02.png';
                                @endphp
                                <img src="{{ asset($imagePath) }}" alt="{{ $item->name }}" class="img-fluid">
                            </a>

                            <!-- Product Details -->
                            <h3 class="text-dark">
                                <a href="{{ url('storesingle/' . $item->id) }}">{{ $item->name }}</a>
                            </h3>
                            <h6 class="text-dark">{{ $item->subitile }}</h6>
                            <p class="price">
                                @if ($item->sale_price)
                                    <del>{{ $item->price }} Rs</del> &mdash; {{ $item->sale_price }} Rs
                                @else
                                    {{ $item->price }} Rs
                                @endif
                            </p>
                        </div>
                    @endforeach
                </div>


                <div class="row mt-5">
                    <div class="col-md-12 text-center">
                        {{ $products->links('pagination::bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>

        @include('layouts.footer')
    </div>

    @include('layouts.script')

</body>

</html>
