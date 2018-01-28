@extends('pages/welcome')
@section('content')
@if(count($people)>0)

@section('style')
@endsection

<div class="container">
	


<hr>
			<div class="container">
					<input type="hidden" id="identifier" value="{{session('_token')}}">
					@foreach($people as $friend)
					<div id="{{$friend->id}}" class="row">
						<div class="col-md-5">
							{{$friend->name}}
 							</div>
						<div class="col-md-5">
							<button id="bt{{$friend->id}}" class="btn btn-info btn-md" onclick="add({{session('id')}},{{$friend->id}})">add</button>
						</div>

					</div>
					<hr>
					@endforeach

				</div>



</div>

@endif

@endsection
@section('scripts')
<script type="text/javascript">
	function add(me,uid){
		//$('.loader').css({display:'block'});
    $("button#bt"+uid).attr("disabled", "disabled");
		$.post('friends/storing',{_token:$("#identifier").val(),id:uid,whois:me}).done(function(data){
		//$('.loader').css({display:'none'});
		$("button#bt"+uid).removeAttr("disabled");

/*remove clicked list item*/
$('div div#'+uid).detach();

			console.log(data);

		});
	}
</script>

@endsection