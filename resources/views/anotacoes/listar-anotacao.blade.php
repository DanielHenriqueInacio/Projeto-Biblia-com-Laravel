@extends("layouts.main")

@section("title", "Anotações - ")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h3>Minhas Anotações</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @forelse($anotacoes as $anotacao)
                <div class="card mt-4 card-anotacao-{{ $anotacao->id }}">
                    <div class="card-header text-bg-secondary">
                        <div class="row">
                            <div class="col-md-11">
                                {{($anotacao->text)}}
                                <strong>
                                    {{$anotacao->livro}} {{$anotacao->chapter}}, {{$anotacao->verse}}
                                </strong>
                            </div>
                            <div class="col-md-1">
                                <div class="float-end">
                                    <a href="#"
                                       class="btn btn-light btn-sm text-danger bt_excluir_anotacao"
                                       title="#"
                                       data-anotacao="{{ $anotacao->id }}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                    <a href="{{ route("modal_anotacao", $anotacao->id_versiculo) }}"
                                       class="btn btn-light btn-sm text-success" data-fancybox data-type="iframe">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <h4>{{$anotacao->titulo}}</h4>
                        <p class="card-text">
                            {{ $anotacao->anotacao }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="alert alert-info">
                    <p>Você não tem nenhuma anotação.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection
