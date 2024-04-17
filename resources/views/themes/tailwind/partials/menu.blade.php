<ul class="navbar-nav text-light" id="accordionSidebar" style="margin-top: 20px;">
    @foreach($items as $menu_item)
        <li class="nav-item"><a class="nav-link d-xl-flex align-items-xl-center @if(Request::is(substr($menu_item->url,1))){{'active'}}@endif" href="{{ $menu_item->url }}"  style="height: 56px;width: 250px;"><img src="{{ $menu_item->icon_class }}" style="width: 20px;margin-left: 20px;margin-right: 20px;"><span class="fw-normal" style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 15px;">{{ $menu_item->title }}</span></a></li>
    @endforeach
</ul>