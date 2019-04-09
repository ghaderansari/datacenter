<table class="table table-responsive" id="logtypes-table">
    <thead>
        <tr>
            <th>Title</th>
        <th>Status</th>
        <th>Desc</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($logtypes as $logtype)
        <tr>
            <td>{!! $logtype->title !!}</td>
            <td>{!! $logtype->status !!}</td>
            <td>{!! $logtype->desc !!}</td>
            <td>
                {!! Form::open(['route' => ['logtypes.destroy', $logtype->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('logtypes.show', [$logtype->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('logtypes.edit', [$logtype->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>