@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/devices') }}">Device</a> :
@endsection
@section("contentheader_description", $device->$view_col)
@section("section", "Devices")
@section("section_url", url(config('laraadmin.adminRoute') . '/devices'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Devices Edit : ".$device->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($device, ['route' => [config('laraadmin.adminRoute') . '.devices.update', $device->id ], 'method'=>'PUT', 'id' => 'device-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'mac_addr')
					@la_input($module, 'description')
					@la_input($module, 'nonce')
					@la_input($module, 'zone')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/devices') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#device-edit-form").validate({
		
	});
});
</script>
@endpush
