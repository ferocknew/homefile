<script language="vbscript" runat="server">
'//---------------------------------------------------------------------------
Class DBOperateClass
'//----声明
Private adoConn,adoRset,objComm
Private strConnErr
Private strConnString
Private adCmdText

'//---------------------------定义类的事件-------------------------------//
'//类初始化
Private Sub Class_Initialize()
  strConnErr = "Database Connection failed!"
  adCmdText = 1
  Set adoConn = Server.CreateObject("ADODB.Connection")
  Set adoRset = Server.CreateObject("ADODB.Recordset")
  Set objComm = Server.CreateObject("ADODB.Command")
End Sub

'//----Class_Terminate()
'//类退出
Private Sub Class_Terminate()
  If adoConn.State Then adoConn.Close()
  Set adoConn = Nothing
  Set adoRset = Nothing
  Set objComm = Nothing
End Sub
'//---------------------------
'//---------------------------定义类的输入属性-------------------------------//
'//----设置连接字符串
Public Property Let setConnString(ByVal strVar)
  strConnString = strVar
  adoConn.ConnectionString = strConnString
End Property


'////////////////////////////////////////////////公有方法部分'///////////////////////////////////////////////
Public Property Get Conn
	'Call Open()
    Set Conn = adoConn
End Property

Public Property Get Open
    on error resume next
	'If adoConn.State Then adoConn.Close()'如果数据库是连接状态，就关闭，以避免多次打开造成错误提示
    If adoConn.State = 0 Then adoConn.Open()
    If Err.Number<>0 Then
      Err.Clear
      Set adoConn = Nothing
      Response.Write(strConnErr)
      Response.End
	End If
End Property

Public Property Get Close
    If adoConn.State Then adoConn.Close()
End Property

'//----输出连接字符串
Public Property Get getConnString
  getConnString = strConnString
End Property

'使用Command对象操作SQL
Private Property Get Cmd(ByVal SQLString)
    call Open()
    objComm.ActiveConnection = adoConn
	objComm.NamedParameters = True
    'objComm.CommandType = &H0001 'adCmdText '1表示处理的是一个 SQL 语句；
    'objComm.CommandType = &H0002 'adCmdTable '2表示处理的是一个表,查询的表名称
    objComm.CommandType = &H0004 'adCmdStoredProc '4 表示处理的是一个存储过程,存储过程名称
    'objComm.CommandType = &H0008 'adCmdUnknow '8 未知,需要系统来判断,速度慢,为缺省值
	'objComm.CommandType = &H0100 'adCmdFile  '100对象类型相应的文件名称
	'objComm.CommandType = &H0200 'adCmdTableDirect '200是能直接从表中获取行内容的表名称
    objComm.CommandText = SQLString 'SQL 查询字符串
    objComm.CommandTimeout = 30 '该属性指定在终止尝试或产生错误之前执行命令期间需等待的时间
    '对于按行返回的 Command
    'Set recordset = command.Execute(RecordsAffected,Parameters,Options)
    
    '对于不按行返回的 Command
    'command.Execute RecordsAffected,Parameters,Options
  Set Cmd = objComm

End Property

'数据库查询
'传递：sql语句
'返回值类型：记录集
Public Property Get execute(ByVal strSql)
  
  If Len(strSql)<5 Then execute = Null : Exit Property
  call Open()
  Set execute = adoConn.Execute(strSql,,adCmdText)
  'Set execute = adoConn.Execute(strSql)
End Property

'数据库执行
'主要针对INSERT、UPDATE或DELETE
'受影响行数
'rowcount
Public Property Get exec(ByVal strSql)
  call Open()
  Dim intRowsAffected
      adoConn.Execute strSql,intRowsAffected
  exec = intRowsAffected

End Property

'//结束
End Class
</script>