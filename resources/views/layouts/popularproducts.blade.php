<style>
    /* Hover effect for product items */
    .item {
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease-in-out;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Default card shadow */
    }
    
    .item img {
        transition: transform 0.3s ease;
        width: 100%;  /* Make the image fill the container */
        height: 200px; /* Set a fixed height for the images */
        object-fit: cover; /* Ensures the image covers the area while maintaining its aspect ratio */
    }
    
    .item:hover img {
        transform: scale(1.1); /* Slight zoom effect */
    }
    
    .item:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15); /* Stronger shadow on hover */
    }
    
    .item .tag {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: red;
        color: #fff;
        padding: 5px 10px;
        font-size: 14px;
        font-weight: bold;
    }
    
    .item h3 {
        font-size: 1.1rem; /* Font size for the product name */
    }
    
    .item p.price {
        font-size: 1rem; /* Font size for the price */
        color: #333; /* Color for the price text */
    }
</style>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="title-section text-center col-12">
                <h2 class="text-uppercase" style="font-size: 2.5rem; font-weight: bold;">Popular Products</h2>
            </div>
        </div>

        <div class="row">
            @foreach ($products as $item)
                @if ($item->sale_price)  <!-- Only show products with a sale price -->
                    <div class="col-sm-6 col-md-4 col-lg-3 text-center item mb-4">
                        <span class="tag">Sale</span>
                        <a href="{{ url('storesingle/' . $item->id) }}">
                            <!-- Fetching the image dynamically from the 'public/products' directory -->
                            @php
                                $images = json_decode($item->images);
                                $imagePath = (!empty($images) && is_array($images)) ? 'products/' . $images[0] : 'templates/images/product_02.png';
                            @endphp
                            <img src="{{ asset($imagePath) }}" 
                                 alt="{{ $item->name }}" 
                                 class="img-fluid">
                        </a>

                        <h3 class="text-dark mt-3">
                            <a href="{{ url('storesingle/' . $item->id) }}">{{ $item->name }}</a>
                        </h3>
                        <p class="price">
                            <del>{{ $item->price }}</del> &mdash; {{ $item->sale_price }} Rs
                        </p>
                    </div>
                @endif
            @endforeach
        </div>

        <!-- Pagination if using pagination in the route -->
        <div class="row mt-5">
            <div class="col-12 text-center">
                <a href="{{ url('store') }}" class="btn btn-primary px-4 py-3 text-light">View All Products</a>
            </div>
        </div>
    </div>
</div>
