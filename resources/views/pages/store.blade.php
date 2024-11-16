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
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Store</strong></div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container">
        
        <div class="row">
          <!-- Filter by Price -->
          <div class="col-lg-6">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
              <form id="price-filter-form" method="GET" action="{{ url('store') }}">
                  <div id="slider-range" class="border-primary"></div>
                  <input type="text" name="price_range" id="amount" class="form-control border-0 pl-0 bg-white" readonly />
                  <input type="hidden" name="min_price" id="min-price" />
                  <input type="hidden" name="max_price" id="max-price" />
                  <button type="submit" class="btn btn-primary mt-2">Apply</button>
              </form>
          </div>
      
          <!-- Filter by Reference -->
          <div class="col-lg-6">
              <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Reference</h3>
              <form id="reference-filter-form" method="GET" action="{{ url('store') }}">
                  <button type="button" class="btn btn-secondary btn-md dropdown-toggle px-4" id="dropdownMenuReference"
                      data-toggle="dropdown">Reference</button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                      <a class="dropdown-item" href="#" onclick="applySort('relevance')">Relevance</a>
                      <a class="dropdown-item" href="#" onclick="applySort('name_asc')">Name, A to Z</a>
                      <a class="dropdown-item" href="#" onclick="applySort('name_desc')">Name, Z to A</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#" onclick="applySort('price_asc')">Price, low to high</a>
                      <a class="dropdown-item" href="#" onclick="applySort('price_desc')">Price, high to low</a>
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
      
          // Initialize price range slider (using jQuery UI)
          $(function () {
              $("#slider-range").slider({
                  range: true,
                  min: 0,
                  max: 1000, // Adjust based on your price range
                  values: [0, 500], // Default range
                  slide: function (event, ui) {
                      $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
                      $("#min-price").val(ui.values[0]);
                      $("#max-price").val(ui.values[1]);
                  }
              });
              $("#amount").val("$" + $("#slider-range").slider("values", 0) +
                  " - $" + $("#slider-range").slider("values", 1));
          });
      </script>
      
    
      <div class="row">
        @foreach ($products as $item)
            <div class="col-sm-6 col-lg-4 text-center item mb-4">
                <span class="tag">Sale</span>
                <a href="{{ url('storesingle/' . $item->id) }}">
                    <img src="templates/images/product_01.png" alt="Image">
                </a>
                <h3 class="text-dark">
                    <a href="{{ url('storesingle/' . $item->id) }}">{{ $item->name }}</a>
                </h3>
                <p class="price"><del>{{ $item->price }}</del> &mdash;{{ $item->price }}</p>
            </div>
        @endforeach
    </div>
            
        <div class="row mt-5">
          <div class="col-md-12 text-center">
              <div class="site-block-27">
                  <ul>
                      <!-- Previous Page Link -->
                      @if ($products->onFirstPage())
                          <li class="disabled"><span>&lt;</span></li>
                      @else
                          <li><a href="{{ $products->previousPageUrl() }}">&lt;</a></li>
                      @endif
      
                      <!-- Pagination Elements -->
                      @foreach ($products->links()->elements[0] as $page => $url)
                          @if ($page == $products->currentPage())
                              <li class="active"><span>{{ $page }}</span></li>
                          @else
                              <li><a href="{{ $url }}">{{ $page }}</a></li>
                          @endif
                      @endforeach
      
                      <!-- Next Page Link -->
                      @if ($products->hasMorePages())
                          <li><a href="{{ $products->nextPageUrl() }}">&gt;</a></li>
                      @else
                          <li class="disabled"><span>&gt;</span></li>
                      @endif
                  </ul>
              </div>
          </div>
      </div>
      
      </div>
    </div>

    
   
@include('layouts.footer')
  </div>

@include('layouts.script')

</body>

</html>