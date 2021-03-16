<x-layout>
    <div>                    
        <div class="d-flex p-2 bd-highlight">
            <form class="form-inline my-2" action="{{ route('post') }}" method="POST">
                @csrf
                <div class="form-group mb-2">
                    <label class="col-form-label text-monospace" for="rut">Ingresa un rut</label>
                    <div class="form-group mx-sm-3">
                        <input class="form-control @error('rut') text-danger @enderror" type="text" id="rut" name="rut">
                        @error('rut')
                            <p class="form-text text-danger ml-2 mb-0">{{ $errors->first('rut') }}</p>   
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary mb-2" type="submit">Enviar</button>
            </form>
        </div>                                                                    
    </div>

    @isset($msg)
        <p class="alert alert-warning alert-dismissible fade show mx-auto text-center font-weight-bold" style="width: 600px;" role="alert">
            {{ $msg }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </p>
    @endisset

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col" style="width: 150px;">Rut</th>
                <th scope="col" class="text-center" style="width: 250px;">Razon social</th>
                <th scope="col" class="text-center" style="width: 700px;">Actividades</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $p)
            <tr >
                <td class="align-middle">{{$p->rut}}</td>
                <td class="align-middle">{{$p->razon_social}}</td>
                <td class="align-middle">{{$p->actividades}}</td>
                <td class="align-middle">
                    <a href="{{ route('persona.edit', $p->id) }}">Editar</a>
                </td>
                <td class="align-middle">
                    <form action="{{ route('persona.destroy', $p->id) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach            
        </tbody>
    </table>

    <div class="text-center mt-3">
        <p class="text-monospace">Click 
            <a href="{{ route('persona.pdf') }}">aqui</a>
            para ver en PDF
        </p>
    </div>

</x-layout>