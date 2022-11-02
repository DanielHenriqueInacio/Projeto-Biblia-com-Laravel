@extends("layouts.main")

@section("title", "Versiculos Biblicos - ")

@section("content")
    <div class="row">
        <div class="col-md-8 col-xl-8 mx-auto">
            <h3 class="mb-3">Versiculos Favoritados</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-xl-8 mx-auto">
            @forelse($favoritos as $favorito)
                <p>{{$favorito->text}} <strong>{{$favorito->livro}} {{$favorito->chapter}}
                        , {{$favorito->verse}}</strong>
                    <a href="{{route("versiculos_biblia", [$favorito->book, $favorito->chapter])}}"
                       class="btn btn-info btn-sm btn-acesso-busca" title="Clique para visualizar o Capitulo">
                        <i class="fa fa-long-arrow-right"></i>

                    </a>
                    <a href="#" class="bt_remover_favorito" title="Remover este versiculo do favorito."
                       data-versiculo="{{$favorito->id_versiculo}}">
                        <i class="fa fa-times text-danger"></i>
                    </a>
                </p>
            @empty
                <div class="alert alert-info"></div>
            @endforelse
        </div>
    </div>
@endsection
