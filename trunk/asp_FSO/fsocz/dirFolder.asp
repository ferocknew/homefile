<!--#include file="Fsosystem.asp"-->
<%
	set fso=new FsoSystem
	fso.PathType=2
%>
<html>

<head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title></title>
<script>
function trun()
{
	window.location.href="dirFolder.asp?Folder="+window.Folder.value;
}
</script>
</head>

<body>

<p align="center">后台文件操作</p>
<%
		dim FolderList
		if request("Folder")="" then
		fso.Path="/"
		else
		fso.Path=request("Folder")
		end if
	%>
目录:<select size="1" id="Folder" onchange="trun()">
		<%
			FolderList=fso.SunGetFolder()
				if FolderList(0)<>"False" then
				for i=0 to ubound(FolderList)
					response.write("<option value='"&fso.Path&"/"&FolderList(i)&"/'>"&FolderList(i)&"</option>")
				next
				else
				response.write("<option>路径->"&fso.Path&".ErrorCode:没有了文件夹</option>")
				end if 
		%>
	</select><a href='#' onclick='window.history.go(-1)'>返回上层目录</a><br>
	文件:<select size="1" id="File">
	<%
			dim FolderFiles
			FolderFiles=fso.GetFolderFiles()
			if FolderFiles(0)<>"False" then
			for i=0 to ubound(FolderFiles)
			response.write("<option value='"&fso.Path&FolderFiles(i)&"'>")
			response.write FolderFiles(i)
			response.write("</option>")
			next
			else
			response.write("<option>")
			response.write "没有可操作文件"
			response.write("</option>")
			end if
	%>
	</select>
	<script>
	function fileopens()
	{
		window.location.href="dirFolder.asp?MyFile="+window.File.value;
	}
	
	</script>
	<a href="#" onclick="fileopens()">打开</a>
	<br>内容:<br>
		<%
		dim code
		if request("MyFile")="" then
		response.write"请选择要打开的文件"
		else
		fso.Path=request("MyFile")
		code=fso.readfile()
		%>
	<form method="POST" action="Save_file.asp?path=<%=fso.Path%>" id="dirf">
	<textarea rows="35" name="Content" cols="167">
		<%response.write code%>
	</textarea>
	<%	end if
	%>
	<br>
	<input type="submit" value="修改" name="B1"><input type="reset" value="还原" name="B2">
</form>
</body>

</html>
