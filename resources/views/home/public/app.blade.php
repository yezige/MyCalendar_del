<!DOCTYPE html>
<html class="no-js" lang="zh">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>个人日历</title>
        <link rel="stylesheet" href="{{ asset('/foundation-5.5.3/css/foundation.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('/foundation-5.5.3/css/app.css') }}" />
        <script src="{{ asset('/foundation-5.5.3/js/vendor/jquery.min.js') }}"></script>
    </head>

    <body>
        <nav class="top-bar" data-topbar role="navigation" data-options="is_hover: false">
          <ul class="title-area">
            <li class="name">
              <h1><a href="#">My Calendar</a></h1>
            </li>
             <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
          </ul>
        
          <section class="top-bar-section">
            <!-- Right Nav Section -->
            <ul class="right">
                @if (Auth::guest())
                    <li class="active"><a href="{{ url('/auth/login') }}">Login</a></li>
                    <li><a href="{{ url('/auth/register') }}">Register</a></li>
                @else
                    <li class="has-dropdown">
                        <a href="#">{{ Auth::user()->name }} </a>
                        <ul class="dropdown">
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                            <li><a href="#">Coming Soon.</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        
            <!-- Left Nav Section -->
            <ul class="left">
              <li class="active"><a href="{{ url('/') }}">Home</a></li>
            </ul>
          </section>
        </nav>
        <div class="row column text-center">
            <h2>My Calendar</h2>
            <hr>
        </div>
        @yield('content')
        <div class="callout large secondary">
        <div class="row">
            <div class="large-4 columns">
                <h5>Vivamus Hendrerit Arcu Sed Erat Molestie</h5>
                <p>Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed molestie augue sit.</p>
                </h4>
            </div>
            <div class="large-3 large-offset-2 columns">
                <ul class="menu vertical">
                    <li><a href="#">One</a></li>
                    <li><a href="#">Two</a></li>
                    <li><a href="#">Three</a></li>
                    <li><a href="#">Four</a></li>
                </ul>
            </div>
            <div class="large-3 columns">
                <ul class="menu vertical">
                    <li><a href="#">One</a></li>
                    <li><a href="#">Two</a></li>
                    <li><a href="#">Three</a></li>
                    <li><a href="#">Four</a></li>
                </ul>
            </div>
        </div>
        <script src="{{ asset('/foundation-5.5.3/js/foundation.min.js') }}"></script>
        <script src="{{ asset('/foundation-5.5.3/js/foundation/foundation.topbar.js') }}"></script><!--TopBat-->
        <script src="{{ asset('/foundation-5.5.3/js/app.js') }}"></script>
    </body>
</html>
