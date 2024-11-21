<style>
  /* Hover effect for product items */
.item {
    position: relative;
    overflow: hidden;
    transition: all 0.3s ease-in-out;
}

.item img {
    transition: transform 0.3s ease;
}

.item:hover img {
    transform: scale(1.1); /* Slight zoom effect */
}

.item:hover {
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Shadow on hover */
}

.item .tag {
    position: absolute;
    top: 10px;
    left: 10px;
    background-color: red;
    color: white;
    padding: 5px 10px;
    font-size: 14px;
    font-weight: bold;
}

</style>
<div class="site-section">
  <div class="container">
      <div class="row">
          <div class="title-section text-center col-12">
              <h2 class="text-uppercase">Popular Products</h2>
          </div>
      </div>

      <div class="row">
          @foreach ($products as $item)
              @if ($item->sale_price)
                  <div class="col-sm-6 col-md-4 col-lg-3 text-center item mb-4">
                      <span class="tag">Sale</span>
                      <a href="{{ url('storesingle/' . $item->id) }}">
                          <img src="templates/images/product_01.png" alt="Image" class="img-fluid">
                      </a>
                      <h3 class="text-dark">
                          <a href="{{ url('storesingle/' . $item->id) }}">{{ $item->name }}</a>
                      </h3>
                      <p class="price">
                          <del>{{ $item->price }}</del> &mdash; {{ $item->sale_price }} Rs
                      </p>
                  </div>
              @endif
          @endforeach
      </div>

      <div class="row mt-5">
          <div class="col-12 text-center">
              <a href="{{ url('store') }}" class="btn btn-primary px-4 py-3">View All Products</a>
          </div>
      </div>
  </div>
</div>
