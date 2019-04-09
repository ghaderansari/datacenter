<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', __('Id').':') !!}
    <p>{!! $logtype->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group">
    {!! Form::label('title', __('Title').':') !!}
    <p>{!! $logtype->title !!}</p>
</div>

<!-- Status Field -->
<div class="form-group">
    {!! Form::label('status', __('Status').':') !!}
    <p>{!! $logtype->status !!}</p>
</div>

<!-- Desc Field -->
<div class="form-group">
    {!! Form::label('desc', __('Desc').':') !!}
    <p>{!! $logtype->desc !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', __('Created At').':') !!}
    <p>{!! $logtype->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', __('Updated At').':') !!}
    <p>{!! $logtype->updated_at !!}</p>
</div>

