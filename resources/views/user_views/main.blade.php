<!DOCTYPE html>
<html>

            @include('user_views.partials._head')
            
    <body    style="margin-top: -24px">

            @include('user_views.partials._nav')
            <br><br><br>


        <div class='container'>
             @include('user_views.partials._messages')
             @yield('content')
             <br><br><br>
             @include('user_views.partials._footer')
        </div>



             @include('user_views.partials._javascript')
    </body>
</html>