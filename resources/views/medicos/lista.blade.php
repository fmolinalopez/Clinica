@foreach($medicos as $medico)
    @include('medicos.medico')
@endforeach
<div class="centro">{{ $medicos->links('pagination::bootstrap-4') }}</div>
@push('scripts')
    <script src="{{ asset('js/datos.js') }}" defer></script>
@endpush