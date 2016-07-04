@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"><h1>Gerenciamento de Registros</h1></div>

                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                            <h2>Lista de Registros:</h2>
                            @forelse(isset($data)?$data:[] as $item)
                                <ul>
                                    <li>
                                        {!! Form::open(['method' => 'DELETE', 'route' => [$route.'.destroy', $item->titleSlug] ]) !!}
                                        {{ link_to_route($route.'.show', $item->nome, ['data'=>$item->id]) }} -
                                        <a href="{{ route($route.'.edit', ['data'=>$item->id]) }}" class="btn btn-primary">Editar</a> -
                                        {!! Form::submit('Apagar',['class'=>'btn btn-primary']) !!}
                                        {!! Form::close() !!}
                                    </li>
                                </ul>
                            @empty
                                <em>Sem registros</em>
                            @endforelse

                            {!! get_class($data)==Illuminate\Pagination\LengthAwarePaginator::class?$data->render():'' !!}

                            {!! Form::model(isset($dataModel)?$dataModel:$dataModelInstance, ['files' => true,'route' => isset($dataModel)?[$route.'.update', $dataModel->id]:[$route.'.store']]) !!}

                                {{ Form::bsText('nome') }}
                                {{ Form::bsText('descricao', "Descrição") }}
                                {{ Form::bsText('bairro') }}
                                {{ Form::bsText('endereco', "Endereço") }}
                                {{ Form::bsText('complemento') }}
                                {{ Form::bsText('cep') }}
                                {{ Form::bsText('telefone') }}
                                {{ Form::bsText('email') }}
                                {{ Form::bsText('site') }}
                                {{ Form::bsText('fabricantes') }}

                                <!-- Imagem Form Input -->
                                {{--<div class="form-group">--}}
                                    {{--{!! Form::label('file','Imagem:') !!}--}}
                                    {{--{!! Form::file('file',['class'=>'form-control']) !!}--}}
                                {{--</div>--}}

                                <!-- Enviar Form Input -->
                                <div class="form-group">
                                    {!! Form::submit('Enviar',['class'=>'btn btn-primary form-control']) !!}
                                </div>
                            {!! Form::close() !!}

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection