@extends("layouts.main")

@section("title", "Home - ")

@section("content")
{{--@foreach($livros as $livro)--}}
{{--    <p>{{ $livro->name }} - {{ $livro->testamento->name }}</p>--}}
{{--@endforeach--}}

    @foreach($testamentos as $testamento)
        <p>{{$testamento->name}}</p>
        <ul>
            @foreach($testamento->livros as $livro)
            <li>{{$livro->name}}</li>
            @endforeach
        </ul>
    @endforeach
@endsection
