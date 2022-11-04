@extends("layouts.branco")

@section("title", "Salvar suas Anotações - ")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h3>Minhas Anotações -
                <strong class="text-secondary">
                    <small>
                        {{$versiculo->livro->name}} {{$versiculo->chapter}}, {{$versiculo->verse}}
                    </small>
                </strong>
            </h3>
            <p>{{($versiculo->text)}}</p>
        </div>
    </div>
    <div class="row">
        <form action="{{route("salvar_anotacao")}}" id="form_anotacoes" method="post">
            <div id="div_msg" class="alert alert-danger d-none"></div>
            @csrf()
            <input type="hidden" id="id_anotacao" name="id_anotacao" value="{{isset($anotacao) ? $anotacao->id : ""}}">
            <input type="hidden" name="id_versiculo" value="{{$versiculo->id}}">
            <div class="mb-2 form-group">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" value="{{ isset($anotacao) ? $anotacao->titulo : "" }}" name="titulo" id="titulo" placeholder="Coloque um Título">
            </div>
            <div class="mb-2 form-group">
                <label for="anotacao" class="form-label">Anotação</label>
                <textarea class="form-control" id="anotacao" name="anotacao" rows="5">{{ isset($anotacao) ? $anotacao->anotacao : "" }}</textarea>
            </div>
            <div class="">
                <button type="button" id="bt_salvar_anotacao" class="btn btn-primary mb-1 float-end">Salvar Anotação</button>
            </div>

        </form>
    </div>
@endsection
