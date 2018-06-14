@extends('layouts.app')

@section('content')
    @forelse($citas->chunk(3) as $chunk)
        @if(!$user->esMedico)
            <div class="card-group row course-set courses__row citas">
                @foreach($chunk as $cita)
                    <div class="card text-center mt-5">
                        <div class="card-header bg-primary">
                            <h1 class="text-light"><strong>Fecha de la cita:</strong></h1>
                            <h2>{{$cita->fecha_cita}}</h2>
                        </div>
                        <div class="card-body">
                            <div class="row prof">
                                <div class="col text-center">
                                    <h3><strong>Medico:</strong><a href="/user/{{\App\Cita::obtenerMedico($cita)->userName}}">{{\App\Cita::obtenerMedico($cita)->name}}</a></h3>
                                    <h3><strong>Clinica:</strong>{{$cita->clinica->nombre}}</h3>
                                </div>
                                <div class="col">
                                    <a href="/conversation/{{\App\Cita::obtenerMedico($cita)->name}}"><button class="btn btn-primary">Contactar Médico</button></a>
                                    <a href="#"><button id="btnCancelar" class="btn btn-danger">Cancelar cita</button></a>
                                    <div class="modal fade" id="cancelarCita" tabindex="-1" data-backdrop="static" data-show="false">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="ejemplo2Label">¿Cancelar cita?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Esta accion no se puede deshacer, ¿esta seguro?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" id="back" class="btn btn-primary">Volver atras</button>
                                                    <form action="{{Route('cita.delete', $cita->id)}}" method="post">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                        <button type="submit" id="accept" class="btn btn-danger">Cancelar Cita</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="card-group row course-set courses__row citas">
                @foreach($chunk as $cita)
                    <div class="card text-center mt-5">
                        <div class="card-header bg-primary">
                            <h1 class="text-light"><strong>Fecha de la cita:</strong></h1>
                            <h2>{{$cita->fecha_cita}}</h2>
                        </div>
                        <div class="card-body">
                            <div class="row prof">
                                <div class="col text-center">
                                    <h3><strong>Paciente:</strong><a href="/user/{{\App\Cita::obtenerPaciente($cita)->userName}}">{{\App\Cita::obtenerPaciente($cita)->name}} {{\App\Cita::obtenerPaciente($cita)->lastName}}</a></h3>
                                    <h3><strong>Clinica:</strong>{{$cita->clinica->nombre}}</h3>
                                    <a href="/conversation/{{\App\Cita::obtenerPaciente($cita)->name}}"><button class="btn btn-primary">Contactar Paciente</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    @empty
        <div class="text-center mt-5">
            <h1>No existe ninguna cita</h1>
        </div>
    @endforelse
    <div class="mt-5">
        {{ $citas->links('pagination::bootstrap-4') }}
    </div>
    @push('scripts')
        <script src="{{ asset('js/modalCita.js') }}" defer></script>
    @endpush
@endsection