@extends("layouts.main")

@section("title", "Versiculos Biblicos - ")

@section("content")
    <div class="row">
        <div class="col-md-12">
            <h2>{{$versiculos[0]->livro->name}}, {{$capitulo}}</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            @foreach($versiculos as $versiculo)
                <p><sup>{{$versiculo->verse}}</sup> {{$versiculo->text}}
                    @if(Auth::check())
                    <a href="{{ route("modal_anotacao", $versiculo->id) }}" class="btn btn-light btn-sm text-warning" title="#" data-versiculo="" data-fancybox data-type="iframe"><i class="fa fa-comment"></i></a>
                    <a href="#"
                       class="btn btn-light btn-sm {{ in_array($versiculo->id, $versiculosFavoritos) ? "bt_desafavoritar" : "bt_afavoritar" }}"
                       title="Clique para {{ in_array($versiculo->id, $versiculosFavoritos) ? "desafavoritar" : "afavoritar" }} esse versículo"
                    data-versiculo="{{ $versiculo->id }}"><i class="fa {{ in_array($versiculo->id, $versiculosFavoritos) ? "fa-star" : "fa-star-o" }}"></i>
                    </a>
                    @endif
                </p>
            @endforeach
        </div>
        <div class="col-md-3">
            @for($i = 1; $i <= $totalCapitulos; $i++)
                <a href="{{route("versiculos_biblia", [$livro, $i])}}"
                   class="btn btn-{{ $capitulo == $i ? "secondary" : "info" }} btn-capitulo">
                    {{$i}}
                </a>
            @endfor
        </div>
    </div>
@endsection
