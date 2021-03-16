<x-layout>

    <h1 class="heading text-center my-3">Editar persona</h1>

    <form action="{{route('persona.update', $persona->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="rut">Rut</label>
            <input type="text" name="rut" class="form-control @error('rut') text-danger @enderror" id="rut" value="{{  old('rut', $persona->rut) }}">
            @error('rut')
                <p class="form-text text-danger">{{ $errors->first('rut') }}</p>   
            @enderror
        </div>
        
        
        <div class="form-group">
            <label for="razon_social">Razon Social</label>
            <input type="text" name="razon_social" id="razon_social" class="form-control @error('razon_social') text-danger @enderror" value="{{  old('razon_social', $persona->razon_social) }}">
            @error('razon_social')
                <p class="form-text text-danger">{{ $errors->first('razon_social') }}</p>   
            @enderror
        </div>
        
        <div class="form-group">
            <label for="actividades">Actividades</label>
            <div class="row">
                <div class="col-md-2">
                    Key:
                </div>
                <div class="col-md-4">
                    Valor:
                </div>
            </div>
        </div>
        <div class="text-center">
            <input class="btn btn-info" type="submit">
            <a href="/" class="btn btn-danger" type="submit">Volver</a>
        </div>
    </form>
</x-layout>