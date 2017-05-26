@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/organisations') }}">Organisation</a> :
@endsection
@section("contentheader_description", $organisation->$view_col)
@section("section", "Organisations")
@section("section_url", url(config('laraadmin.adminRoute') . '/organisations'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Organisations Edit : ".$organisation->$view_col)

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
				{!! Form::model($organisation, ['route' => [config('laraadmin.adminRoute') . '.organisations.update', $organisation->id ], 'method'=>'PUT', 'id' => 'organisation-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'name')
					@la_input($module, 'sub_domain')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/organisations') }}">Cancel</a></button>
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
	$("#organisation-edit-form").validate({
		
	});
});
</script>
@endpush
