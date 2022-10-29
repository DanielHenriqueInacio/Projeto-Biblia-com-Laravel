@extends("layouts.main")

@section("title", "Home - ")

@section("content")
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <form class="d-flex" method="get" action="">
                <input value="{{ $busca }}" name="busca" id="busca" class="border rounded form-control" type="text"
                       autofocus=""
                       placeholder="Busque aqui ...">
                <button class="btn btn-primary border rounded float-end" id="bt_busca" type="button">Buscar</button>
            </form>
        </div>
    </div>

    <!-- So vai aparecer quando houver busca -->
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 mx-auto">
            @forelse($versiculos as $versiculo)
                <p>{{$versiculo->text}} <strong>{{$versiculo->livro->name}} {{$versiculo->chapter}}
                        , {{$versiculo->verse}}</strong>
                    <a href="{{route("versiculos_biblia", [$versiculo->book, $versiculo->chapter])}}"
                       class="btn btn-info btn-sm btn-acesso-busca" title="Clique para visualizar o Capitulo">
                        <i class="fa fa-long-arrow-right"></i>
                    </a>
                </p>
            @empty
                @if ($busca)
                    <div class="alert alert-warning">Nada foi encontrado.</div>
                @endif
            @endforelse
            @if (count($versiculos) > 0)
                {{$versiculos->links()}}
            @endif
        </div>
    </div>
@endsection
