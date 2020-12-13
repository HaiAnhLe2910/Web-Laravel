<div class="header">
        <ul>
            <li>
                <a href="cart.php">Bag</a>
            </li>
            
            @if (Route::has('login'))
                
                    @auth
                        <li><a href="{{ url('/home') }}">Home</a></li>
                        <li><a href="{{ url('/logout') }}">Log Out</a><li>
                        <li><a href="{{ url('/profile') }}">Profile</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Login</a></li>

                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @endif
                    @endauth
                
            @endif
            

        </ul>
    </div>

    <div class="heading">
        <h1>
            <a href="/">
                <font size="+5">
                    HEIDIBASKET
                </font>
            </a>
        </h1>
        <div class="searchbar">
            <form action="Search.php" method="post">
            <input type="text" name="hd" placeholder="Search">
            <button type="submit">Search</button>
            </form>
        </div>
    </div>



    <div class="navbar">

        <div class="grid-container-hp">

            <div class="grid-item-nav"><a href="about"> ABOUT </a></div>
            <div class="grid-item-nav">
                <div class="dropdown">
                    <span><a href="BSMakeUp.php">BEST SELLERS</a></span>
                </div>
            </div>
            <div class="grid-item-nav">
                <div class="dropdown">
                    <span><a href="/product"> PRODUCTS</a> </span>
                </div>
            </div>
            <div class="grid-item-nav">
                <div class="dropdown">
                    <span><a href="ONew.php">OFFERS</a></span>
                </div>
            </div>
            <div class="grid-item-nav"><a href="service.php"> SERVICES</a></div>

        </div>


    </div>
