<x-layout>
    <div class="mt-2 bg-white overflow-hidden shadow sm:rounded-lg">                    
        <div class="flex">
            <form class="form-group" action="{{ route('post') }}" method="POST">
                @csrf
                <label class="ml-12" for="rut">Ingresa un rut</label>
                <input type="text" id="rut" name="rut">
                <button class="" type="submit">Enviar</button>
            </form>
        </div>                                                                    
    </div>

    @isset($msg)
        <p>{{ $msg }}</p>
    @endisset

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Rut</th>
                <th>Razon social</th>
                <th>Actividades</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $p)
            <tr>
                <td>{{$p->rut}}</td>
                <td>{{$p->razon_social}}</td>
                <td>{{$p->actividades}}</td>
                <td>
                    <a href="{{ route('persona.edit', $p->id) }}">Editar</a>
                </td>
                <td>
                    <form action="{{ route('persona.destroy', $p->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach            
        </tbody>
    </table>

</x-layout>