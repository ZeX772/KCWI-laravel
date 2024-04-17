<div class="main-dashboard-navigation">
	<div class="main-dashboard-title d-xl-flex align-items-xl-center">
		<div><img src="/themes/tailwind/images/clipboard-image-19.png" style="width: 20px;">
		</div>


	<form class="d-xl-flex align-items-xl-center ml-4 w-100" style="width: 100vh;">
		<button class="btn btn-primary" type="button" style="border-top-right-radius: 0px;border-bottom-right-radius: 0px; width:50px; height: 45px; background-color: #e8e8e8; border-style: none;"><img src="/themes/tailwind/images/clipboard-image-20.png" style="width: 20px;"></button><input class="form-control" type="search" style="border-top-left-radius: 0px;border-bottom-left-radius: 0px; background: #e8e8e8; border-style: none; height: 45px; width: 100vh;" />
	</form>

	</div>
	<div class="main-dashboard-buttons relative">
		<ul>
			<li class="has-dropdown">
				<div class="cursor-pointer">
					<img src="/themes/tailwind/images/clipboard-image-17.png" style="width: 22px;">
				</div>
			</li>
			<li class="has-dropdown">
				<div class="cursor-pointer" id="notification-dropdown-btn">
					<img src="/themes/tailwind/images/clipboard-image-18.png" style="width: 22px;">
				</div>
			</li>
			<div class="d-none d-sm-block topbar-divider"></div>
			<li class="has-dropdown">
				<div id="dropdown-menu-btn" class="cursor-pointer">
					<img src="/themes/tailwind/images/clipboard-image-16.png" style="width: 48px;">
				</div>
			</li>
		</ul>
		<div class="absolute avatar-dropdown d-none">
			<div class="d-flex align-items-center gap-2 border-bottom user-info">
				<div>
					<img src="/themes/tailwind/images/clipboard-image-16.png" style="width: 48px;">
				</div>
				<div>
					<div>{{ session('user')['name'] ?? '' }}</div>
					<div class="text-muted">{{ session('user')['id'] ?? '' }}</div>
				</div>
			</div>
			<div class="logout-section">
				<div class="">
					<a href="{{ route('wave.admin.logout') }}" class="d-flex align-items-center gap-2"><x-svg-icon icon="logout" /> Logout</a>
				</div>
			</div>
		</div>

		<div class="absolute notifications-dropdown d-none">
			
		</div>
	</div>
</div>

<style>
	.avatar-dropdown {
		width: 300px;
		height: auto;
		background-color: #FFFFFF;
		right: 18px;
		border-radius: 8px;
		padding: 10px;
		box-shadow: 0px 4px 4px 0px #00000040;
		z-index: 999;
	}

	.notifications-dropdown {
		width: 300px;
		height: auto;
		background-color: #FFFFFF;
		right: 100px;
		border-radius: 8px;
		padding: 10px;
		box-shadow: 0px 4px 4px 0px #00000040;
		z-index: 999;
	}

	.user-info,
	.logout-section {
		padding: 10px 20px 10px 20px;
	}
</style>

<script type="text/javascript">
	$(function() {
		$('#dropdown-menu-btn').on('click', function(){
			$('.avatar-dropdown').toggleClass('d-none');
		});

		$('#notification-dropdown-btn').on('click', function() {
			$('.notifications-dropdown').toggleClass('d-none');
		});
	});
</script>