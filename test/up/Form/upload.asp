<!--#include file="upload_class.asp"-->
<%
 on error resume next
 Server.ScriptTimeout = 9999999
 Dim Upload,successful,thisFile,allFiles,upPath,path
 set Upload=new AnUpLoad
 Upload.openProcesser=true  '�򿪽�������ʾ
 Upload.SingleSize=512*1024*1024  '���õ����ļ�����ϴ�����,���ֽڼƣ�Ĭ��Ϊ�����ƣ�����Ϊ512M
 Upload.MaxSize=1024*1024*1024 '��������ϴ�����,���ֽڼƣ�Ĭ��Ϊ�����ƣ�����Ϊ1G
 Upload.Exe="*"  '���������ϴ�����չ��
 Upload.GetData()
 if Upload.ErrorID>0 then
 	upload.setApp "faild",1,0 ,Upload.description
 else
 	if Upload.files(-1).count>0 then
		for each file in Upload.files(-1)
 	        upPath=request.querystring("path")
    		path=server.mappath(upPath)
    		set tempCls=Upload.files(file) 
            upload.setApp "saving",Upload.TotalSize,Upload.TotalSize,tempCls.FileName
    		successful=tempCls.SaveToFile(path,1)
    		set tempCls=nothing
		next
 	end if
 	upload.setApp "over",Upload.TotalSize,Upload.TotalSize,"�ύ��ϣ�"
 end if
 if err then upload.setApp "faild",1,0,err.description
 set Upload=nothing
 response.end
%>
