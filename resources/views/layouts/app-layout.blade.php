<!DOCTYPE html>
<html lang="en">
<head>
@include('_partials_.meta')
  @include('_partials_.css')
</head>
<body class="fix-header fix-sidebar card-no-border logo-center">
  @guest
    @include('welcome')
  @else
    <div id="main-wrapper">
      @include('_partials_.header')
      @include('_partials_.sidebar')
     <div class="page-wrapper">
     
            <div class="container-fluid">
              @include('_partials_.bread_crumb')
              @yield('page-content')
            </div>
            @include('_partials_.footer')      
     </div>
    </div>
  @endguest
    @include('_partials_.js')
  
</body>
</html>
