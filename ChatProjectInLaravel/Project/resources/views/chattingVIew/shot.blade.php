@if(Auth::check())

@else
  <script>window.location.href = "{{route('homewelcome')}}";</script>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="device-width,initial-scale=1">
	<title></title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<style type="text/css">
ul{
	list-style: none;
//	display: flex;
padding-left: 0;
padding-right: 30%;

    list-style-type: none;
}
body{
	background: url('{{asset('js/bgpng2.png')}}');
}	
</style>
</head>
<body>
<div class="container" >
  <div class="" role="document">
    <div class="modal-content" style="background-color:#000;opacity: 0.7	;">
      <div class="modal-header" style="color: #f0f0f0">
        <h3 class="modal-title ">Chat Room {{(session('id'))}} 
<form action="logout" class="pull-right">
<button type="submit" class="btn btn-default" >Logout</button>
</form></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">          
        </button>
      </div>       
      	<div  class="modal-body" id="chat_body" style="height:340px;border:solid 2px orange;overflow:scroll;overflow-x:hidden;overflow-y:scroll; overflow-wrap: break-word; ">
    <!-- with chatscript1 -->
        <ul style="overflow:none;overflow-x:hidden;overflow-wrap: break-word;"><li></li>
        </ul>
<!--with chatscript2   <div id="chatboxWithBorder"><span></span></div>-->
      </div>
      <div class="modal-footer">
<div>
  <div class="input-group pull-left" style="width:70%;">  	
      <input type="text" class="form-control" placeholder="Type message here" name="message_tosend" id="msg_input" autofocus>
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
  </div>
</div>
<script type="text/javascript" src="{{asset('js/chatscript.js')}}">

</script>
</body>
</html>