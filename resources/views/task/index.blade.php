@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <a href="{{ URL::to('task/create') }}" class="btn btn-primary float-right">Crear Tarea</a>
        </div>  
        <div class="col-md-8"> 
             
            <div class="card  ">
                <div class="card-header bg-danger">Pendientes</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                            <th>Nombre</th>
                            <th>Fecha de Creacion</th>
                            <th>Archivar</th>
                            <th>Editar</th>
                            </tr>
                        </thead>
                        <tbody>
                    @foreach($tarea as $tsk)
                        <tr>
                        <td>{{ $tsk->name }}</td>
                        <td>{{ Carbon\Carbon::parse($tsk->createdAt)->format('d-m-Y ') }}</td>
                        <td><a href="{{route('task.archived', array($tsk->id))}}">
                        <span><i class="fas fa-archive"></i> archivar</span>
                        </a></td>
                        <td> <a href="{{route('task.edit', array($tsk->id))}}">
                        <span> <i class="fas fa-edit"></i> Editar</span>
                        </a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header bg-primary">En Progreso</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Fecha de Creacion</th>
                            <th>Archivar</th>
                            <th>Editar</th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($progreso as $pro)
                        <tr>
                            <td>{{ $pro->name }}</td>
                            <td>{{ Carbon\Carbon::parse($pro->createdAt)->format('d-m-Y ') }}</td>
                            <td><a href="{{route('task.archived', array($pro->id))}}">
                            <span><i class="fas fa-archive"></i> archivar</span>
                            </a></td>
                            <td><a href="{{route('task.edit', array($pro->id))}}">
                            <span>Editar</span>
                            </a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Finalizadas</div>
                <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                            <tr>
                            <th>Nombre</th>
                            <th>Fecha de Creacion</th>
                            <th>Archivar</th>
                            <th>Editar</th>
                            </tr>
                        </thead>
                    <tbody>
                    @foreach($finalizada as $fin)
                    <tr>
                        <td>{{ $fin->name }}</td>
                        <td>{{ Carbon\Carbon::parse($fin->createdAt)->format('d-m-Y ') }}</td>
                        <td><a href="{{route('task.archived', array($fin->id))}}">
                        <span><i class="fas fa-archive"></i> archivar</span>
                        </a></td>
                        <td><a href="{{route('task.edit', array($fin->id))}}">
                        <span>Editar</span>
                        </a></td>
                    </tr>
                    @endforeach
                     </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection