@extends('pages/welcome')
@section('style')
<style type="text/css">

/**/
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

/**/


.modal-content{
  display: none;
  z-index: 1;
}

a{
  color: black;
}

ul{
	list-style: none;
//	display: flex;
padding-left: 0;
padding-left: 30%;

    list-style-type: none;
}
body{
//	background: url('{{asset('js/bgpng2.png')}}');
background-color: #F5F5F5;
}	
</style>
@endsection
@section('content')

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn">&times;</a>
  <a href="#">Delete Account</a>


  {!!Form::open(['action'=>['registerController@destroy',$user->id] , 'method'=>'POST'])!!}

{{Form::hidden('_method','DELETE')}}
{{Form::submit('Delete',['class'=>'btn btn-danger'])}}

  {!!Form::close()!!}





  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

<div id="main">

<nav class="navbar" style="background: #00bfff;">
  <div class="container" >
    <div class="navbar-header">
      <span class="navbar-brand" id="drawer" >&#9776;</span>
      <a class="navbar-brand" href="#">WebName</a>
    </div>
    <ul class="nav navbar-nav pull-right">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Page 1</a></li>
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
    </ul>
  </div>
</nav>

<h1>Welcome {{$user->name}}</h1>




<form action="logout">
<button type="submit" class="btn btn-default">Logout <span class="glyphicon glyphicon-log-out"></span></button>
</form>
<a href="people" class="btn well well-sm">See people present here !!!</a>

<hr>
<a href="testChat" class="button btn-lg"><div  class="container text-center alert-info">
	Start Chat in New Window <span class="glyphicon glyphicon-new-window"></span>
</div>
</a>

<div class="container" style="background-color: #fff;">Your friend list
<br>
<div class="row">
	<div class="col-md-4">
		<div class="thumbnail">
      <ul id="ulList"></ul>	
  	</div>
	</div>
	<div class="col-md-8">
		<div class="">
			
			<!--chtbox content-->   
    
  <div class="modal-content" style="background-color:#000;">
 
    <div class="modal-header" style="color: #f0f0f0">
        <h3 class="modal-title">Chat Room {{(session('id'))}} 
        </h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">          
        </button>
      </div>       
      
        <div  class="modal-body" id="chat_body" style="height:340px;border:solid 2px orange;overflow:scroll;overflow-x:hidden;overflow-y:scroll; overflow-wrap: break-word; ">
    <!-- with chatscript1 -->
        @if(count($chatMessages)>0)
        <ul id="ulMessages" style="overflow:none;overflow-x:hidden;overflow-wrap: break-word;">
        
          @foreach($chatMessages as $message)

<!--
          <li class='well well-md' style='background-color:#fff;'>{{$message->message}}</li>
        -->
            @if(!empty($message->receivedmsgby1.message))
            <li class='well well-md' style='background-color:#fff; padding-right: 30%;'>{{$message->receivedmsgby1.message}}<br><small class='pull-right' style='color:#f08080;    font-weight: bold;'><span class='glyphicon glyphicon-ok'></span></small></li>
            @else
             <li class='well well-md' style='background-color:#fff; padding-left: 30%;'>{{$message->receivedmsgby3.message}}<br><small class='pull-right' style='color:#f08080;    font-weight: bold;'><span class='glyphicon glyphicon-ok'></span></small></li>
          
           @endif         
        </ul>


        @endforeach


        @else
        <ul id="ulMessages" style="overflow:none;overflow-x:hidden;overflow-wrap: break-word;">
        </ul>

        @endif
<!--with chatscript2   <div id="chatboxWithBorder"><span></span></div>-->
      </div>

      <div class="modal-footer">
<div>
  <div class="input-group pull-left" style="width:70%;">    
      <input type="text" class="form-control" placeholder="Type message here" name="message_tosend" id="msg_input" >
      <div class="input-group-btn">

        <button class="btn btn-default" type="submit" id="send_btn"><i class="glyphicon glyphicon-send"></i>  Send</button>
      </div>
    </div>
<form method="post" action='' enctype="multipart/form-data">
  <input type="file" name="">
        <button type="button" class="btn btn-primary">Send a file</button>
</form>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
  </div>




    </div>





<!---chatbox ends herhe-->
		</div>
	</div>
</div>
</div>

</div>

<!--
<script type="text/javascript" src="{{asset('js/chatscriptDashboard.js')}}">
</script>
-->
<script type="text/javascript">
  var richness=1;
$('document').ready(function(){



  $.get('/Project/public/friends/show/{{session('id')}}').done(function(data){
    console.log(data);
    var myArr=data;
    if(myArr.length>0){
        $.each(myArr,function(i,friend){
          
          $('ul#ulList').append('<li >'+friend.name+' <div class=\'pull-right\'><a onclick=showChatBox('+friend.fid+')>Chat</a> <a>Unfriend</a></div></li>');

        });
      }
      else{
        $('ul#ulList').append('<li>'+"Friends list is empty"+'</li>');
      }
    });
 

$('#drawer').on('click',function(){
  $("#mySidenav").css('width',"250px");
    $("#main").css('marginLeft',"250px");
    
  });



$('.closebtn').on('click',function(){
  

  $("#mySidenav").css('width',"0");
    $("#main").css('marginLeft',"0");
    $('body').css({backgroundColor:'white'});
  });  





});

function showChatBox(sendingTo_Id){
  richness=sendingTo_Id;



   $.ajax({
      url: "{{asset('js/chatscriptDashboard.js')}}",
      dataType: "script",
      success:"data"
    });


  $('.modal-content').css("display","block");

$('h3.modal-title').text('Sendin a message to '+richness);

//$('#modal-title').css();


}

function getsendingToId(){
return richness;
}

</script>

@endsection

