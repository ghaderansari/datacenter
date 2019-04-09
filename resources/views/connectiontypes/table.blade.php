<table class="table table-responsive" id="connectiontypes-table">
    <thead>
        <tr>
            <th>Title</th>
        <th>Status</th>
        <th>Standard Port</th>
        <th>User Id</th>
        <th>Desc</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($connectiontypes as $connectiontype)
        <tr>
            <td>{!! $connectiontype->title !!}</td>
            <td>{!! $connectiontype->status !!}</td>
            <td>{!! $connectiontype->standard_port !!}</td>
            <td>{!! $connectiontype->user_id !!}</td>
            <td>{!! $connectiontype->desc !!}</td>
            <td>
                {!! Form::open(['route' => ['connectiontypes.destroy', $connectiontype->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('connectiontypes.show', [$connectiontype->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('connectiontypes.edit', [$connectiontype->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>