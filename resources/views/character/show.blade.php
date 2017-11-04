@extends('layouts._layout')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12">
			<h1>{{$character->name}}</h1>
		</div>
		<div class="col-xs-12">
			<form class="form-horizontal clearfix" action="{{route('character.update', $character->id)}}" method="POST">
				<div class="col-xs-6">
					<div id="tabs" class="left-section">
						<ul>
							<li><a href="#tab-1">Race</a></li>
							<li><a href="#tab-2">Ability Scores/Feats</a></li>
							<li><a href="#tab-3">Background</a></li>
							<li><a href="#tab-4">Class/Level</a></li>
							<li><a href="#tab-5">Spells</a></li>
							<li><a href="#tab-6">Proficiencies</a></li>
							<li><a href="#tab-7">Equipment</a></li>
						</ul>
						<div id="tab-1" class="row">
							<h2 class="col-xs-offset-1">Race</h2>
							<h4 class="col-xs-offset-1"><i>select 1<i></h4>
							<hr class="spacer-small" />
							<div id="selectable" class="clearfix selectable-wrapper">
								@foreach($races AS $race)
									<span class="col-xs-6 tab-interactable">{{$race->name}}</span>
								@endforeach
							</div>
							
						</div>	
							
							
							
							
							
							
							
							
							
							
							
							
							{{--<div class="form group">
								<label for="name" class="col-sm-2 control-label">Name</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="name" value="{{$character->name}}" />
								</div>
							</div>
							<div class="form group">
								<label for="race" class="col-sm-2 control-label">Race</label>
								<div class="col-sm-10">
									<select name="race" class="form-control">
										<option value="">Select a Race</option>
										@foreach($races AS $race)
											<option @if($character->race->id === $race->id) selected @endif value="{{$race->id}}">{{$race->name}}</option>
										@endforeach
									</select>
								</div>
							</div>
							<div class="form group">
								<label for="class" class="col-sm-2 control-label">Class</label>
								<div class="col-sm-10">
									<select name="class" class="form-control">
										<option value="">Select a Class</option>
										@foreach($classes AS $class)
											<option @if($character->class->id === $class->id) selected @endif value="{{$class->id}}">{{$class->name}}</option>
										@endforeach
									</select>
								</div>
							</div>--}}
						
						<div id="tab-2">
							<p>Ability Scores/Feats</p>
						</div>
						<div id="tab-3">
							<p>Background</p>
						</div>
						<div id="tab-4">
							<p>Class/Level</p>
						</div>
						<div id="tab-5">
							<p>Spells</p>
						</div>
						<div id="tab-6">
							<p>Proficiencies</p>
						</div>
						<div id="tab-7">
							<p>Equipment</p>
						</div>
					</div>
				</div>
				<div class="col-xs-6 right section">
					
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

<style>

</style>