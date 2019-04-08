
<li class="{{ Request::is('provinces*') ? 'active' : '' }}">
    <a href="{!! route('provinces.index') !!}"><i class="fa fa-edit"></i><span>Provinces</span></a>
</li>

<li class="{{ Request::is('cities*') ? 'active' : '' }}">
    <a href="{!! route('cities.index') !!}"><i class="fa fa-edit"></i><span>Cities</span></a>
</li>

