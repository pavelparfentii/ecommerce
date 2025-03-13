@php

    $categories = App\Models\Category::with(['subcategories.subsubcategories'])
                    ->orderBy('category_name','ASC')
                    ->get();
@endphp

<div class="side-menu animate-dropdown outer-bottom-xs">
    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
    <nav class="yamm megamenu-horizontal">
        <ul class="nav">

            @foreach($categories as $category)
                <li class="dropdown menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="icon {{ $category->category_icon }}" aria-hidden="true">
                        </i>

                        {{ $category->category_name }}

                    </a>
                    <ul class="dropdown-menu mega-menu">
                        <li class="yamm-content">
                            <div class="row">

                                <!--   // Get SubCategory Table Data -->

                                @foreach($category->subcategories as $subcategory)
                                    <div class="col-sm-12 col-md-3">

                                        <a href="{{ url('subcategory/product/'.$subcategory->id.'/'.$subcategory->subcategory_slug ) }}">
                                            <h2 class="title">

                                                {{ $subcategory->subcategory_name }}

                                            </h2></a>

                                        <!--   // Get SubSubCategory Table Data -->

                                        @foreach($subcategory->subsubcategories as $subsubcategory)
                                            <ul class="links list-unstyled">
                                                <li>
                                                    <a href="{{ url('subsubcategory/product/'.$subsubcategory->id.'/'.$subsubcategory->subsubcategory_slug ) }}">

                                                        {{ $subsubcategory->subsubcategory_name }}

                                                    </a>
                                                </li>

                                            </ul>
                                        @endforeach <!-- // End SubSubCategory Foreach -->

                                    </div>
                                    <!-- /.col -->
                                @endforeach  <!-- End SubCategory Foreach -->

                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- /.yamm-content -->
                    </ul>
                    <!-- /.dropdown-menu --> </li>
                <!-- /.menu-item -->
            @endforeach  <!-- End Category Foreach -->


            <li class="dropdown menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                        class="icon fa fa-paper-plane"></i>Kids and Babies</a>
                <!-- /.dropdown-menu --> </li>
            <!-- /.menu-item -->

            <li class="dropdown menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                        class="icon fa fa-futbol-o"></i>Sports</a>
                <!-- ================================== MEGAMENU VERTICAL ================================== -->
                <!-- /.dropdown-menu -->
                <!-- ================================== MEGAMENU VERTICAL ================================== -->
            </li>
            <!-- /.menu-item -->

            <li class="dropdown menu-item"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                        class="icon fa fa-envira"></i>Home and Garden</a>
                <!-- /.dropdown-menu -->
            </li>
            <!-- /.menu-item -->

        </ul>
        <!-- /.nav -->
    </nav>
    <!-- /.megamenu-horizontal -->
</div>
<!-- /.side-menu -->
