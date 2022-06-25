<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                @foreach($categories as $category)
                <li><a href="{{ route('web.category.search',['slug'=>$category->slug])}}">{{ $category->name }}</a></li>
                @endforeach
                {{-- <li><a href="/contact-us">Liên hệ</a></li> --}}
                <li><a href="/about-us">Giới thiệu</a></li>
            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>