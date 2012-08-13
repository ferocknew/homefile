<%
Response.Write(request.Form("show_test"))
Response.Write("<br />")
%>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.0/jquery.min.js"></script>
<form method="post" id="form1">
<input name="show_test" type="checkbox" value="1" /><input name="show_test" type="checkbox" value="1" /><input name="show_test" type="checkbox" value="1" /><input name="show_test" type="checkbox" value="1" /><input type="submit" />
</form>
