<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
    <style>
        /* CSS to truncate the description */
        .description {
            display: -webkit-box;
            -webkit-line-clamp: 4;
            /* Limit to 4 lines */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .read-more-btn {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            padding: 0;
            font-size: 1rem;
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
                        <a href="{{ url('/') }}">Home</a> <span class="mx-2 mb-0">/</span>
                        <a href="{{ url('shop') }}">Store</a> <span class="mx-2 mb-0">/</span>
                        <strong class="text-black">{{ $products->name }}</strong>
                    </div>
                </div>
            </div>
        </div>

        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 mr-auto">
                        <div class="border text-center">
                            @php
                                $images = json_decode($products->images);
                                $imagePath = (!empty($images) && is_array($images)) ? 'products/' . $images[0] : 'templates/images/product_02.png';
                            @endphp
                            <img src="{{ asset($imagePath) }}" alt="{{ $products->name }}" class="img-fluid" style="height: 250px;">
                        </div>
                    </div>
                    
                    <div class="col-md-7">
                        <h2 class="text-black">{{ $products->name }}</h2>
                        <h5 class="text-black">{{ $products->subitile }}</h5>


                        <!-- Description Section -->
                        <p id="description" class="description">
                            {{ $products->description }}
                        </p>
                        <button id="read-more-btn" class="read-more-btn">Read More</button>

                        <p>
                            {{-- <del>{{ $products->price }}</del> --}}
                            <strong class="text-primary h4">{{ $products->price }} RS</strong>
                        </p>

                        <!-- Quantity Selection -->
                        <div class="mb-5">
                            <div class="input-group mb-3" style="max-width: 220px;">
                                <div class="input-group-prepend">
                                    <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                </div>
                                <input type="number" name="quantity" class="form-control text-center" value="1"
                                    min="1" id="product-quantity" aria-label="Quantity"
                                    aria-describedby="button-addon1">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                </div>
                            </div>
                        </div>

                        <!-- Add to Cart Form -->
                        <form action="{{ route('add.to.cart', $products->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="quantity" value="1" id="quantity-input">

                            @guest
                                <!-- Button for guests -->
                                <button type="button" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary"
                                    data-toggle="modal" data-target="#loginModal">
                                    Add To Cart
                                </button>
                            @else
                                <!-- Button for authenticated users -->
                                <button type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">
                                    Add To Cart
                                </button>
                            @endguest
                        </form>


                        <!-- Login Modal -->
                        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog"
                            aria-labelledby="loginModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="loginModalLabel">Login Required</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        You need to log in to add items to your cart.
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="mt-5">
                            <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    {{-- <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                                        aria-controls="pills-home" aria-selected="true">Ordering Information</a> --}}
                                </li>
                                <li class="nav-item">
                                    {{-- <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                                        aria-controls="pills-profile" aria-selected="false">Specifications</a> --}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footer')
    </div>

    @include('layouts.script')

    <script>
        // Update quantity input value when buttons are clicked
        document.querySelector('.js-btn-minus').addEventListener('click', function() {
            let quantityInput = document.querySelector('#product-quantity');
            let currentQuantity = parseInt(quantityInput.value);
            if (currentQuantity > 1) {
                quantityInput.value = currentQuantity - 1;
                document.querySelector('#quantity-input').value = quantityInput.value;
            }
        });

        document.querySelector('.js-btn-plus').addEventListener('click', function() {
            let quantityInput = document.querySelector('#product-quantity');
            let currentQuantity = parseInt(quantityInput.value);
            quantityInput.value = currentQuantity + 1;
            document.querySelector('#quantity-input').value = quantityInput.value;
        });

        // Toggle Read More / Read Less
        document.addEventListener('DOMContentLoaded', function() {
            const description = document.getElementById('description');
            const readMoreBtn = document.getElementById('read-more-btn');

            readMoreBtn.addEventListener('click', function() {
                if (description.classList.contains('description')) {
                    description.classList.remove('description');
                    readMoreBtn.textContent = 'Read Less';
                } else {
                    description.classList.add('description');
                    readMoreBtn.textContent = 'Read More';
                }
            });
        });
    </script>
</body>

</html>
