<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')

    <style>
       /* Set the background color of the cards */
       .site-blocks-1 .col-md-6 {
            background-color: #DEB4E7; /* Apply your desired background color */
            border-radius: 10px; /* Rounded corners for better design */
            padding: 20px;
            transition: all 0.3s ease-in-out; /* Smooth transition for hover effect */
        }

        /* Set hover effect */
        .site-blocks-1 .col-md-6:hover {
            transform: scale(1.05); /* Slightly enlarge the card */
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Add a shadow effect on hover */
        }

        /* Optional: Change text color or add other effects on hover */
        .site-blocks-1 .col-md-6:hover h3,
        .site-blocks-1 .col-md-6:hover p {
            color: #1f1f1f; /* Change text color to white on hover */
        }

        .site-blocks-1 .col-md-6:hover .icon img {
            transform: scale(1.1); /* Slightly enlarge the image on hover */
        }
  </style>
</head>

<body>

    <div class="site-wrap">

        @include('layouts.header')

        <!-- Hero Section -->
        <div class="site-blocks-cover inner-page" style="background-image: url('templates/images/hero_1.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto align-self-center">
                        <div class="text-center">
                            <h1>About Us</h1>
                            <p>Discover how Nutri Drive is redefining health and vitality with science-backed nutrition.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- What We Offer Section -->
        <div class="site-section bg-light custom-border-bottom" data-aos="fade">
            <div class="container">
                <div class="row mb-5 align-items-center">
                    <div class="col-md-6">
                        <img src="templates\images\aboutus.png" alt="What We Offer" class="img-fluid rounded">
                    </div>
                    <div class="col-md-6">
                        <h2 style="color: #2c3e50; font-weight: bold;">What We Offer?</h2>
                        <p style="color: #34495e; line-height: 1.8;">
                            Nutri Drive offers a range of scientifically formulated multivitamins tailored to meet the
                            diverse health needs of our customers. From everyday essentials to specialized blends for
                            different ages and stages of life, our products are designed to give you the nutrients you
                            need to achieve optimal health.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Cards Section -->
        <div class="site-section bg-light site-blocks-1 border-0" data-aos="fade">
          <div class="container">
              <div class="row">
                  <!-- Card 1 -->
                  <div class="col-md-6 col-lg-3 d-flex mb-4 mb-lg-0">
                      <div class="icon mr-4 align-self-start">
                          <img src="https://via.placeholder.com/150" alt="Biotin" class="img-fluid rounded-circle">
                      </div>
                      <div class="text">
                          <h3>Biotin</h3>
                          <p>
                              Supports hair, skin & nails. Acts as an antioxidant, protects cell. Essential for vision, immune 
                              function, Boosts immunity, aids iron absorption, Involved in energy production.
                          </p>
                      </div>
                  </div>

                  <!-- Card 2 -->
                  <div class="col-md-6 col-lg-3 d-flex mb-4 mb-lg-0">
                      <div class="icon mr-4 align-self-start">
                          <img src="https://via.placeholder.com/150" alt="Vitamin D3" class="img-fluid rounded-circle">
                      </div>
                      <div class="text">
                          <h3>Mv</h3>
                          <p>
                              Our comprehensive Multi-vitamin blend is crafted to support overall health and vitality, providing a
                              balanced spectrum of essential nutrients needed for optimal wellness.
                          </p>
                      </div>
                  </div>

                  <!-- Card 3 -->
                  <div class="col-md-6 col-lg-3 d-flex mb-4 mb-lg-0">
                      <div class="icon mr-4 align-self-start">
                          <img src="https://via.placeholder.com/150" alt="Iron Supplement" class="img-fluid rounded-circle">
                      </div>
                      <div class="text">
                          <h3>D3</h3>
                          <p>
                              Boost your health and immune system with our Vitamin D3 supplement, designed to ensure you
                              receive the right amount of sunshine vitamin no matter the weather.
                          </p>
                      </div>
                  </div>

                  <!-- Card 4 -->
                  <div class="col-md-6 col-lg-3 d-flex mb-4 mb-lg-0">
                      <div class="icon mr-4 align-self-start">
                          <img src="https://via.placeholder.com/150" alt="Iron Supplement" class="img-fluid rounded-circle">
                      </div>
                      <div class="text">
                          <h3>Fe</h3>
                          <p>
                              Our iron supplement is designed to help replenish your body’s iron levels. It’s essential for
                              producing red blood cells, which carry oxygen throughout your body.
                          </p>
                      </div>
                  </div>
              </div>

              <!-- Additional Card Section -->
              <div class="row mt-5">
                  <div class="col-md-12">
                      <h4 style="color: #2c3e50; font-weight: bold;">Key Benefits:</h4>
                      <ul style="color: #34495e; list-style: none; padding-left: 0;">
                          <li>✔ Supports hair, skin & nails</li>
                          <li>✔ Acts as an antioxidant, protects cells</li>
                          <li>✔ Essential for vision & immune function</li>
                          <li>✔ Boosts immunity, aids iron absorption</li>
                          <li>✔ Involved in energy production</li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>

        
        @include('layouts.footer')

    </div>

    @include('layouts.script')

</body>

</html>
