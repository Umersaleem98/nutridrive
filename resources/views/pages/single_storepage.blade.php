<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
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
          <div class="col-md-5 mr-auto">
            <div class="border text-center">
              <img src="{{ asset('templates/images/product_07_large.png') }}" alt="Image" class="img-fluid"
                style="height: 400px;">
            </div>
          </div>
          <div class="col-md-6">
            <h2 class="text-black">{{ $products->name }}</h2>
            <p>{{ $products->description }}</p>

            <p><del>{{ $products->price }}</del> <strong class="text-primary h4">{{ $products->price }}</strong></p>

            <!-- Quantity selection -->
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 220px;">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                </div>
                <input type="number" name="quantity" class="form-control text-center" value="1" min="1"
                  id="product-quantity" aria-label="Quantity" aria-describedby="button-addon1">
                <div class="input-group-append">
                  <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                </div>
              </div>
            </div>

            <!-- Add to Cart Form -->
            <form action="{{ route('add.to.cart', $products->id) }}" method="POST">
              @csrf
              <input type="hidden" name="quantity" value="1" id="quantity-input">
              <p><button type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</button></p>
            </form>

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
  </script>

</body>

</html>
