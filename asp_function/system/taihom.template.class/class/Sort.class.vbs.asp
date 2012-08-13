<script language="vbscript" runat="server">
'返回值
'0      //--操作成功,或者没有错误
'-10000 //--无节点数据
'-10001 //--无效操作
'-10002 //--节点连接断开,数据已经回滚
'-10003 //--名称为空
'-10004 //--根节点不能删除
'-10005 //--来源节点不存在
'-10006 //--目的节点不存在
'-10007 //--父节点不能移动到子节点中'
'//---------------------------------------------------------------------------
Class SortManageClass
'//----声明
Private adoConn,adoRset,objComm
Private strTable,strConnErr,strNoTableErr
Private strAuthor,strVersion
Private intReturn

'//---------------------------定义类的事件-------------------------------//
'//类初始化
Private Sub Class_Initialize()
  '作者Taihom
  '邮箱taihom@163.com
  strAuthor = "Taihom"
  strVersion = "1.0"
  strConnErr = "数据库连接出错"
  strNoTableErr = "您没有指定需要操作的表名"
  
  intReturn = 0'默认返回值
  'Set adoRset = Server.CreateObject("ADODB.Recordset")
  'Set objComm = Server.CreateObject("ADODB.Command")
  
End Sub

'//----Class_Terminate()
'//类退出
Private Sub Class_Terminate()
  If adoConn.State Then adoConn.Close()
  Set adoConn = Nothing
  'Set adoRset = Nothing
  'Set objComm = Nothing
End Sub

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

'私有函数-节点操作
Private Sub chkTable()
	IF LEN(strTable)=0 THEN
	Response.Write(strNoTableErr)
	Response.End()
	End IF
	call Open()'打开数据库
End Sub

'私有函数-检测节点并且根据返回结果确定是否回滚
Private Sub commitTrans()
	'--判断链接是否断开
	IF (nodeCheck()<>0) Then'这里去检测
		adoConn.RollbackTrans '否则回滚
		intReturn = -10002'--节点连接断开,数据已经回滚
	Else
		adoConn.CommitTrans
		intReturn = 0'--操作成功,或者没有错误
	End If
End Sub

'私有函数-节点操作
Private Function nodeaction(ByVal strAct,ByVal intID,ByVal strName)
Call chkTable()'检测表
Dim intLRID,intLID,intRID,intWitdh,intPID
Dim sql,rs

	intLID  =0
	intRID  =0
	intWitdh=0
	intPID  =0

Set rs = adoConn.execute("SELECT LID,RID, (RID - LID + 1) AS Witdh,PID From "&strTable&" Where ID="&intID)
	If rs.eof Then
		'统计看看有多少
		Set rs = adoConn.execute("SELECT Count(ID) From "&strTable&"")
		If (rs(0)=0) Then
			intRID  =1'如果是第一个节点
		Else
			intReturn = -10000'--无节点数据
			Exit Function
		End If
		Set rs = Nothing
	Else
		intLID  =rs("LID")
		intRID  =rs("RID")
		intWitdh=rs("Witdh")
		intPID  =rs("PID")
	End If
	
Set rs = Nothing
	
	'选择操作
	Select Case Lcase(strAct)
	Case "add"'添加节点
		Response.Write("添加节点")
		IF (LEN(strName)=0) Then
			intReturn = -10003'--名称为空
			Exit Function
		End If
		adoConn.BeginTrans '事务开始
		adoConn.execute("UPDATE "&strTable&" SET RID = RID + 2 WHERE RID >="&intRID&" AND STATUS=0")
		adoConn.execute("UPDATE "&strTable&" SET LID = LID + 2 WHERE LID > "&intRID&" AND STATUS=0")
		adoConn.execute("INSERT INTO "&strTable&" (LID,RID,[Name],PID) VALUES ("&intRID&","&intRID+1&",'"&strName&"',"&intID&")")
		
		'提交数据
		call commitTrans()
	Case "mod"'修改节点
		IF (LEN(strName)=0) Then
			intReturn = -10003'--名称为空
			Exit Function
		End If
		adoConn.execute("UPDATE "&strTable&" SET Name = '"&strName&"' WHERE ID = "&intID&"")
	
	Case "del"'删除节点
		IF (intLID=1) Then
			intReturn = -10004'--根节点不能删除
			Exit Function
		End IF
		
		adoConn.BeginTrans '事务开始
		adoConn.execute("UPDATE "&strTable&" SET RID = 0 ,LID = 0,STATUS = 4096  WHERE LID BETWEEN "&intLID&" AND "&intRID&"")
		adoConn.execute("UPDATE "&strTable&" SET RID = RID - "&intWitdh&" WHERE RID > "&intRID&" AND STATUS=0")
		adoConn.execute("UPDATE "&strTable&" SET LID = LID - "&intWitdh&" WHERE LID > "&intRID&" AND STATUS=0")
		
		'提交数据
		call commitTrans()
	Case "remove"'移除节点
		'--只能移除被删除的节点
		adoConn.execute("DELETE FROM "&strTable&" WHERE ID = "&intID&" AND STATUS = 4096")

	Case "restore"'将被删除的节点还原到目的的节点中去
		Dim intID2,rs1,rs2
			intID2 = strName'--来源
		Set rs1=adoConn.execute("SELECT 1 FROM "&strTable&" WHERE ID="&intID2&" AND STATUS = 4096")
		IF rs1.Eof Then
			intReturn = -10005'--来源节点不存在
			Exit Function
		End If

		Set rs2=adoConn.execute("SELECT 1 FROM "&strTable&" WHERE ID="&intID&" AND STATUS = 0")
		IF rs2.Eof Then
			intReturn = -10006'--目的节点不存在
			Exit Function
		End If

		adoConn.BeginTrans '事务开始
		adoConn.execute("UPDATE "&strTable&" SET RID = RID + 2 WHERE RID >="&intRID&" AND STATUS=0")
		adoConn.execute("UPDATE "&strTable&" SET LID = LID + 2 WHERE LID > "&intRID&" AND STATUS=0")
		adoConn.execute("UPDATE "&strTable&" SET LID = "&intRID&",RID = "&intRID&"+1,PID = "&intID&",STATUS=0 WHERE ID="&intID2&" AND STATUS = 4096")
		
		'提交数据
		call commitTrans()
	Case Else
		intReturn = -10001'--无效操作
	End Select
End Function

'/*移动节点*/
Private Function nodemove(ByVal intID1,ByVal intID2,ByVal strDir)
Call chkTable()'检测表
Dim intLID1,intRID1,intWitdh1,intPID1
Dim intLID2,intRID2,intWitdh2,intPID2
Dim intN
Dim rs,rs1,rs2
Set rs1=adoConn.execute("SELECT LID, RID, (RID - LID + 1) AS Witdh, PID  FROM "&strTable&" WHERE ID="&intID1)
Set rs2=adoConn.execute("SELECT LID, RID, (RID - LID + 1) AS Witdh, PID  FROM "&strTable&" WHERE ID="&intID2)
	IF rs1.eof Then
		intReturn = -10005'--来源节点不存在
		Exit Function
	Else
		intLID1=rs1("LID")
		intRID1=rs1("RID")
		intWitdh1=rs1("Witdh")
		intPID1=rs1("PID")
	End If
	IF rs2.eof Then
		intReturn = -10006'--来源节点不存在
		Exit Function
	Else
		intLID2=rs2("LID")
		intRID2=rs2("RID")
		intWitdh2=rs2("Witdh")
		intPID2=rs2("PID")
	End If

	'--//父节点不能移动到子节点中
	Set rs=adoConn.execute("SELECT ID FROM "&strTable&" WHERE LID BETWEEN "&intLID1&" AND "&intRID1&" AND ID="&intID2)
	IF Not rs.eof Then
		intReturn = -10007'--父节点不能移动到子节点中
		Exit Function
	End If
	
	Select Case Lcase(strDir)
	Case "<"'--放到左边
		IF (intRID1+1=intLID2) Then
			intReturn = 0'--节点1已经在节点2前面，无需操作
			Exit Function
		End If
		
		adoConn.BeginTrans '事务开始
		'--标记出需要被移动的节点
		adoConn.execute("UPDATE "&strTable&" SET STATUS=1 WHERE LID BETWEEN "&intLID1&" AND "&intRID1&" AND STATUS=0")
		
		'--//@N=移动所需要影响的节点数和移动方向
		IF (intLID2 - intRID1)<0 Then'--向左移动
			intN = intLID2 - intLID1
			adoConn.execute("UPDATE "&strTable&" SET RID = RID + "&intWitdh1&" WHERE RID > "&intLID2&" AND RID<"&intLID1&" AND STATUS=0")
			adoConn.execute("UPDATE "&strTable&" SET LID = LID + "&intWitdh1&" WHERE LID >="&intLID2&" AND LID<"&intLID1&" AND STATUS=0")
		ELSE
			intN = intLID2 - intRID1 - 1
			adoConn.execute("UPDATE "&strTable&" SET RID = RID - "&intWitdh1&" WHERE RID > "&intRID1&" AND RID<"&intLID2&" AND STATUS=0")
			adoConn.execute("UPDATE "&strTable&" SET LID = LID - "&intWitdh1&" WHERE LID > "&intRID1&" AND LID<"&intLID2&" AND STATUS=0")
		END IF
		'--更新节点
		adoConn.execute("UPDATE "&strTable&" SET LID=LID+"&intN&",RID=RID+"&intN&",STATUS=0 WHERE STATUS=1")
	Case ">"'--放到右边
		IF (intRID2+1=intLID1) Then
			intReturn = 0'--已经是右边，无需操作
			Exit Function
		End If
		
		adoConn.BeginTrans '事务开始
		'--标记出需要被移动的节点
		adoConn.execute("UPDATE "&strTable&" SET STATUS=1 WHERE LID BETWEEN "&intLID1&" AND "&intRID1&" AND STATUS=0")
		
		'--//@N=移动所需要影响的节点数和移动方向
		IF (intRID2 - intRID1)>0 Then
			intN = intRID2 - intRID1
		Else
			intN = intRID2 - intLID1 + 1
		End If
		
		IF (intN<0) Then'--向左移动到节点的右边
			adoConn.execute("UPDATE "&strTable&" SET RID = RID + "&intWitdh1&" WHERE RID > "&intRID2&" AND RID<"&intLID1&" AND STATUS=0")
			adoConn.execute("UPDATE "&strTable&" SET LID = LID + "&intWitdh1&" WHERE LID > "&intRID2&" AND LID<"&intLID1&" AND STATUS=0")
		ELSE
			adoConn.execute("UPDATE "&strTable&" SET RID = RID - "&intWitdh1&" WHERE RID > "&intRID1&" AND RID <= "&intRID2&" AND STATUS=0")
			adoConn.execute("UPDATE "&strTable&" SET LID = LID - "&intWitdh1&" WHERE LID > "&intRID1&" AND LID <= "&intRID2&" AND STATUS=0")
		END IF
		'--更新节点
		adoConn.execute("UPDATE "&strTable&" SET LID=LID+"&intN&",RID=RID+"&intN&",STATUS=0 WHERE STATUS=1")
	Case ">>"'--子节点最右边
		'--表示来源ID已经是目的ID的子节点，而且就自动移动到子节点的最右边
		IF (intPID1 = intID2) Then
			IF (intRID1+1<>intRID2) Then'--如果不在右边
				'--选择目的节点的最后一个子节点
				Dim intID3,rs3
				Set rs3 = adoConn.execute("SELECT b.ID FROM "&strTable&" AS a,"&strTable&" AS b WHERE a.ID="&intID2&" AND a.RID=b.RID+1")
				IF Not rs3.eof Then
					intID3 = rs3(0)
					call nodemove(intID1,intID3,">")
				End IF
			END IF
			Exit Function
		END IF

		adoConn.BeginTrans '事务开始
		'--标记出需要被移动的节点
		adoConn.execute("UPDATE "&strTable&" SET STATUS=1 WHERE LID BETWEEN "&intLID1&" AND "&intRID1&" AND STATUS=0")
		
		IF (intRID2 - intRID1)<0 Then
			intN = intRID2 - intLID1
			adoConn.execute("UPDATE "&strTable&" SET RID = RID + "&intWitdh1&" WHERE RID >="&intRID2&" AND RID < "&intLID1&" AND STATUS=0")
			adoConn.execute("UPDATE "&strTable&" SET LID = LID + "&intWitdh1&" WHERE LID > "&intRID2&" AND LID < "&intLID1&" AND STATUS=0")
		ELSE
			intN = intRID2 - intRID1 - 1
			adoConn.execute("UPDATE "&strTable&" SET RID = RID - "&intWitdh1&" WHERE RID > "&intRID1&" AND RID < "&intRID2&" AND STATUS=0")
			adoConn.execute("UPDATE "&strTable&" SET LID = LID - "&intWitdh1&" WHERE LID > "&intRID1&" AND LID < "&intRID2&" AND STATUS=0")
		END IF
		
		'--更新节点
		adoConn.execute("UPDATE "&strTable&" SET LID=LID+"&intN&",RID=RID+"&intN&",STATUS=0 WHERE STATUS=1")
		adoConn.execute("UPDATE "&strTable&" SET PID="&intID2&" WHERE ID = "&intID1&"")'--更新来源地址的父节点ID为目标节点

	Case Else
		intReturn = -10001'--无效操作
		Exit Function
	End Select
	
	'提交数据
	call commitTrans()
End Function
'-------------------------------------------------------公共输入
'输入conn连接对象
Public Property Let conn(ByVal objConn)
  Set adoConn = objConn
End Property

'输入要操作的表名称
Public Property Let table(ByVal strName)
  strTable = strName
End Property
'-------------------------------------------------------公共输出
'添加一个节点
Public Property Get add(ByVal intID,ByVal strName)
	call nodeaction("add",intID,strName)
	add = intReturn
End Property

'修改一个节点
Public Property Get edit(ByVal intID,ByVal strName)
	call nodeaction("mod",intID,strName)
	edit = intReturn
End Property

'删除一个节点
Public Property Get del(ByVal intID)
	call nodeaction("del",intID,"")
	del = intReturn
End Property

''--只能移除被删除的节点
Public Property Get remove(ByVal intID)
	call nodeaction("remove",intID,"")
	remove = intReturn
End Property

'重置节点
Public Property Get restore(ByVal intID1,ByVal intID2)
	call nodeaction("restore",intID1,intID2)
	restore = intReturn
End Property

''移动节点，从intID1移动到intID2,移动方向
Public Property Get move(ByVal intID1,ByVal intID2,ByVal strDir)
	call nodemove(intID1,intID2,strDir)
	move = intReturn
End Property


'重置节点
Public Property Get resetnode()
Call chkTable()'检测表
Dim sql
	sql = ""
	sql = sql &" UPDATE "&strTable&" SET LID=c.LID,RID=c.RID,PID=c.PID"
	sql = sql &" FROM ("
	sql = sql &"	SELECT a.ID,LID=1,RID=2*COUNT(b.ID),PID=0 FROM "&strTable&" AS a,"&strTable&" AS b"
	sql = sql &"	WHERE a.STATUS=0 AND a.PID=0 AND b.STATUS=0 GROUP BY a.ID"
	sql = sql &"	UNION ALL"
	sql = sql &"	SELECT TMP.ID,LID=(rowId+1)*2-2,RID=(rowId+1)*2-1,PID=b.ID FROM ("
	sql = sql &"		SELECT ROW_NUMBER()Over(ORDER BY ID)  as rowId,ID"
	sql = sql &"		FROM "&strTable&" WHERE STATUS=0 AND PID<>0"
	sql = sql &"	) AS TMP,"&strTable&" AS b WHERE b.STATUS=0 AND b.PID=0"
	sql = sql &" ) AS c,"&strTable&" AS d WHERE d.STATUS=0 AND d.ID=c.ID"
	adoConn.execute(sql)
End Property


Public Property Get getDelnode()
Call chkTable()'检测表
'--获取被删除的节点
Set getDelnode = adoConn.execute("SELECT * FROM "&strTable&" WHERE STATUS = 4096")
End Property

Public Property Get getNodedepth()
Call chkTable()'检测表
'--显示所有节点的深度
Dim sql,rs
	sql = ""
	sql = sql &" SELECT node.ID,node.Name,(COUNT(parent.ID) - 1) AS depth"
	sql = sql &" FROM "&strTable&" AS node,"&strTable&" AS parent"
	sql = sql &" Where node.LID BETWEEN parent.LID AND parent.RID"
	sql = sql &" AND node.STATUS=0 AND parent.STATUS=0"
	sql = sql &" GROUP BY node.ID,node.Name,node.LID"
	sql = sql &" ORDER BY node.LID"
Set getNodedepth = adoConn.execute(sql)
End Property

Public Property Get getFullpath(ByVal intID)
IF IsEmpty(intID) Then intID=0 End IF
IF IsNumeric(intID)=False Then intID=0 End IF
Call chkTable()'检测表
'--获取某个节点的全路径
Dim sql,rs
	sql = ""
	sql = sql &" SELECT parent.ID,parent.Name"
	sql = sql &" FROM "&strTable&" AS node,"&strTable&" AS parent"
	sql = sql &" WHERE node.LID BETWEEN parent.LID AND parent.RID"
	sql = sql &" AND node.STATUS=0 AND parent.STATUS=0"
	sql = sql &" AND node.ID = "&intID
	sql = sql &" ORDER BY parent.LID"
Set getFullpath = adoConn.execute(sql)
End Property

Public Property Get getSubnode(ByVal intID)
IF IsEmpty(intID) Then intID=0 End IF
IF IsNumeric(intID)=False Then intID=0 End IF
Call chkTable()'检测表
'--子节点的深度
Dim sql,rs
	sql = ""
	'sql = sql &" SELECT *,(CASE WHEN (RID = LID + 1) THEN 0 ELSE 1 END) AS Leaf From ("
	sql = sql &" SELECT *,iif(RID = LID + 1,0,1) AS Leaf From ("'ACCESS不支持SELECT CASE
	sql = sql &" SELECT node.ID,node.Name,node.LID,node.RID,(COUNT(parent.ID) - (sub_tree.depth + 1)) AS depth"
	sql = sql &" FROM"
	sql = sql &" 	"&strTable&" AS node,"
	sql = sql &" 	"&strTable&" AS parent,"
	sql = sql &" 	"&strTable&" AS sub_parent,"
	sql = sql &" 	("
	'sql = sql &" 		--所有节点的深度"
	sql = sql &" 		SELECT node.ID,node.Name,(COUNT(parent.ID) - 1) AS depth"
	sql = sql &" 		FROM "&strTable&" AS node,"&strTable&" AS parent"
	sql = sql &" 		Where node.LID BETWEEN parent.LID AND parent.RID"
	sql = sql &" 		AND node.STATUS=0 AND parent.STATUS=0"
	sql = sql &" 		GROUP BY node.ID,node.Name"
	sql = sql &" 	) AS sub_tree"
	sql = sql &" WHERE node.LID BETWEEN parent.LID AND parent.RID"
	sql = sql &" 	AND node.LID BETWEEN sub_parent.LID AND sub_parent.RID"
	sql = sql &" 	AND sub_parent.ID = sub_tree.ID"
	sql = sql &" 	AND sub_parent.ID = "&intID
	sql = sql &" GROUP BY node.ID,node.Name,node.LID,node.RID,sub_tree.depth"
	sql = sql &" ) AS tree"
	sql = sql &" Where depth=1"
	sql = sql &" ORDER BY LID"
Set getSubnode = adoConn.execute(sql)
End Property

Public Property Get nodeCheck()
Call chkTable()'检测表
'检测节点是否有错误,无错误返回0,其他都是有错误的
Dim sql,rs,return:return=-1
	sql = "SELECT SUM(LRID)-(NODE.LID+NODE.RID)*NODE.RID/2 FROM ("
	sql = sql &" SELECT LID AS LRID FROM "&strTable&" WHERE STATUS=0"
	sql = sql &" UNION ALL"
	sql = sql &" SELECT RID AS LRID FROM "&strTable&" WHERE STATUS=0"
	sql = sql &" ) AS LR,"&strTable&" AS NODE WHERE NODE.STATUS=0 AND NODE.PID=0 GROUP BY NODE.LID,NODE.RID"
Set rs = adoConn.execute(sql)
	If not rs.eof Then
	return = rs(0)
	End If
	nodeCheck = return'返回值
End Property

Public Property Get Version
  Version = strVersion
End Property

Public Property Get Author
  Author = strAuthor
End Property
'//结束
End Class
</script>