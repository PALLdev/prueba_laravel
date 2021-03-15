<x-layout>

    <h1 class="heading">Editar persona</h1>

    <form action="{{route('persona.update', $persona->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="rut">Rut</label>
            <input type="text" name="rut" class="form-control" value="{{ $persona->rut }}">
        </div>
        <div class="form-group">
            <label for="razon_social">Razon Social*</label>
            <input type="text" name="razon_social" class="form-control" value="{{ $persona->razon_social }}">
        </div>
        <div class="form-group">
            <label for="actividades">Actividades</label>
            <div class="row">
                <div class="col-md-2">
                    Key:
                </div>
                <div class="col-md-4">
                    Value:
                </div>
            </div>
            @for ($i=0; $i <= 4; $i++)
            <div class="row">
                <div class="col-md-2">
                    <input type="text" name="actividades[{{ $i }}][key]" class="form-control" value="{{ old('actividades['.$i.'][key]') }}">
                </div>
                <div class="col-md-4">
                    <input type="text" name="actividades[{{ $i }}][value]" class="form-control" value="{{ old('actividades['.$i.'][value]') }}">
                </div>
            </div>
            @endfor
        </div>
        <div>
            <input class="btn btn-danger" type="submit">
        </div>
    </form>
</x-layout>