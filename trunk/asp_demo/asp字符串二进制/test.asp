<%
'''''''''''''''''''''''''''''
' 字符串转二进制函数
'
''''''''''''''''
' 参数说明
''''''''''
' str: 要转换成二进制的字符串
' charSet: 字符串默认编码集, 如不指定, 则默认为 gb2312
''''''''''
' sample call: response.binaryWrite sTb(str, "utf-8")
'''''''''''''''''''''''''''''
function sTb(str, charSet)
dim stm_ 
set stm_=createObject("adodb.stream")
with stm_
.type=2 
if charSet<>"" then
.charSet=charSet
else
.charSet="unicode"
end if
.open
.writeText str
.Position = 0
.type=1
sTb=.Read
.close
end with
set stm_=nothing
end Function
'''''''''''''''''''''''''''''
' 二进制转字符串函数
'  
''''''''''''''''
' 参数说明
''''''''''
' str: 要转换成字符串的二进制数据
' charSet: 字符串默认编码集, 如不指定, 则默认为 gb2312
''''''''''
' sample call: response.write bTs(midB(sTb(str, "utf-8"),1),"utf-8")
'''''''''''''''''''''''''''''
' 注意: 二进制字符串必须先用 midB(binaryString,1) 读取(可自定读取长度).
'''''''''''''''''''''''''''''
function bTs(str, charSet)
dim stm_ 
set stm_=createObject("adodb.stream")
with stm_
.type=2 
.open
.writeText str
.Position = 0
if charSet<>"" then
.CharSet = charSet
else 
.CharSet = "unicode"
end if
bTs=.ReadText
.close
end with
set stm_=nothing
end Function

Function RSBinaryToString(xBinary)
Dim Binary

If vartype(xBinary)=8 Then Binary = MultiByteToBinary(xBinary) Else Binary = xBinary

Dim RS, LBinary
Const adLongVarChar = 201
Set RS = CreateObject("ADODB.Recordset")
LBinary = LenB(Binary)
If LBinary>0 Then
RS.Fields.Append "mBinary", adLongVarChar, LBinary
RS.Open
RS.AddNew
RS("mBinary").AppendChunk Binary
RS.Update
RSBinaryToString = RS("mBinary")
Else
RSBinaryToString = ""
End If
End Function


Dim fileto
fileto=server.mappath("ljsz_down.jpg")
Set objStream = Server.CreateObject("ADODB.Stream")'建立ADODB.Stream对象，必须要ADO 2.5以上版本
with objStream
.Type =1'以二进制模式打开
.Open
.LoadFromFile  fileto
end with

bin=objStream.Read
objStream.close:Set objStream=Nothing
response.write RSBinaryToString(bin)
%>