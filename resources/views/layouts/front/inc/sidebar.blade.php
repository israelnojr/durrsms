<!-- Sidebar -->
<ul class="sidebar navbar-nav">
<li class="nav-item">
        <a class="nav-link" href="{{ ('/')}} ">
        <i class="fas fa-fw fa-user-alt"></i>
        <span>Home</span>
        </a>
    </li>
    @can('edit-user')
    <li class="nav-item">
        <a class="nav-link" href=" {{ route('admin.users.index')}} ">
        <i class="fas fa-fw fa-user-alt"></i>
        <span>Manage Users</span>
        </a>
    </li>
    @endcan
    @can('can-send-sms')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('sms')}}">
        <i class="fas fa-fw fa-envelope"></i>
        <span>Send Sms</span>
        </a>
    </li>
   @endcan
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="categories.html" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-list-alt"></i>
        <span>Manage Messages</span>
        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item" href="{{ route('messages.index')}}">Sent Messages</a>
        </div>
    </li>
    <li class="nav-item channel-sidebar-list">
        <!-- <h6>SUBSCRIPTIONS</h6>
        <ul>
            <li>
                <a href="subscriptions.html">
                <img class="img-fluid" alt="" src="{{asset('front/img/s1.png')}}"> Your Life 
                </a>
            </li>
           
        </ul> -->
    </li>
</ul>