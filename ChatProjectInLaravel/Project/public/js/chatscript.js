//http://javascriptobfuscator.com/Javascript-Obfuscator.aspx
//mix with http://www.spiritualbee.com/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.5

document.getElementById("msg_input").value="";


	
	$("#msg_input").keyup(function(e){
		
		var code=e.which;
		if(code==13 && (e.target.value!=='')){
		//alert('sending...'+$('#msg_input').val());
		
		
		check(e.target.value);
			e.target.value='';
		
	}
});


	$("#send_btn").click(function(e){
		//alert('sending...'+$('#msg_input').val());
		if($('#msg_input').val()!=='' ){
		check($('#msg_input').val());
		//$('ul').append('<li>'+$('#msg_input').val()+'</li>');
		document.getElementById("msg_input").value="";
	}
});




function check(message){

//$('ul').append("<li><img src='/Project/public/js/sending.gif'></li>");

$('ul').append("<li><b><i><span class='progress'><span class='progress-bar progress-bar-success progress-bar-striped active' role='progressbar' aria-valuenow='100' aria-valuemin='0' aria-valuemax='100' style='width:100%'>Sending...</span></span></i></b></li>");
$.get('validate').done(function(token){

		$.post('validate2',{msg:message,_token:token}).done(function(validMsg){
			var time = new Date();
			console.log(validMsg);

			$('ul li:last-child').detach();
			$('ul').append("<li class='well well-md'>"+validMsg+"<br><small class='pull-right' style='color:#f08080;    font-weight: bold;'>"+time.getHours()+":"+time.getMinutes()+":"+ time.getSeconds()+"</small>"+'</li>');
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
