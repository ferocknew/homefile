<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script type="ajaxfileupload.js"></script>
<script>
$(function(){
	$("#test_do").click(function(){
		alert($("#file_1").val());
		$.getJSON("upfile.asp",{"fn":$("#file_1").val()},function(){});
	})
});
</script>
<input type="file" id="file_1" />
<input type="button" id="test_do" value="递交"/>

<%
strFileName = Request.QueryString("fn")

If Not strFileName="" Then
Set objStream = Server.CreateObject("ADODB.Stream")
objStream.Type = 1 'adTypeBinary 二进制方式
objStream.Open
objStream.LoadFromFile(strFileName)
Call objStream.SaveToFile(Server.MapPath("qqqqqq.gif"),2)
objStream.close:Set objStream=Nothing
End If
%>