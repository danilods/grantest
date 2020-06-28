<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Sigla Orgao Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sigla_orgao', 'Sigla Orgao:') !!}
    {!! Form::text('sigla_orgao', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('orgaos.index') }}" class="btn btn-default">Cancel</a>
</div>
