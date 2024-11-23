<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.head')

</head>

<body style="background-color: #ffffff">

  <div class="site-wrap">


   @include('layouts.header')

  @include('layouts.slider')

  @include('layouts.messionvision')
   
  @include('layouts.ourvalues') 
  
  @include('layouts.popularproducts')

  
  @include('layouts.ourPromise')
  
  {{-- @include('layouts.testimonial') --}}
  
   {{-- @include('layouts.banner') --}}
   

   

   @include('layouts.footer')
  </div>

  @include('layouts.script')

</body>

</html>