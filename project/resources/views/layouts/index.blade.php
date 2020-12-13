<!DOCTYPE html>

<head>
   @include('includes.head')  
</head>


<body>
   <div class="container">
 
   <header>
 
       @include('includes.header')
 
   </header>
 
   <div id="main">
 
              <div class="container-fluid">
                    <div class="animated fadeIn">
                        @yield('content')
                    </div>
                </div>
   </div>
 
   <footer>
 
       @include('includes.footer')
 
   </footer>
 
    </div>

</body>

</html>




