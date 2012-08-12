function StopButton(){
	document.getElementById(arguments[0]).disabled=true;
	document.getElementById(arguments[0]).value="提交("+arguments[1]+")";
	if(--arguments[1]>0){
		window.setTimeout("StopButton('"+arguments[0]+"',"+arguments[1]+")",1000);
	}
	if(arguments[1]<=0){
		document.getElementById(arguments[0]).value='提交';
		document.getElementById(arguments[0]).disabled=false;
	}
}
function GetComment($ID,$Page){
	$.ajax({
		url:"Comment.aspx?action=ajax_getcomment&id="+$ID+"&page="+$Page+"&time"+new Date().toString(),
		type:'GET',
		success:function(){
			$('#comment').html(arguments[0]);
		}
	});
}
function SendComment(){	
		var $CommentParentID	=arguments[0];
		var $CommentUser		=$('#CommentUser').val();
		var $CommentText		=$('#CommentText').val();
		var $CommentValidate	=$('#CommentValidate').val();
		if ($.trim($CommentUser)=='')
		{
			alert('请您填写昵称！');
			$('#CommentUser').focus();
			return false;
		}
		if ($.trim($CommentValidate)=='')
		{
			alert('请您填写验证码！');
			$('#CommentValidate').focus();
			return false;
		}		
		if ($.trim($CommentText)=='')
		{
			alert('请您填写回复内容！');
			$('#CommentText').focus();
			return false;
		}
		if ($CommentText.length<5||$CommentText.length>200)
		{
			alert('内容必须在5-200字之间！');		
			return false;
		}
		StopButton('CommentSubmit',10);
	$.ajax({
		url:"Comment.aspx?action=ajax_sendcomment&commentparentid="+$CommentParentID+"&commentuser="+escape($CommentUser)+"&commenttext="+escape($CommentText)+"&commentvalidate="+escape($CommentValidate)+"&time="+new Date().toString(),
		type:'GET',
		success:function(){
			if (arguments[0]=='ERROR')
			{
				alert('验证码出错！');
			}else{
				GetComment($CommentParentID,1);
				alert(arguments[0]);
				$("#CommentText").val("");
					//验证成功时，刷新验证码图片
				$("#CommentValidateImages").attr("src","VerifyCode.aspx?s="+Math.random());
			}
			$("#CommentValidate").val("");
		}
	});
//SetCookie("CommentUser",$CommentUser,3);
}