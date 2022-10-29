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
                    <a href="#" class="bt_afavoritar" data-versiculo="" title="Clique para afavoritar esse versículo">
                        <i class="fa fa-star-o"></i><br>
                    </a>
                </p>
            @endforeach
        </div>
        <div class="col-md-3">
            @for($i = 1; $i <= $totalCapitulos; $i++)
                <a href="{{route("versiculos_biblia", [$livro, $i])}}" class="btn btn-{{ $capitulo == $i ? "secondary" : "info" }} btn-capitulo">
                    {{$i}}
                </a>
            @endfor
        </div>
    </div>
@endsection
