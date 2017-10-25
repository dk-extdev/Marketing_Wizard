<div class="row border-bottom white-bg top-header-bar">

    <div class = "container" >

        <nav class="navbar navbar-static-top" role="navigation">

            <div class="navbar-header">

                <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">

                    <i class="fa fa-reorder"></i>

                </button>

                <a href="{{ route('home') }}" id="logo1">Dynamic Video</a>

            </div>

            <div class="navbar-collapse collapse" id="navbar">

                <ul class="nav navbar-nav">

                    <!-- <li class = "create_video">

                        <a aria-expanded="false" role="button" href="{{ action('VideosController@getVideos') }}"><i class="fa fa-play-circle-o"></i> <span class="nav-label">Dashboard</span></a>

                    </li> -->

                    <li class = "create_video">

                        <a aria-expanded="false" role="button" href="index.php?menu=create_video"><i class="fa fa-play-circle-o"></i> <span class="nav-label">Create Video</span></a>

                    </li>

                    <li class="@if(Route::current()->getName() == 'my_videos') active @endif">

                        <a aria-expanded="false" role="button" href="{{ action('VideosController@getMyVideos') }}"><i class="fa fa-align-left"></i> <span class="nav-label">My Videos</span></a>

                    </li>

                    <li class="@if(Route::current()->getName() == 'my_purchases') active @endif">

                        <a aria-expanded="false" role="button" href="{{ action('VideosController@my_purchases') }}"><i class="fa fa-shopping-cart"></i> <span class="nav-label">My Purchases</span></a>

                    </li>

                    <li class="@if(Route::current()->getName() == 'settings') active @endif">

                        <a aria-expanded="false" role="button" href="{{ action('UserAuthController@getProfile') }}"><i class="fa fa-gear"></i> <span class="nav-label">Settings</span></a>

                    </li>

                </ul>

                <ul class="nav navbar-top-links navbar-right">

                    <li>

                      {{ Auth::guard('user')->user()->email }}

                  </li>

                  <li>

                    <a href="{{ route('user-logout') }}">

                        <i class="fa fa-sign-out"></i> 

                    </a>

                </li>

            </ul>

        </div>

    </nav>

</div>

</div>
