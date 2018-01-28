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

          <li class='well well-md' style='background-color:#fff;'>{{$message->message}}</li>


          
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
