
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				              <li class="text-center">
                       @if(Auth::user()->image)
                            <img src="{{url('images/'.Auth::user()->image)}}" class="user-image img-responsive"/>
                        @else
                        <img src="{{url('assets/img/logo.png')}}" class="user-image img-responsive"/>
                        @endif 
                        <!-- <img src="{{url('assets/img/logo.png')}}" class="user-image img-responsive"/>
					             </li> -->

                    <li>
                        <a class="{{ Request::segment(1) == 'admin' ? 'active-menu' : null }}"  href="{{ url('admin') }}"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a class="{{ Request::segment(1) == 'menus' || Request::segment(1) == 'menu_type' ? 'active-menu' : null }}" href="#"><i class="fa fa-bars fa-3x"></i>Menu<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level {{ Request::segment(1) == 'menus' || Request::segment(1) == 'menu_type' ? 'in' : null }}">
                            <li>
                                <a class="{{ Request::segment(1) == 'menus' ? 'active-menu' : null }}" href="{{ url('menus') }}">Menu</a>
                            </li>
                            <li>
                                <a class="{{ Request::segment(1) == 'menu_type' ? 'active-menu' : null }}" href="{{ url('menu_type') }}">Menu Type</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a  class="{{ Request::segment(1) == 'pages' ? 'active-menu' : null }}" href="{{ url('pages') }}"><i class="fa fa-bookmark fa-3x"></i>Page</a>
                    </li>
                    <li>
                        <a class="{{ Request::segment(1) == 'categorys' || Request::segment(1) == 'posts' ? 'active-menu' : null }}" href="#"><i class="fa fa-sitemap fa-3x"></i>Post<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level {{ Request::segment(1) == 'categorys' || Request::segment(1) == 'posts' ? 'in' : null }}">
                            <li>
                                <a class="{{ Request::segment(1) == 'categorys' ? 'active-menu' : null }}" href="{{ url('categorys') }}">Category</a>
                            </li>
                            <li>
                                <a class="{{ Request::segment(1) == 'posts' ? 'active-menu' : null }}" href="{{ url('posts') }}">Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a  class="{{ Request::segment(1) == 'language' ? 'active-menu' : null }}" href="{{ url('language') }}"><i class="fa fa-bookmark fa-3x"></i>Language</a>
                    </li>
                    <li>
                        <a class="{{ Request::segment(1) == 'products-category' || Request::segment(1) == 'products-product' || Request::segment(1) == 'products-brand' ? 'active-menu' : null }}" href="#"><i class="fa fa-sitemap fa-3x"></i>Product<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level {{ Request::segment(1) == 'products-category' || Request::segment(1) == 'products-product' || Request::segment(1) == 'products-brand' ? 'in' : null }}">
                            <li>
                                <a class="{{ Request::segment(1) == 'products-category' ? 'active-menu' : null }}" href="{{ url('products-category') }}">Product Category</a>
                            </li>
                            <li>
                                <a class="{{ Request::segment(1) == 'products-brand' ? 'active-menu' : null }}" href="{{ url('products-brand') }}">Product Brand</a>
                            </li>
                            <li>
                                <a class="{{ Request::segment(1) == 'products-product' ? 'active-menu' : null }}" href="{{ url('products-product') }}">Product</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="{{ Request::segment(1) == 'coureses_categorys' || Request::segment(1) == 'coureses' ? 'active-menu' : null }}" href="#"><i class="fa fa-sitemap fa-3x"></i>Courses<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level {{ Request::segment(1) == 'coureses_categorys' || Request::segment(1) == 'coureses' ? 'in' : null }}">
                            <li>
                                <a class="{{ Request::segment(1) == 'coureses_categorys' ? 'active-menu' : null }}" href="{{ url('coureses_categorys') }}">Courses Category</a>
                            </li>
                            <li>
                                <a class="{{Request::segment(1) == 'coureses' ? 'active-menu' : null }}" href="{{ url('coureses') }}">Courses</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="{{ Request::segment(1) == 'category_news_events' || Request::segment(1) == 'news_events' ? 'active-menu' : null }}" href="#"><i class="fa fa-sitemap fa-3x"></i>News Events<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level {{ Request::segment(1) == 'category_news_events' || Request::segment(1) == 'news_events' ? 'in' : null }}">
                            <li >
                                <a class="{{ Request::segment(1) == 'category_news_events' ? 'active-menu' : null }}" href="{{ url('category_news_events') }}">Category</a>
                            </li>
                            <li>
                                <a class="{{ Request::segment(1) == 'news_events' ? 'active-menu' : null }}" href="{{ url('news_events') }}">News and Event</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a class="{{ Request::segment(1) == 'agencys' || Request::segment(1) == 'category_jobs' || Request::segment(1) == 'careers' ? 'active-menu' : null }}" href="#"><i class="fa fa-suitcase fa-3x"></i> Careers <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level {{ Request::segment(1) == 'category_jobs' ||  Request::segment(1) == 'agencys' || Request::segment(1) == 'careers' ? 'in' : null }}">
                            <li >
                                <a class="{{ Request::segment(1) == 'agencys' ? 'active-menu' : null }}" href="{{ url('agencys') }}">Agency</a>
                            </li>
                            <li >
                                <a class="{{ Request::segment(1) == 'category_jobs' ? 'active-menu' : null }}" href="{{ url('category_jobs') }}">Career Category</a>
                            </li>
                            <li>
                                <a class="{{ Request::segment(1) == 'careers' ? 'active-menu' : null }}" href="{{ url('careers') }}">Careers</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="{{ Request::segment(1) == 'slides' || Request::segment(1) == 'slide_types' ? 'active-menu' : null }}" href="{{ url('galleries') }}"><i class="fa fa-camera fa-3x"></i>Slide<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level {{ Request::segment(1) == 'slides' || Request::segment(1) == 'slide_types' ? 'in' : null }}">
                            <li>
                                <a class="{{ Request::segment(1) == 'slides' ? 'active-menu' : null }}" href="{{ url('slides')}}">Slide</a>
                            </li>
                            <li>
                                <a class="{{ Request::segment(1) == 'slide_types' ? 'active-menu' : null }}" href="{{ url('slide_types') }}">Slide Type</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="{{ Request::segment(1) == 'widgets' ? 'active-menu' : null }}" href="{{ url('widgets') }}"><i class="fa fa-dashboard fa-3x"></i> Widget</a>
                    </li>
                    <!-- <li>
                        <a class="{{ Request::segment(1) == 'post_billborad' ? 'active-menu' : null }}" href="{{ url('post_billborad') }}"><i class="fa fa-dashboard fa-3x"></i>Post Bill Borad</a>
                    </li> -->
                    <li>
                        <a class="{{ Request::segment(1) == 'cat_galleries' || Request::segment(1) == 'gallery' ? 'active-menu' : null }}" href="#"><i class="fa fa-picture-o fa-3x"></i>Galleries<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level {{ Request::segment(1) == 'cat_galleries' || Request::segment(1) == 'gallery' ? 'in' : null }}">
                            <li>
                                <a class="{{ Request::segment(1) == 'cat_galleries'  ? 'active-menu' : null }}" href="{{ url('cat_galleries') }}">Type Galleries</a>
                            </li>
                            <li>
                                <a class="{{ Request::segment(1) == 'gallery' ? 'active-menu' : null }}" href="{{ url('gallery') }}">Galleries</a>
                            </li>
                        </ul>
                    </li>
                    <!-- <li>
                        <a  href="{{ url('adverting') }}"><i class="fa fa-qrcode fa-3x"></i>Advertising</a>
                    </li> -->
                    <li>
                        <a class="{{ Request::segment(1) == 'users' || Request::segment(1) == 'roles' ? 'active-menu' : null }}" href="#"><i class="fa fa-users fa-3x"></i>User<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level {{ Request::segment(1) == 'users' || Request::segment(1) == 'roles' ? 'in' : null }}">
                            <li>
                                <a class="{{ Request::segment(1) == 'roles' ? 'active-menu' : null }}" href="{{ url('users') }}">User</a>
                            </li>
                            <li>
                                <a class="{{ Request::segment(1) == 'users' ? 'active-menu' : null }}" href="{{ url('roles') }}">Role</a>
                            </li>

                        </ul>
                    </li>
                    <li>
                        <a  class="{{ Request::segment(1) == 'branch' ? 'active-menu' : null }}" href="{{ url('branch') }}"><i class="fa fa-dashboard fa-3x"></i>Branch</a>
                    </li>
                    <li>
                        <a  class="{{ Request::segment(1) == 'social' ? 'active-menu' : null }}" href="{{ url('social') }}"><i class="fa fa-sun-o fa-3x"></i>Social</a>
                    </li>
                    <li><a class="{{ Request::segment(1) == 'setting' ? 'active-menu' : null }}" href="{{ url('setting') }}"><i class="fa fa-cog fa-3x"></i>Setting</a>
                    </li>
                </ul>

            </div>

        </nav>
