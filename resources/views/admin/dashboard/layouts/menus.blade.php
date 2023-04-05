@foreach($pmenus as $pitem)
<li class="menu-item menu-item-submenu menu-item-rel" data-menu-toggle="click" aria-haspopup="true">
	<a href="javascript:;" class="menu-link menu-toggle">
		<span class="menu-text">{{ $pitem->name }}</span>
		<span class="menu-desc"></span>
		<i class="menu-arrow"></i>
	</a>
	<div class="menu-submenu menu-submenu-classic menu-submenu-left">
		<ul class="menu-subnav">
			@foreach($cmenus as $citem)
				@if($citem->parent_id===$pitem->id)
					<li class="menu-item menu-item-open menu-item-here menu-item-submenu menu-item-rel menu-item-open menu-item-here" data-menu-toggle="click" aria-haspopup="true">
						<a href="{{ route($citem->menu_link) }}" class="menu-link">
							<span class="menu-text">{{ $citem->name }}</span>
							<span class="menu-desc"></span>
							<i class="menu-arrow"></i>
						</a>
					</li>
				@endif
			@endforeach
		</ul>
	</div>
</li>
@endforeach
