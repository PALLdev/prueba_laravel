<x-layout>
    <div class="mx-auto text-center">
        <h1>Consultas guardadas</h1>
    </div>

    <div style="display: flex;flex-wrap: wrap;">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-left">ID</th>
                    <th scope="col" class="text-left">RUT</th>
                    <th scope="col" class="text-left">RAZON SOCIAL</th>
                    <th scope="col" class="text-left">ACTIVIDADES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($personas as $persona)
                    <tr >
                        <th style="width: 1px;" class="text-left">{{$persona->id}}</th>
                        <td style="width: 85px;" class="text-left">{{$persona->rut}}</td>
                        <td class="text-left">{{$persona->razon_social}}</td>
                        <td style="width: 1px;" class="text-left">{{$persona->actividades}}</td>
                        <td></td>
                        <td></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>