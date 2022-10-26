@extends("layouts.main")

@section("title", "Home - ")

@section("content")
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <form class="d-flex" method="get" action="index.php">
                <input value="" name="busca" id="busca" class="border rounded form-control" type="text" autofocus="" placeholder="Busque aqui ...">
                <button class="btn btn-primary border rounded float-end" id="bt_busca" type="button">Buscar</button>
            </form>
        </div>
    </div>

    <!-- So vai aparecer quando houver busca -->
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 mx-auto">

        </div>
    </div>
@endsection
