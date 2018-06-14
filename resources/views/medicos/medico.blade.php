<div class="row medicos">
        <div class="col-lg-4 mt-5">
            <img src="{{$medico['avatar']}}" alt="Imagen del médico">
        </div>
        <div class="col info-medico">
            <p><strong>Nombre:</strong>{{ $medico['name'] }}</p>
            <p><strong>Email:</strong>{{ $medico['email'] }}</p>
            <p><strong>Especialidad:</strong> {{ $medico['especialidad'] }}</p>
            <p><strong>Clinicas:</strong>
                @foreach($medico->clinicas as $clinica)
                    <h5><span class="badge badge-secondary">{{ $clinica->nombre }}</span></h5>
                @endforeach
            </p>
            <p><strong>Nº de colegiado:</strong>{{ $medico['num_colegiado'] }}</p>
            <p><strong>Curriculum:</strong>{{ $medico['curriculum'] }}</p>
            <p><strong>Favoritos:</strong>{{ $medico['favoritos'] }}</p>
        </div>
</div>