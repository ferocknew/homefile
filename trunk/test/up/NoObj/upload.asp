<!--#include file="upload_class.asp"-->
<%
 on error resume next
 Server.ScriptTimeout = 9999999
 Dim Upload,successful,thisFile,allFiles,upPath,path
 set Upload=new AnUpLoad
 Upload.openProcesser=true  '打开进度条显示
 Upload.SingleSize=1000*1024*1024  '设置单个文件最大上传限制,按字节计；默认为不限制，本例为512M
 Upload.MaxSize=1000*1024*1024 '设置最大上传限制,按字节计；默认为不限制，本例为1G
 Upload.Exe="*"  '设置允许上传的扩展名
 Upload.GetData()
 if Upload.ErrorID>0 then
 	upload.setApp "faild",1,0 ,Upload.description
 else
 	if Upload.files(-1).count>0 then
		dim str
		for each file in Upload.files(-1)
 	        upPath=request.querystring("path")
    		path=server.mappath(upPath)
    		set tempCls=Upload.files(file) 
            upload.setApp "saving",Upload.TotalSize,Upload.TotalSize,tempCls.FileName
    		successful=tempCls.SaveToFile(path,1)
			thisFile="{name:'" & tempCls.FileName & "',size:" & tempCls.Size & "}"
			allFiles=allFiles & thisFile & ","
    		set tempCls=nothing
		next
		upload.setApp "saved",Upload.TotalSize,Upload.TotalSize,allFiles
    else
        upload.setApp "faild",1,0,"没有上传任何文件"
 	end if
 end if
 if err then upload.setApp "faild",1,0,err.description
 set Upload=nothing
 response.end
%>
