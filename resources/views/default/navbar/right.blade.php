@push('navbar.right')
@auth()
<ul class="nav navbar-nav navbar-right">  
    <li>
        <a href="/" target="_blank"><i class="fa fa-btn fa-globe"></i> На сайт</a>
    </li>
    
    <li class="dropdown user user-menu" style="margin-right: 20px;">
        <a href="#" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle">
            <span class="hidden-xs">{{ Auth::user()->name }}</span>
        </a> 
        <ul class="dropdown-menu">
            <li class="user-footer">
                <p>{{ Auth::user()->name }}</p>
            </li> 
            <li class="user-footer">
                <a href="{{ route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa fa-btn fa-sign-out"></i>Выйти</a> 
                <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display: none;">@csrf</form>
            </li>
        </ul>
    </li>
    
</ul>
@endauth()
@endpush
