@if (Auth::guard('admins')->check())
    <p> you login like Admin</p>
@else
    <p> you log out Admin</p>
@endif

@if (Auth::guard('web')->check())
    <p> you login like User</p>
@else
    <p> you log out User</p>
@endif