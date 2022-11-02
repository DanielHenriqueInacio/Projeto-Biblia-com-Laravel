@extends("layouts.main")

@section("title", "Books Biblicos - ")

@section("content")
    <div class="row">
        <div class="col-md-12">

            <h3 class='mb-3'>
                {{ $nomeTestamento }}
            </h3>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul class="list-group">
                @foreach($livros as $livro)
                    <li class="list-group-item">
                        <span><a href="{{route("versiculos_biblia", $livro->id)}}" class="">{{$livro->name}}</a></span>
                        <span class="float-end">{{$livro->testamento->name}}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
