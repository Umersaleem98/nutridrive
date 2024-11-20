
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
                <div class="col-sm-6 col-lg-4 text-center item mb-4">
                    <span class="tag">Sale</span>
                    <a href="{{ url('storesingle/' . $item->id) }}">
                        <img src="templates/images/product_01.png" alt="Image">
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

  