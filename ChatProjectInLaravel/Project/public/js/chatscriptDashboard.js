//http://javascriptobfuscator.com/Javascript-Obfuscator.aspx
//mix with http://www.spiritualbee.com/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.5

	


document.getElementById("msg_input").value="";


	
	$("#msg_input").keyup(function(e){
		
		var code=e.which;
		if(code==13 && (e.target.value!=='')){
		//alert('sending...'+$('#msg_input').val());
		
		
		check(e.target.value,getsendingToId());
			e.target.value='';
		
	}
});


	$("#send_btn").click(function(e){
		//alert('sending...'+$('#msg_input').val());
		if($('#msg_input').val()!=='' ){
		check($('#msg_input').val(),getsendingToId());
		//$('ul').append('<li>'+$('#msg_input').val()+'</li>');
		document.getElementById("msg_input").value="";
	}
});




function check(message,sendingTo_Id){

//$('ul').append("<li><img src='/Project/public/js/sending.gif'></li>");

$('ul#ulMessages').append("<li><b><i><span class='progress'><span class='progress-bar progress-bar-success progress-bar-striped active' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width:100%'>Sending...</span></span></i></b></li>");
$.get('/Project/public/validate').done(function(token){

		$.post('/Project/public/validate2',{msg:message,_token:token,richness:sendingTo_Id}).done(function(validMsg){
			var time = new Date();
			console.log(validMsg);

			$('ul#ulMessages li:last-child').detach();
			$('ul#ulMessages').append("<li class='well well-md' style='background-color:#fff;'>"+validMsg+"<br><small class='pull-right' style='color:#f08080;    font-weight: bold;'>sent on: "+time.getHours()+":"+time.getMinutes()+":"+ time.getSeconds()+" "+((time.getHours()<12)?'am':'pm')+"<span class='glyphicon glyphicon-ok'></span></small>"+'</li>');
			dataa=validMsg;

		});
			

	});




}



/*testing with loader 
function check(message){


//$('ul').append("<li class='well well-md'>*****SENDING*********</li>");
var time = new Date();

    // run ajax request
    $.ajax({
        method: "POST",
        dataType: "html",
        url: "index.php",
        success: function (validMsg) {
            // replace div's content with returned data
  //          $('ul li:last-child').remove();
$('ul').append("<li class='well well-md'>"+validMsg+"<br><small class='pull-right'>"+time.getHours()+":"+time.getMinutes()+":"+ time.getSeconds()+"</small>"+'</li>');
        }
    });
}

*/


/* set timer for auto scroll down*/
window.setInterval(function() {
  var elem = document.getElementById('chat_body');
  elem.scrollTop = elem.scrollHeight;
}, 1000);
