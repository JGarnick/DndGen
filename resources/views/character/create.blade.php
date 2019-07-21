@extends('layouts._layout')

@section('content')
<div class="container-fluid">
	<div class="row" id="vue-1">
		
		<form action="{{route('character.store')}}" class="col-12 pad-t-15" method="POST">
			{{csrf_field()}}
			<div class="col-12 form-group">
				<label class="form-label" for="name">Character Name</label>
				<input v-model="$store.state.char.name" class="form-control form-input" type="text" name="name" />
			</div>
			
			<span class="display-data">
				<div><span><strong>Race: </strong></span><span>@{{$store.state.char.race}}</span></div>
				<div><span><strong>Sub Race: </strong></span><span>@{{$store.state.char.subrace}}</span></div>
			</span>
			<span class="display-data">
				<div><span><strong>Strength: </strong></span><span>@{{$store.state.char.str.val}}</span></div>
				<div><span><strong>Dexterity: </strong></span><span>@{{$store.state.char.dex.val}}</span></div>
			</span>
			<span class="display-data">
				<div><span><strong>Constitution: </strong></span><span>@{{$store.state.char.con.val}}</span></div>
				<div><span><strong>Intelligence: </strong></span><span>@{{$store.state.char.int.val}}</span></div>
			</span>
			<span class="display-data">
				<div><span><strong>Wisdom: </strong></span><span>@{{$store.state.char.wis.val}}</span></div>
				<div><span><strong>Charisma: </strong></span><span>@{{$store.state.char.cha.val}}</span></div>
			</span>

			<span v-for="bonus in $store.state.char.bonuses" class="display-data">
				<div>
					<span><strong>Bonus: </strong></span>
					<span>Kind: @{{bonus.type}}, </span>
					<span>From: @{{bonus.source}}, </span>
					<span>To: @{{bonus.key}}, </span>
					<span>Amount: @{{bonus.val}}</span>
				</div>
			</span>

			<div class="col-offset-11 col-1">
				<input type="submit" value="Save" />
			</div>
		</form>
		
		<div class="tab-container col-12 pad-t-15">
			<v-tabcolumn :tabs="left_tabs"></v-tabcolumn>
			<v-tabcolumn :tabs="right_tabs"></v-tabcolumn>
		</div>
	</div>
	
	
</div>
<script>
	window.races = @json($races);
	window.subraces = @json($subraces);
	window.skills = @json($skills);
	window.cattributes = @json($attributes);

</script>
@endsection
