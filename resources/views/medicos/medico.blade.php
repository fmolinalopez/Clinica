<div class="row medicos">
        <div class="col-lg-4">
            <p><strong>Creado por:</strong><a href="/user/{{$medico->user->userName}}">{{$medico->user->userName}}</a></p>
            <img src="{{$medico['imagen']}}" alt="Imagen del médico">
        </div>
        <div class="col info-medico">
            <p><strong>Nombre:</strong><a href="/{{ $medico->nombre  }}/clinicas">{{ $medico['nombre'] }}</a></p>
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