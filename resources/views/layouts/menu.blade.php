
<li class="{{ Request::is('provinces*') ? 'active' : '' }}">
    <a href="{!! route('provinces.index') !!}"><i class="fa fa-edit"></i><span>Provinces</span></a>
</li>

<li class="{{ Request::is('cities*') ? 'active' : '' }}">
    <a href="{!! route('cities.index') !!}"><i class="fa fa-edit"></i><span>Cities</span></a>
</li>

<li class="{{ Request::is('connectiontypes*') ? 'active' : '' }}">
    <a href="{!! route('connectiontypes.index') !!}"><i class="fa fa-edit"></i><span>Connectiontypes</span></a>
</li>

<li class="{{ Request::is('ostypes*') ? 'active' : '' }}">
    <a href="{!! route('ostypes.index') !!}"><i class="fa fa-edit"></i><span>Ostypes</span></a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>

<li class="{{ Request::is('logtypes*') ? 'active' : '' }}">
    <a href="{!! route('logtypes.index') !!}"><i class="fa fa-edit"></i><span>Logtypes</span></a>
</li>

<li class="{{ Request::is('vmtypes*') ? 'active' : '' }}">
    <a href="{!! route('vmtypes.index') !!}"><i class="fa fa-edit"></i><span>Vmtypes</span></a>
</li>

