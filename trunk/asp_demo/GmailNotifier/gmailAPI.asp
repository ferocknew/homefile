<%
'=================================================
' GMail API for ASP 1.1
' Author: PuterJam (http://www.pjhome.net/)
' Update Date: 2005-12-30
' 版权说明: GMail API for ASP 程序版权归作者  陈子舜(PuterJam) 所有。 
' 使用者必须遵循 创作共用（Creative Commons） 协议 
' 你可以免费: 拷贝、分发、呈现和表演当前作品,制作派生作品,但是不得移除 GMail API for ASP 标识。 
' 非商业用途。 你不可将当前作品用于商业目的。
' 使用此代码必须保留版权信息。谢谢合作
'=================================================

class GMailAPI
  Private XMLHttp
  Private LoginResponse
  Private basicData
  Private entryData
  Private LoginState
  Private FullData
  Private MailArray
  Private tempHeaders
  Private gAT
  
  Private state_timeout,state_bad_request,state_logged_fault,state_logged_out,state_logged_in
  
  '------------------------------------------------ 
  '函数名字：Class_Initialize
  '类型；私有 Sub
  '初始化Class
  '------------------------------------------------ 
  Private Sub Class_Initialize()
      Set XMLHttp = Server.CreateObject(getXMLHTTP)
	  state_timeout = "timeout"
	  state_bad_request = "bad_request"
	  state_logged_fault = "login_fault"
	  state_logged_out = "logout"
	  state_logged_in = "login"
	  gAT=""
	  Set basicData=new BasicInfo
	  redim entryData(-1)
	  ReDim MailArray(-1)
	  setState(state_logged_out)
  end sub
  
  Private Sub Class_Terminate()
    Set XMLHttp = nothing
    Set basicData = nothing
  end sub


  '------------------------------------------------ 
  '函数名字：getXMLHTTP(aU,aP)
  '类型；私有 function
  '判断服务器支持的XMLHTTP类型
  '------------------------------------------------ 
 Private Function getXMLHTTP
	On Error Resume Next
	Dim Temp
	getXMLHTTP="MSXML2.ServerXMLHTTP"
	Err = 0
	Dim TmpObj
	Set TmpObj = Server.CreateObject(getXMLHTTP)
	Temp = Err
    IF Temp = 1 OR Temp = -2147221005 Then
		getXMLHTTP="Msxml2.ServerXMLHTTP.5.0"
	End IF
	Err.Clear
	Set TmpObj = Nothing
	Err = 0
 end function

  '------------------------------------------------ 
  '函数名字：Login(aU,aP)
  '类型；公有 function
  '登陆GMAIL
  '------------------------------------------------ 
 Public function Login(aU,aP)
        dim getResponse,query,tt,loginText,tempH
        getResponse=Array(-4,"还没有登陆邮箱","<?xml version=""1.0"" encoding=""UTF-8""?><feed version=""0.3""><error>-4</error><title>还没有登陆邮箱</title></feed>")
	    
	    query = "ltmpl=wsad&ltmplcache=2&continue="&Server.URLEncode("https://mail.google.com/mail/?search=inbox&view=tl&start=0&init=1")&"&service=mail&rm=false" &_
    			   "&Email=" & Server.URLEncode(aU) &_
     			   "&Passwd=" & Server.URLEncode(aP) &_
    	           "&null=Sign+in"
    	           
	    LoginResponse = getResponse
	    
	    FullData = sendRequest ("https://www.google.com/accounts/ServiceLoginAuth",query) 'Do Login
	    tempH = tempHeaders
	    if (LoginResponse(0)<>-1) and (LoginResponse(0)<>-2) then 
			loginText = sendRequest ("https://mail.google.com/mail/feed/atom", null) 'Get GMail Feed/Atom
			checkLoginState loginText 'Check Login
	    end if
	    
	    if LoginState=state_logged_in then
			'XMLHttp.getAllResponseHeaders
			gAT=getCookie(tempH,"GMAIL_AT")
			getResponse=Array(0,"登陆成功",loginText)
			LoginResponse = getResponse
		end if
		
		setInfo
 end function
 
  '------------------------------------------------ 
  '函数名字：getCookie(headCookie,keyword)
  '类型；私有 function
  '获取XMLHTTP返回的Cookie
  '------------------------------------------------ 
  Private function getCookie (headCookie,keyword)
		    dim re,strMatchs,strMatch
			Set re=new RegExp
			re.IgnoreCase =True
			re.Global=True
			getCookie=""
		    'Set-Cookie: GMAIL_AT=f40743d16c769aca-10886f2edf7; Path=/
	    	re.Pattern="Set-Cookie: "&keyword&"=(.*); Path=/"
				Set strMatchs=re.Execute(headCookie)
				For Each strMatch in strMatchs
					getCookie = strMatch.SubMatches(0)
				Next				
  end function
 
  '------------------------------------------------ 
  '函数名字：checkLoginState(loginText)
  '类型；私有 function
  '验证登陆信息
  '------------------------------------------------ 
  Private sub checkLoginState(loginText)
	   dim CheckText,getResponse
	   dim ltLen,ctLen,i
	   
	   CheckText = "<?xml version=""1.0"" encoding=""UTF-8""?>"
	   
	   ltLen=len(loginText)
	   ctLen= len(CheckText)
	   
	   for i=1 to ltLen
		    if mid(loginText,i,ctLen)=CheckText then setState(state_logged_in):exit sub
	   next
	   
	   getResponse=Array(-3,"账号或密码错误","<?xml version=""1.0"" encoding=""UTF-8""?><feed version=""0.3""><error>-3</error><title>账号或密码错误,登陆失败</title></feed>")
	   setState(state_logged_fault)
	   LoginResponse = getResponse
  end sub
  
  '------------------------------------------------ 
  '函数名字：sendRequest(aUrl,aData)
  '类型；私有 function
  'HTTPXML信息处理
  '------------------------------------------------ 
 Private function sendRequest(aUrl,aData)
		dim getResponse
	    XMLHttp.Open "post", aUrl, False
	    XMLHttp.setRequestHeader "Content-Type", "application/x-www-form-urlencoded"
	
		On Error Resume Next
	    XMLHttp.send aData
	    
	    If XMLHttp.readyState <> 4 Then
	       XMLHttp.waitForResponse 15
	    End If
	    
		If Err.Number <> 0 Then
	        getResponse=Array(-1,"无法连接服务器","<?xml version=""1.0"" encoding=""UTF-8""?><feed version=""0.3""><error>-1</error><title>无法连接服务器</title></feed>")
		    setState(state_bad_request)
			LoginResponse = getResponse
			sendRequest=""
			exit function
		Else
		  If (XMLHttp.readyState <> 4) or (XMLHttp.Status <> 200) Then
				XMLHttp.Abort
		        getResponse=Array(-2,"服务器超时","<?xml version=""1.0"" encoding=""UTF-8""?><feed version=""0.3""><error>-2</error><title>服务器超时</title></feed>")
			    setState(state_timeout)
			    LoginResponse = getResponse
				sendRequest=""
				exit function
		  end IF
		End If
		sendRequest = XMLHttp.responseText
	    tempHeaders = XMLHttp.getAllResponseHeaders

 end function
 
  '------------------------------------------------ 
  '函数名字：setInfo
  '类型；公有 function
  '获得邮件信息
  '------------------------------------------------ 
 Private function setInfo
	    dim gXML,getFeedXML,i,tempC
	    set gXML=new PXML
	    gXML.OpenXML(LoginResponse(2))
	    
	    if gXML.getError=0 then
	      if LoginResponse(0)<>0 then
	      		basicData.errorcode = gXML.SelectXmlNodeText("error")
			    basicData.title = gXML.SelectXmlNodeText("title")
	      else
	      		basicData.errorcode=0
			    basicData.title = gXML.SelectXmlNodeText("title")
			    basicData.tagline = gXML.SelectXmlNodeText("tagline")
			    basicData.fullcount = gXML.SelectXmlNodeText("fullcount")
			    basicData.modified = gXML.SelectXmlNodeText("modified")
				
				reDim entryData(gXML.GetXmlNodeLength("entry")-1)
			    for i=0 to gXML.GetXmlNodeLength("entry")-1
			        Set tempC=new FeedEntryInfo
				    tempC.title = gXML.SelectXmlNodeItemText("entry/title",i)
				    tempC.summary = gXML.SelectXmlNodeItemText("entry/summary",i)
				    tempC.modified = gXML.SelectXmlNodeItemText("entry/modified",i)
				    tempC.issued= gXML.SelectXmlNodeItemText("entry/issued",i)
				    tempC.id= gXML.SelectXmlNodeItemText("entry/id",i)
				    tempC.authorName= gXML.SelectXmlNodeItemText("entry/author/name",i)
				    tempC.authorEmail= gXML.SelectXmlNodeItemText("entry/author/email",i)	
				    set entryData(i)=tempC
		    	next
	      end if
	    end if
	    
	    gXML.CloseXml
	    set gXML=nothing
	    
        '----Get advanced Info--------
        if LoginResponse(0)=0 then
		    dim re,strMatchs,strMatch,ReTemp
	 	    'TempStr = sendRequest ("https://mail.google.com/mail/?search=inbox&view=tl&start=0&init=1", null)
			Set re=new RegExp
			re.IgnoreCase =True
			re.Global=True
			
			'response.write ("<textarea rows=10  cols=100>" & FullData & "</textarea>")
			
			'D["ud","puterjam@gmail.com","{
	    	re.Pattern="\[""ud"",""(.*)"",""{"
				Set strMatchs=re.Execute(FullData)
				For Each strMatch in strMatchs
					basicData.SenderEMail = strMatch.SubMatches(0)
				Next
			
			'D(["gn","SenderName"]			
	    	re.Pattern="\[""gn"",""(.*)""\]"
				Set strMatchs=re.Execute(FullData)
				For Each strMatch in strMatchs
					basicData.SenderName = strMatch.SubMatches(0)
				Next			
		    
			 'D(["qu","spaceUsed","totalSpace","percentUsed","#006633"]			
	    	re.Pattern="\[""qu"",""(.*)"",""(.*)"",""(.*)"",""(.*)""\]"
				Set strMatchs=re.Execute(FullData)
				For Each strMatch in strMatchs
					basicData.spaceUsed = strMatch.SubMatches(0)
					basicData.percentUsed = strMatch.SubMatches(2)
					basicData.totalSpace = strMatch.SubMatches(1)						
				Next						

				
			 'D(["ds",inboxUnread,0,0,savedDrafts,0,spamUnread,0]
	    	re.Pattern="\[""ds"",(.*),(.*),(.*),(.*),(.*),(.*),(.*)\]"
				Set strMatchs=re.Execute(FullData)
				For Each strMatch in strMatchs
					basicData.inboxUnread = strMatch.SubMatches(0)
					basicData.savedDrafts = strMatch.SubMatches(3)
					basicData.spamUnread = strMatch.SubMatches(5)						
				Next				
					
 	   			dim tempA,tempB,MailCount,j
 	   			
 	   			MailCount=0
			    re.Pattern="\[""t"",([^\r]*?)\]\n\);"
					Set strMatchs=re.Execute(FullData)
					For Each strMatch in strMatchs
						tempA = getMailArray(strMatch.SubMatches(0)).join(Chr(24))
						tempA = split(tempA,Chr(24))
						for i=0 to ubound(tempA)
							 ReDim PreServe MailArray(MailCount)
						     tempB = split(tempA(i),Chr(27))
						     Set tempC=new MailInfo
						     tempC.id = tempB(0)
						     tempC.readed = tempB(1)
						     tempC.star = tempB(2)
						     tempC.shortTime = HtmlToText(tempB(3))
						     tempC.senderEMail = getsenderEMail(tempB(4))
						     tempC.senderName = HtmlToText(tempB(4))
						     tempC.unknow1 = tempB(5)
						     tempC.title = HtmlToText(tempB(6))
						     tempC.summary = tempB(7)
						     tempC.tag = tempB(8)
						     tempC.attachments = tempB(9)
						     tempC.id2 = tempB(10)
						     tempC.unknow3 = tempB(11)
						     tempC.longTime = tempB(12)
						     set MailArray(MailCount)=tempC
						     MailCount=MailCount + 1
						     
						next
			        Next
			    'id,readed,star,shortTime,sender,unknow1,title,summary,tag,attachments,id,unknow3,longTime
				'sender=<span id='_user_puterjam@gmail.com'>我</span>
				
		end if
 end function

  '------------------------------------------------ 
  '函数名字：setState(str) 
  '类型；私有 Sub
  '设置登陆信息
  '------------------------------------------------ 
 Private sub setState(str)
   LoginState=str
 end sub
 
  '------------------------------------------------ 
  '函数名字：getInfo 
  '类型；共有 Sub
  '返回Gmail登陆基本信息
  '------------------------------------------------ 
  Public function getInfo
    set getInfo=basicData
  end function
  
  '------------------------------------------------ 
  '函数名字：getState 
  '类型；共有 Sub
  '返回Gmail登陆状态
  '------------------------------------------------ 
  Public function getState
    getState=LoginState
  end function
  
  '------------------------------------------------ 
  '函数名字：getEntry(id)
  '类型；共有 Sub
  '返回Feed/Atom Gmail最新邮件数组
  '------------------------------------------------ 
  Public function getEntry(id)
    set getEntry=entryData(id)
  end function
  
  '------------------------------------------------ 
  '函数名字：getEntryLen
  '类型；共有 Sub
  '返回Feed/Atom Gmail获得邮件信息个数
  '------------------------------------------------ 
  Public function getEntryLen
    getEntryLen=ubound(entryData)
  end function  
  '------------------------------------------------ 
  '函数名字：getMail(id)
  '类型；共有 Sub
  '返回Gmail最新邮件数组
  '------------------------------------------------ 
  Public function getMail(id)
    set getMail=MailArray(id)
  end function
  
  '------------------------------------------------ 
  '函数名字：getMailCount
  '类型；共有 Sub
  '返回Gmail获得邮件信息个数
  '------------------------------------------------ 
  Public function getMailCount
    getMailCount=ubound(MailArray)+1
  end function  
  
  '------------------------------------------------ 
  '函数名字：sendMail(t,c,b,s,m)
  '类型；共有 Sub
  '发送邮件
  '------------------------------------------------ 
  Public function sendMail(t,c,b,s,m)
    dim reValue,query,responseText
    reValue=array(-3,"ready")
    if not LoginState=state_logged_in then
	   	reValue=array(-2,"Unauthorized")
     else
	    query="view=sm&rm=&th=&at="&gAT&"&wid=10&jsid="&lp()&"&from="&getInfo.SenderEmail&_
	       "&to="&t&"&cc="&c&"&bcc="&b&"&subject="&s&"&ishtml=1&msgbody="&m
	    responseText = sendRequest ("http://mail.google.com/mail/?&cmid=1&autosave=0&cw=1&newatt=0&rematt=0",query) 'Do Login
        reValue=array(0,"Sent")
    end if
   		sendMail=reValue
  end function
end class


'=================================================
' GMailInfo Class for GMailAPI
' Author: PuterJam
' Update Date: 2005-12-30
'=================================================
Class BasicInfo
  Public errorcode,title,tagline,fullcount,modified
  Public SenderEmail,SenderName,spaceUsed,percentUsed,totalSpace,inboxUnread,savedDrafts,spamUnread
  Private Sub Class_Initialize
    errorcode=-4
    title = "还没有登陆邮箱"
    tagline = ""
    fullcount = 0
    modified= ""
    
    '----advanced Info--------
    SenderEmail = "null@gmail.com"
    SenderName = ""
    spaceUsed = "0 MB"
    percentUsed = "0%"
	totalSpace = "0 MB"
	inboxUnread = 0
	savedDrafts = 0
	spamUnread =0
 End Sub
End Class

'=================================================
' Feed/Atom EntryInfo Class for GMailAPI
' Author: PuterJam
' Update Date: 2005-12-30
'=================================================
Class FeedEntryInfo
  Public title,summary,modified,issued,id,authorName,authorEmail
  Private Sub Class_Initialize 
    title = "(无主题)"
    summary = ""
    modified = ""
    issued = ""
    id = ""
    authorName = ""
    authorEmail = ""
 End Sub
End Class

'=================================================
' MailInfo Class for GMailAPI
' Author: PuterJam
' Update Date: 2005-12-30
'=================================================
Class MailInfo
  Public id,readed,star,shortTime,senderEMail,senderName,unknow1,title,summary,tag,attachments,id2,unknow3,longTime
  Private Sub Class_Initialize 
    id = ""
    readed = ""
    star = ""
    shortTime = ""
    senderEMail = ""
    senderName = ""
    unknow1 = ""
    title = ""
    summary = ""
    tag = ""
    attachments = ""
    id2 = ""
    unknow3 = ""
    longTime = ""
 End Sub
End Class


'=================================================
' XML Class for GMailAPI
' Author: PuterJam
' Update Date: 2005-12-30
'=================================================

Class PXML
  Public XmlPath
  Private errorcode
  Private XMLMorntekDocument

  Private Sub Class_Initialize()
   errorcode=-1
  end sub
  
  Private Sub Class_Terminate()

  end sub
  
  '------------------------------------------------ 
  '函数名字：OpenXML() 
  'Open=0，XMLMorntekDocument就是一个成功装载XML文档的对象了。 
  '------------------------------------------------ 
  
  Public function OpenXML(str)
     on error resume next
     dim strSourceFile,strError
     
     Set XMLMorntekDocument = Server.CreateObject(getXMLDOM)
       If Err Then
	    errorcode=-18239123
	    Err.clear
	    exit function
	   end if
	   
     XMLMorntekDocument.async = false  
	 XMLMorntekDocument.loadXML(str) 
     errorcode=XMLMorntekDocument.parseerror.errorcode
  end function
    
  Private Function getXMLDOM '测试XMLDom对象
	On Error Resume Next
	Dim Temp
	getXMLDOM="Microsoft.XMLDOM"
	Err = 0
	Dim TmpObj
	Set TmpObj = Server.CreateObject(getXMLDOM)
	Temp = Err
    IF Temp = 1 OR Temp = -2147221005 Then
		getXMLDOM="Msxml2.DOMDocument.5.0"
	End IF
	Err.Clear
	Set TmpObj = Nothing
	Err = 0
 end function


  '------------------------------------------------ 
  '函数名字：getError() 
  '------------------------------------------------ 
  Public function getError()
   getError=errorcode
  end function 
  
  '------------------------------------------------ 
  '函数名字：CloseXml() 
  '------------------------------------------------ 
  Public function CloseXml() 
   if IsObject(XMLMorntekDocument) then 
   set XMLMorntekDocument=nothing 
   end if 
  end function 
  
  
  '------------------------------------------------ 
  'SelectXmlNodeText(elementname) 
  '获得当个 elementname 元素
  '------------------------------------------------ 
  Public function SelectXmlNodeText(elementname)  
      on error resume next
      dim temp
      temp=XMLMorntekDocument.getElementsByTagName(elementname).item(0).text
      selectXmlNodeText= temp
      if err then selectXmlNodeText=0
  end function
  
  '------------------------------------------------ 
  'SelectXmlNode(elementname,itemID) 
  '获得当个 elementname 元素
  '------------------------------------------------ 
  Public function SelectXmlNode(elementname,itemID) 
      dim temp
      set temp=XMLMorntekDocument.getElementsByTagName(elementname).item(itemID)
      set SelectXmlNode= temp
  end function
  
    '------------------------------------------------ 
  'GetXmlNodeLength(elementname) 
  '获得当个 elementname 元素的Length值 
  '------------------------------------------------ 
  Public function GetXmlNodeLength(elementname)  
      on error resume next 
      dim XmlLength
      XmlLength=XMLMorntekDocument.getElementsByTagName(elementname).length
      GetXmlNodeLength= XmlLength
      if err then GetXmlNodeLength=0
  end function
   
  '------------------------------------------------ 
  'SelectXmlNodeItemText(elementname,ID) 
  '获得当个某 id 的 elementname 元素值 
  '------------------------------------------------ 
  Public function SelectXmlNodeItemText(elementname,ID) 
      on error resume next 
      dim temp
      temp=XMLMorntekDocument.getElementsByTagName(elementname).item(ID).text
      SelectXmlNodeItemText= temp
      if err then SelectXmlNodeItemText=""
  end function
end Class
%>

<script language="Javascript" runat="server">
//Converting GMail Array
 function getMailArray(str){
 	 str=str.replace(/\\"/g,"\\\'")
 	 str=str.replace(/\n/g,"")	 
 	 var GArray=eval("["+str+"]")
 	 for (i=0;i<GArray.length;i++){
	       GArray[i]=GArray[i].join(String.fromCharCode(27))
     }
     return GArray
 }
 
 function HtmlToText(str) {
  str = str.replace(/<[^>]*?>/g,"");
  return str
 }
 
 function getsenderEMail(str){
  str = str.replace(/(.*)id='_user_(.*)'>(.*)/g,"$2");
  return str
 }
 
 //jsid
 function ak(){return Math.round(Math.random()*2147483648)}
 function W(){return(new Date()).getTime()}
 function lp(){return ak().toString(36)+(ak()^W()).toString(36)}
</script>