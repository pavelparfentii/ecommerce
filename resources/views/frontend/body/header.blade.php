<header class="header-style-1">

    <!-- ============================================== TOP MENU ============================================== -->
    <div class="top-bar animate-dropdown">
        <div class="container">
            <div class="header-top-inner">
                <div class="cnt-account">
                    <ul class="list-unstyled">
                        <li><a href="#"><i class="icon fa fa-user"></i>
                                @if(session()->get('language') == 'italian')
                                    Italian
                                @else
                                    My Account
                                @endif
                            </a>
                        </li>
                        <li><a href="{{ route('wishlist') }}"><i class="icon fa fa-heart"></i>Wishlist</a></li>
                        <li><a href="{{ route('mycart') }}"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
                        <li><a href="{{ route('checkout') }}"><i class="icon fa fa-check"></i>Checkout</a></li>

                        <li>
                            <a href="" type="button" data-toggle="modal" data-target="#ordertraking">
                                <i
                                    class="icon fa fa-check"></i>Order Tracking</a>
                        </li>

                        <li>

                            @auth

                                <a href="{{ route('user.profile') }}">
                                    <i class="icon fa fa-user"></i>User Profile</a>
                            @else
                                <a href="{{ route('login') }}">
                                    <i class="icon fa fa-lock"></i>Login/Register</a>
                            @endauth


                        </li>
                    </ul>
                </div>
                <!-- /.cnt-account -->

                <div class="cnt-block">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a href="#" class="dropdown-toggle" data-hover="dropdown"
                               data-toggle="dropdown"><span class="value">USD </span><b
                                    class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">EUR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-small">
                            <a href="#" class="dropdown-toggle"
                               data-hover="dropdown"
                               data-toggle="dropdown">
                                <span class="value">
                                    @if(session()->get('language') == 'italian')
                                        Lingua
                                    @else
                                        Language
                                    @endif

                                </span>
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                @if(session()->get('language') == 'other')
                                    <li><a href="{{ route('english.language') }}">English</a></li>
                                @else
                                    <li><a href="{{ route('other.language') }}">Other</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul>
                    <!-- /.list-unstyled -->
                </div>
                <!-- /.cnt-cart -->
                <div class="clearfix"></div>
            </div>
            <!-- /.header-top-inner -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /.header-top -->
    <!-- ============================================== TOP MENU : END ============================================== -->
    <div class="main-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-3 logo-holder">

                    @php
                        $setting = App\Models\SiteSetting::find(1);
                    @endphp

                        <!-- ============================================================= LOGO ============================================================= -->
                    <div class="logo">
                        <a href="{{ url('/') }}">
                            @if(isset($setting->logo))
                                <img src="{{ asset($setting->logo ?? 'default-logo.png') }}" alt="logo">

                            @else
                                <img src="/backend/images/logo/logo-4.jpg" width="40px" height="40px" alt="logo">
                            @endif


                        </a>
                    </div>          <!-- /.logo -->
                    <!-- ============================================================= LOGO : END ============================================================= -->
                </div>
                <!-- /.logo-holder -->

                <div class="col-xs-12 col-sm-12 col-md-7 top-search-holder">
                    <!-- /.contact-row -->
                    <!-- ============================================================= SEARCH AREA ============================================================= -->
                    <div class="search-area">
                        <form method="get" action="{{ route('product.search') }}">
                            @csrf
                            <div class="control-group">
                                <ul class="categories-filter animate-dropdown">
                                    <li class="dropdown">
                                        <a class="dropdown-toggle"
                                           data-toggle="dropdown"
                                           href="#">Categories <b class="caret"></b>
                                        </a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li class="menu-header">Computer</li>
                                            <li role="presentation">
                                                <a role="menuitem"
                                                   tabindex="-1"
                                                   href="#">- Clothing</a>
                                            </li>
                                            <li role="presentation">
                                                <a role="menuitem"
                                                   tabindex="-1"
                                                   href="#">- Electronics</a>
                                            </li>
                                            <li role="presentation">
                                                <a role="menuitem" tabindex="-1"
                                                   href="#">- Shoes
                                                </a></li>
                                            <li role="presentation">
                                                <a role="menuitem" tabindex="-1"
                                                   href="#">- Watches
                                                </a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <input class="search-field" onfocus="search_result_show()" onblur="search_result_hide()"
                                       id="search" name="search" placeholder="Search here..."/>
                                <button class="search-button" type="submit"></button>
                            </div>
                        </form>
                        {{--                        <form method="GET" action="{{ route('product.search') }}">--}}
                        {{--                            <div class="control-group">--}}
                        {{--                                <input class="search-field"--}}
                        {{--                                       onkeyup="searchProducts()"--}}
                        {{--                                       id="search" name="search" placeholder="Search here..."/>--}}
                        {{--                                <button class="search-button" type="submit"></button>--}}
                        {{--                            </div>--}}
                        {{--                        </form>--}}

                        {{--                        <div id="searchProducts"></div>--}}
                        <div id="searchResults" class="search-dropdown"></div>
                    </div>
                    <!-- /.search-area -->
                    <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                </div>
                <!-- /.top-search-holder -->

                <div class="col-xs-12 col-sm-12 col-md-2 animate-dropdown top-cart-row">

                    <!-- ===== === SHOPPING CART DROPDOWN ===== == -->

                    <div class="dropdown dropdown-cart"><a href="#" class="dropdown-toggle lnk-cart"
                                                           data-toggle="dropdown">
                            <div class="items-cart-inner">
                                <div class="basket"><i class="glyphicon glyphicon-shopping-cart"></i></div>
                                <div class="basket-item-count"><span class="count" id="cartQty"> </span></div>
                                <div class="total-price-basket"><span class="lbl">cart -</span>
                                    <span class="total-price"> <span class="sign">$</span>
                <span class="value" id="cartSubTotal"> </span> </span></div>
                            </div>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <!--   // Mini Cart Start with Ajax -->

                                <div id="miniCart">

                                </div>

                                <!--   // End Mini Cart Start with Ajax -->

                                <div class="clearfix cart-total">
                                    <div class="pull-right"><span class="text">Sub Total :</span>
                                        <span class='price' id="cartSubTotal">  </span></div>
                                    <div class="clearfix"></div>
                                    <a href="{{route('checkout')}}"
                                       class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a></div>
                                <!-- /.cart-total-->

                            </li>
                        </ul>
                        <!-- /.dropdown-menu-->
                    </div>
                    <!-- /.dropdown-cart -->

                    <!-- == === SHOPPING CART DROPDOWN : END=== === --> </div>

                <!-- /.top-cart-row -->
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container -->

    </div>
    <!-- /.main-header -->

    <!-- ============================================== NAVBAR ============================================== -->
    <div class="header-nav animate-dropdown">
        <div class="container">
            <div class="yamm navbar navbar-default" role="navigation">
                <div class="navbar-header">
                    <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse"
                            class="navbar-toggle collapsed" type="button">
                        <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span
                            class="icon-bar"></span> <span class="icon-bar"></span></button>
                </div>
                <div class="nav-bg-class">
                    <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
                        <div class="nav-outer">
                            <ul class="nav navbar-nav">
                                <li class="active dropdown yamm-fw"><a href="{{ url('/') }}" data-hover="dropdown"
                                                                       class="dropdown-toggle" data-toggle="dropdown">
                                        Home
                                    </a></li>

                                <!--   // Get Category Table Data -->
                                @php
                                    $categories = App\Models\Category::orderBy('category_name','ASC')->get();
                                @endphp


                                @foreach($categories as $category)
                                    <li class="dropdown yamm mega-menu">
                                        <a href="#"
                                           data-hover="dropdown"
                                           class="dropdown-toggle"
                                           data-toggle="dropdown">
                                            {{--                                            @if(session()->get('language') == 'other')--}}
                                            {{--                                                {{ $category->category_ita }}--}}
                                            {{--                                            @else--}}
                                            {{--                                                {{ $category->category_name }}--}}
                                            {{--                                            @endif--}}
                                            {{ $category->category_name }}
                                        </a>
                                        <ul class="dropdown-menu container">
                                            <li>
                                                <div class="yamm-content ">
                                                    <div class="row">
                                                        <!--   // Get SubCategory Table Data -->
                                                        @php
                                                            $subcategories = App\Models\SubCategory::where('category_id',$category->id)->orderBy('subcategory_name','ASC')->get();
                                                        @endphp

                                                        @foreach($subcategories as $subcategory)
                                                            <div class="col-xs-12 col-sm-6 col-md-2 col-menu">

                                                                <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug ) }}">
                                                                    <h2 class="title">

                                                                        {{ $subcategory->subcategory_name }}

                                                                    </h2></a>


                                                                <!--   // Get SubSubCategory Table Data -->
                                                                @php
                                                                    $subsubcategories = App\Models\SubSubCategory::where('subcategory_id',$subcategory->id)->orderBy('subsubcategory_name','ASC')->get();
                                                                @endphp

                                                                @foreach($subsubcategories as $subsubcategory)
                                                                    <ul class="links">
                                                                        <li>
                                                                            <a href="{{ url('subsubcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug) }}">

                                                                                {{ $subsubcategory->subsubcategory_name }}

                                                                            </a>
                                                                        </li>

                                                                    </ul>
                                                                @endforeach <!-- // End SubSubCategory Foreach -->

                                                            </div>
                                                            <!-- /.col -->
                                                        @endforeach <!-- // End SubCategory Foreach -->


                                                        <div class="col-xs-12 col-sm-6 col-md-4 col-menu banner-image">
                                                            <img class="img-responsive"
                                                                 src="{{ asset('frontend/assets/images/banners/top-menu-banner.jpg') }}"
                                                                 alt=""></div>
                                                        <!-- /.yamm-content -->
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                @endforeach <!-- // End Category Foreach -->


                                <li><a href="{{ route('shop.page') }}">Shop</a></li>

                                <li class="dropdown  navbar-right special-menu"><a href="#">Todays offer</a></li>

                                <li class="dropdown  navbar-right special-menu">
                                    <a
                                        href="{{ route('home.blog') }}">Blog</a>
                                </li>


                            </ul>
                            <!-- /.navbar-nav -->
                            <div class="clearfix"></div>
                        </div>
                        <!-- /.nav-outer -->
                    </div>
                    <!-- /.navbar-collapse -->

                </div>
                <!-- /.nav-bg-class -->
            </div>
            <!-- /.navbar-default -->
        </div>
        <!-- /.container-class -->

    </div>
    {{--    <!--.header-nav -->--}}
    <!-- ============================================== NAVBAR : END ============================================== -->

    <!-- Order Tracking Modal -->
    <div class="modal fade" id="ordertraking" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Track Your Order </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form method="post" action="{{ route('order.tracking') }}">
                        @csrf
                        <div class="modal-body">
                            <label>Invoice Code</label>
                            <input type="text" name="code" required="" class="form-control"
                                   placeholder="Your Order Invoice Number">
                        </div>

                        <button class="btn btn-danger" type="submit" style="margin-left: 17px;"> Track Now</button>

                    </form>
                </div>

            </div>
        </div>
    </div>


</header>


<style>

    .search-area {
        position: relative;
    }

    #searchProducts {
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background: #ffffff;
        z-index: 999;
        border-radius: 8px;
        margin-top: 5px;
    }


</style>


<script>
    function search_result_hide() {
        $("#searchProducts").slideUp();
    }

    function search_result_show() {
        $("#searchProducts").slideDown();
    }


</script>

{{--<script>--}}
{{--    function searchProducts() {--}}
{{--        let query = document.getElementById('search').value;--}}

{{--        if (query.length > 2) {  // Мінімум 3 символи для пошуку--}}
{{--            fetch("{{ route('product.search') }}?search=" + query, {--}}
{{--                headers: { 'X-Requested-With': 'XMLHttpRequest' }--}}
{{--            })--}}
{{--                .then(response => response.json())--}}
{{--                .then(data => {--}}
{{--                    let resultBox = document.getElementById('searchProducts');--}}
{{--                    resultBox.innerHTML = ""; // Очищаємо попередні результати--}}

{{--                    data.forEach(product => {--}}
{{--                        resultBox.innerHTML += `--}}
{{--                    <div>--}}
{{--                        <a href="/product/${product.id}">${product.name}</a>--}}
{{--                    </div>--}}
{{--                `;--}}
{{--                    });--}}
{{--                });--}}
{{--        } else {--}}
{{--            document.getElementById('searchProducts').innerHTML = "";--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}

<script>
    function searchProduct() {
        let query = document.getElementById('search').value;
        if (query.length > 2) {
            $.ajax({
                url: "{{ route('product.search') }}",
                method: "POST",
                data: {
                    search: query,
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    let results = '<div class="search-results-container">';

                    if (response.products.length > 0) {
                        results += '<h4>Products</h4>';
                        response.products.forEach(product => {
                            results += `<a href="/product/${product.id}" class="search-result-item">
                                            <img src="${product.image}" alt="${product.product_name}" />
                                            <span>${product.product_name}</span>
                                        </a>`;
                        });
                    }

                    if (response.categories.length > 0) {
                        results += '<h4>Categories</h4>';
                        response.categories.forEach(category => {
                            results += `<a href="/category/${category.id}" class="search-result-item">
                                            <span>${category.category_name_en}</span>
                                        </a>`;
                        });
                    }

                    results += '</div>';
                    document.getElementById('searchResults').innerHTML = results;
                }
            });
        } else {
            document.getElementById('searchResults').innerHTML = '';
        }
    }
</script>
