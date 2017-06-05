@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/fitmachines') }}">FitMachine</a> :
@endsection
@section("contentheader_description", $fitmachine->$view_col)
@section("section", "FitMachines")
@section("section_url", url(config('laraadmin.adminRoute') . '/fitmachines'))
@section("sub_section", "Edit")

@section("htmlheader_title", "FitMachines Edit : ".$fitmachine->$view_col)

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
				{!! Form::model($fitmachine, ['route' => [config('laraadmin.adminRoute') . '.fitmachines.update', $fitmachine->id ], 'method'=>'PUT', 'id' => 'fitmachine-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'mac_address')
					@la_input($module, 'description')
					@la_input($module, 'last_reported')
					@la_input($module, 'fw_version')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/fitmachines') }}">Cancel</a></button>
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
	$("#fitmachine-edit-form").validate({
		
	});
});
</script>
@endpush
