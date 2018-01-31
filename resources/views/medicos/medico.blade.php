<div class="row medicos">
    <div class="col-md-12">
        <div class="col-md-4">
            <p><strong>Autor:</strong><a href="/user/{{$medico->user->userName}}">{{$medico->user->userName}}</a></p>
            <img src="{{$medico['imagen']}}" alt="Imagen del médico">
        </div>
        <div class="col-md-7">
            <p><strong>Nombre:</strong>{{ $medico['nombre'] }}</p>
            <p><strong>Email:</strong>{{ $medico['email'] }}</p>
            <p><strong>Especialidad:</strong> {{ $medico['especialidad'] }}</p>
            <p><strong>Clinicas:</strong>{{ $medico['clinicas'] }}</p>
            <p><strong>Nº de colegiado:</strong>{{ $medico['num_colegiado'] }}</p>
            <p><strong>Curriculum:</strong>{{ $medico['curriculum'] }}</p>
            <p><strong>Favoritos:</strong>{{ $medico['favoritos'] }}</p>
        </div>
    </div>
</div>