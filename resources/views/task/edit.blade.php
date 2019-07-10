@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crear Tarea</div>
                <div class="card-body">
                    <form method="post" action="{{ route('task.update',$tarea->id) }}">
                        {{ method_field('PUT') }}@csrf
                    <div class="form-group">
                        <label for="calle" class="col-form-label">Tarea</label>
                        <input type="text" class="form-control" id="calle" name="name" placeholder=" ingrese Tarea"  value ="{{ $tarea->name}}"required>
                    </div>
                    <div class="form-group">
                        <label for="tel" class="col-form-label">Categoria</label>
                        <select name="category" id="cuerpo_id" class="form-control input-sm">
                        <option value="">Seleccione catergoria</option>
                    @foreach($categoria as $cat)
                        <option value="{{ $cat->id }}" {{$tarea->category == $cat->id ? "selected" : "" }}>{{ $cat->name}}</option>
                    @endforeach
                        </select>
                          
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Editar Tarea </button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
