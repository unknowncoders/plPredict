
<ul class="nav nav-pills nav-stacked" id="vertical-nav">
        <li class="{{ setActive('admin',true) }}"><a href="/admin">Dashboard</a> </li>
        <li class="{{ setActive('admin/pic') }}"><a href="{{ route('admin.pic.index')}}">Pics</a> </li>
        <li class="{{ setActive('admin/club') }}"><a href="{{ route('admin.club.index')}}">Clubs</a> </li>
        <li class="{{ setActive('admin/badge') }}"><a href="{{ route('admin.badge.index')}}">Badges</a> </li>
        <li class="{{ setActive('admin/user') }}"><a href="{{ route('admin.user.index')}}">Users</a> </li>
        <li class="{{ setActive('admin/admin') }}"><a href="{{ route('admin.admin.index')}}">Admins</a> </li>
        <li class="{{ setActive('admin/gameweek') }}"><a href="{{ route('admin.gameweek.index')}}">Gameweeks</a> </li>
</ul>
