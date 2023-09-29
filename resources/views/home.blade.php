@extends ("layouts.public")


@section('content')
<div class="container">
        <div class="row">
        <div class="col mt-5">
            <table class="table">
            <thead>
                <tr>
                <th>Azienda</th>
                <th>Partenza</th>
                <th>Arrivo</th>
                <th>Data</th>
                <th>Orario Partenza</th>
                <th>Orario Arrivo</th>
                <th>Codice</th>
                <th>N carrozze</th>
                <th>In Orario</th>
                <th>Cancellato</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($trains as $train)
                    @php
                        $today = \Carbon\Carbon::now()->format('Y-m-d');  // data odierna nel formato Y-m-d
                        $trainDate = \Carbon\Carbon::parse($train['data'])->format('Y-m-d');  // data del treno nel formato Y-m-d
                    @endphp

                    @if ($trainDate === $today)
                        <tr>
                            <td>{{$train["azienda"]}}</td>
                            <td>{{$train["stazione_di_partenza"]}}</td>
                            <td>{{$train["stazione_di_arrivo"]}}</td>
                            <td>{{$train["data"]}}</td>
                            <td>{{$train["orario_di_partenza"]}}</td>
                            <td>{{$train["orario_di_arrivo"]}}</td>
                            <td>{{$train["codice_treno"]}}</td>
                            <td>{{$train["numero_carrozze"]}}</td>
                            <td>{{$train["in_orario"] === 0 ? "in ritardo" : "in orario"}}</td>
                            <td>{{$train["cancellato"] === 0 ? "no" : "cancellato"}}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
@endsection