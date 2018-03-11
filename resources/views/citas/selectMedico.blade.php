<div class="form-group selectMedicos">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text bg-primary text-light" for="inputGroupSelect01">Médico</label>
        </div>
        <select class="custom-select" id="medicos" name="medico">
            <option>Elija un médico...</option>
            @foreach($selectedClinica->users  as $medico)
                <option value="{{$medico->id}}">Nombre: {{$medico->name}}</option>
            @endforeach
        </select>
    </div>
</div>

<div hidden class="form-group hora">
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <label class="input-group-text bg-primary text-light" for="datetimepicker">Fecha y hora de la cita</label>
        </div>
        <input id="datetimepicker" name="horaCita" type="text" >
    </div>

    <div hidden class="alert alert-danger" id="alertFecha" role="alert">
        Fecha no disponible.
    </div>
</div>

<button hidden disabled class="btn btn-primary" onclick="this.disabled=true;this.form.submit();" type="submit" id="pedirCita">Pedir cita</button>