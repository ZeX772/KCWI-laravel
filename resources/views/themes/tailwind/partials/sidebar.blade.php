<?php
$routeName = Route::currentRouteName();

$logo = '/themes/tailwind/images/Logo.png';

if ($school = session('school'))
    $logo = $school['logo'] != '' ? $school['logo'] : $logo;

$incomingRequest = "0";
if ( $incomingRequest = session('total_request') )
    $incomingRequest = $incomingRequest ?? "0";

$menus = config('menus.list');

$rolesPermissions = [];
foreach (session('user.role.permissions') as $permission) {
    $tableName = $permission['table_name'];
    if( $tableName ) {
        $resultIndex = array_search($tableName, array_column($rolesPermissions, 'role_name'));

        if ($resultIndex === false) {
            $rolesPermissions[] = [
                'role_name' => $tableName,
            ];
        }
    }
}

// Filter the menus
$newMenus = array_filter($menus, function($menu) use ($rolesPermissions) {
    if(! $menu['is_subitem'] ) {
        // check if the user has permission to the menu
        foreach ($rolesPermissions as $key => $value) {
            if( $value['role_name'] == $menu['name'] )
                return true;
        }
    }else{
        // check if there's permission atlease 1 on the subitems
        $grantedMenus = [];
        foreach ($menu['subitems'] as $key => $subItem) {
            foreach ($rolesPermissions as $key => $value) {
                if( $value['role_name'] == $subItem['name'] )
                    $grantedMenus[] = $subItem['name'];
            }
        }

        if( count( $grantedMenus ) > 0 )
            return true;
    }

    return false;
});

// filter the subitems
$newMenus = array_map(function($menu) use ($rolesPermissions) {
    if( $menu['is_subitem'] ) {
        // check if there's permission atlease 1 on the subitems
        $grantedMenus = [];
        foreach ($menu['subitems'] as $key => $subItem) {
            foreach ($rolesPermissions as $key => $value) {
                if( $value['role_name'] == $subItem['name'] )
                    $grantedMenus[] = $subItem;
            }
        }

        $menu['subitems'] = $grantedMenus;
    }

    return $menu;
}, $newMenus);

$menus = $newMenus;
?>
<div class="main-sidebar">
    <div class="sidebar-head">
        <a href=""><img src="{{ $logo }}"></a>
    </div>

    <ul class="navbar-nav text-light" id="accordionSidebar" style="margin-top: 20px;">
        @foreach($menus as $menuList)
            <?php $routeNames = $menuList['route_names']; ?>
            @if(! $menuList['is_subitem'] )
                @if( $menuList['has_badge'] )
                    <li class="nav-item">
                        <a class="<?= (in_array($routeName, $routeNames) ? 'active' : ''); ?> nav-link d-xl-flex align-items-xl-center " href="{{ route($menuList['route']) }}" style="width: 250px; height: 56px; position: relative;">
                            <img src="{{ asset($menuList['icon']) }}" style="width: 20px;margin-right: 20px; margin-left: 20px;">
                            <span class="fw-normal" style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 15px;">{{ $menuList['label'] }} </span>
                            <span style="color: #7A7A7A; position: absolute; right: 15px;"><span class="badge bg-danger">{{ $incomingRequest }}</span></span>
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link d-xl-flex align-items-xl-center <?= (in_array($routeName, $routeNames) ? 'active' : ''); ?>" href="{{ route($menuList['route']) }}" style="height: 56px;width: 250px;"><img src="{{ asset($menuList['icon']) }}" style="width: 20px;margin-left: 20px;margin-right: 20px;">
                            <span class="fw-normal" style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 15px;">{{ $menuList['label'] }}</span>
                        </a>
                    </li>
                @endif
            @else
                <li class="nav-item settings-main-item" data-type="{{$menuList['name']}}">
                    <a class="<?= (in_array($routeName, $routeNames) ? 'active' : ''); ?> nav-link d-xl-flex align-items-xl-center cursor-pointer" style="width: 250px; height: 56px; position: relative;">
                        <img src="{{ asset($menuList['icon']) }}" style="width: 20px;margin-right: 20px; margin-left: 20px;">
                        <span class="fw-normal" style="color: #7A7A7A;font-family: Poppins, sans-serif;font-size: 15px;">{{$menuList['label']}}</span>
                        <span style="color: #7A7A7A; position: absolute; right: 15px;"><i class="main-menu-icon-{{$menuList['name']}} fa-solid <?= (in_array($routeName, $routeNames) ? 'fa-caret-down' : 'fa-caret-right'); ?>"></i></span>
                    </a>
                </li>
                    <div id="settings-main-sub-items-{{$menuList['name']}}" class="<?= (in_array($routeName, $routeNames) ? '' : 'd-none'); ?>">
                        @foreach($menuList['subitems'] as $subItem)
                            <li class="nav-item sub-item">
                                <a class="<?= ($routeName == $subItem['route'] ? 'active' : ''); ?> nav-link d-xl-flex align-items-xl-center mt-1" href="{{ route($subItem['route']) }}" style="width: 250px; height: 50px;">
                                    <i class="fa-solid fa-circle" style="color: <?= ($routeName == $subItem['route'] ? '#3b3b3b' : '#7A7A7A'); ?>; font-size: 6px; margin-right: 25px; margin-left: 25px"></i>
                                    <span class="fw-normal overflow-hidden" style="color: <?= ($routeName == $subItem['route'] ? '#3b3b3b' : '#7A7A7A'); ?>;font-family: Poppins, sans-serif;font-size: 15px; text-overflow: ellipsis; text-wrap: nowrap;">{{ $subItem['label'] }}</span>
                                </a>
                            </li>
                        @endforeach
                    </div>
            @endif
        @endforeach
    </ul>
</div>

<script>
    $(".settings-main-item").on('click', function(){
        const type = $(this).data('type');

        $(`#settings-main-sub-items-${type}`).toggleClass('d-none');

        $(`.settings-main-item .main-menu-icon-${type}`).toggleClass( 'fa-caret-down fa-caret-right' );
    });
</script>