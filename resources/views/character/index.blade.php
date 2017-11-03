@extends('layouts._layout')

@section('content')
<div class="container">
    <div class="row">
		<div class="col-xs-12">
			<h1>Characters</h1>
			<hr class="spacer-small" />
			<table id="character-table" class="display dt-responsive">
				<thead>
					<tr>
						<th>Name</th>
						<th>Race</th>
						<th>Class</th>
						<th>Level</th>
					</tr>
				</thead>
				<tbody>
				@foreach($characters AS $character)
					<tr>
						<td>{{$character->name}}</td>
						<td>{{$character->race}}</td>
						<td>{{$character->class}}</td>
						<td>{{$character->level}}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
    </div>
</div>
@endsection