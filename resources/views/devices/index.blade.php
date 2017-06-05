@extends("la.layouts.app")

@section("main-content")
    <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Id</th>
                <th>mac_addr</th>
                <th>description</th>
                <th>Last reported</th>
                <th>Firmware Version</th>
            </tr>
        </thead>
    </table>
@stop

@push('scripts')
<script src="{{ asset('la-assets/plugins/datatables/datatables.min.js') }}"></script>
<script>
$(function () {

    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'mac_addr', name: 'mac_addr' },
            { data: 'description', name: 'description' },
            { data: 'last_reported_ts', name: 'last_reported_ts' },
            { data: 'fw_version', name: 'fw_version' }
        ]
    });    

});
</script>

@endpush