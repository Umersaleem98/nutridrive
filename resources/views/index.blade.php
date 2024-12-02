<!DOCTYPE html>
<html lang="en">

<head>
@include('layouts.head')

</head>

<body style="background-color: #ffffff">

  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
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