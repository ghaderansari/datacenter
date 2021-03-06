<table class="table table-responsive" id="vmtypes-table">
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
    @foreach($vmtypes as $vmtype)
        <tr>
            <td>{!! $vmtype->title !!}</td>
            <td>{!! $vmtype->status !!}</td>
            <td>{!! $vmtype->desc !!}</td>
            <td>{!! $vmtype->user_id !!}</td>
            <td>
                {!! Form::open(['route' => ['vmtypes.destroy', $vmtype->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('vmtypes.show', [$vmtype->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('vmtypes.edit', [$vmtype->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>