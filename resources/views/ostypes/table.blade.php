<table class="table table-responsive" id="ostypes-table">
    <thead>
        <tr>
            <th>Title</th>
        <th>Status</th>
        <th>Desc</th>
        <th>User Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($ostypes as $ostype)
        <tr>
            <td>{!! $ostype->title !!}</td>
            <td>{!! $ostype->status !!}</td>
            <td>{!! $ostype->desc !!}</td>
            <td>{!! $ostype->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['ostypes.destroy', $ostype->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('ostypes.show', [$ostype->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('ostypes.edit', [$ostype->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>