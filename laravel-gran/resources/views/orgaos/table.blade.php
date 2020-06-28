<div class="table-responsive">
    <table class="table" id="orgaos-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Sigla Orgao</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($orgaos as $orgao)
            <tr>
                <td>{{ $orgao->name }}</td>
            <td>{{ $orgao->sigla_orgao }}</td>
                <td>
                    {!! Form::open(['route' => ['orgaos.destroy', $orgao->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('orgaos.show', [$orgao->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('orgaos.edit', [$orgao->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
