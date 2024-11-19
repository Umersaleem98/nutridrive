<!DOCTYPE html>
<html lang="en">

<head>
 @include('admin.css')
</head>

<body>

  <!-- ======= Header ======= -->
  @include('admin.header')

  <!-- ======= Sidebar ======= -->
 @include('admin.sidebar')

  <main id="main" class="main">

   @include('admin.pages.content')

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

 @include('admin.script')

</body>

</html>