<x-HeaderMenuAdmin>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gérer Emplois</title>
         @livewireStyles
    </head>
    <body>
        <div class="container">
            <div class="tableContainer">
                <h3>les Emplois</h3>
                <table class="table table-striped" style="font-size: 19px; font-weight:300; width: 70vw;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th scope="col">Date Start</th>
                            <th scope="col">Date End</th>
                            <th style="width: 300px ;overflow: hidden;" colspan="4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($emplois)
                            @foreach ($emplois->reverse() as $key => $emploi)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $emploi['datestart'] }}</td>
                                    <td>{{ $emploi['dateend'] }}</td>
                                    <td style="display: flex; overflow: hidden;">
                                        <form style="margin-left:20px" action="{{ route('activationEmploi', $emploi['id']) }}" method="POST">
                                            @csrf
                                            @if ($emploi['confirmer'] == 0)
                                                <button class="btn btn-success EditButton">Activer</button>
                                            @else
                                                <button class="btn btn-danger EditButton">Desactiver</button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    </html>
</x-HeaderMenuAdmin>
