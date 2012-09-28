VERSION 5.00
Object = "{831FDD16-0C5C-11D2-A9FC-0000F8754DA1}#2.0#0"; "MSCOMCTL.OCX"
Begin VB.Form Form1 
   Caption         =   "Form1"
   ClientHeight    =   6555
   ClientLeft      =   120
   ClientTop       =   450
   ClientWidth     =   9675
   LinkTopic       =   "Form1"
   ScaleHeight     =   6555
   ScaleWidth      =   9675
   StartUpPosition =   3  '¥∞ø⁄»± °
   Begin VB.Frame Frame1 
      Caption         =   "Frame1"
      Height          =   5175
      Left            =   240
      TabIndex        =   2
      Top             =   1080
      Width           =   9135
      Begin VB.CommandButton Command2 
         Caption         =   "Command2"
         Height          =   495
         Left            =   360
         TabIndex        =   3
         Top             =   360
         Width           =   735
      End
   End
   Begin MSComctlLib.TabStrip TabStrip1 
      Height          =   5655
      Left            =   120
      TabIndex        =   1
      Top             =   720
      Width           =   9375
      _ExtentX        =   16536
      _ExtentY        =   9975
      _Version        =   393216
      BeginProperty Tabs {1EFB6598-857C-11D1-B16A-00C0F0283628} 
         NumTabs         =   2
         BeginProperty Tab1 {1EFB659A-857C-11D1-B16A-00C0F0283628} 
            Caption         =   "≤‚ ‘"
            Key             =   "tab1"
            ImageVarType    =   2
         EndProperty
         BeginProperty Tab2 {1EFB659A-857C-11D1-B16A-00C0F0283628} 
            Caption         =   "≤‚ ‘2"
            Key             =   "tab2"
            ImageVarType    =   2
         EndProperty
      EndProperty
   End
   Begin VB.CommandButton Command1 
      Caption         =   "∞¥≈•"
      Height          =   375
      Left            =   120
      TabIndex        =   0
      Top             =   120
      Width           =   1095
   End
End
Attribute VB_Name = "Form1"
Attribute VB_GlobalNameSpace = False
Attribute VB_Creatable = False
Attribute VB_PredeclaredId = True
Attribute VB_Exposed = False
'Private Declare Function FreeLibrary Lib "kernel32" (ByVal hLibModule As Long) As Long
'Private Declare Function LoadLibrary Lib "kernel32" Alias "LoadLibraryA" (ByVal lpLibFileName As String) As Long
'Private Declare Function GetProcAddress Lib "kernel32" (ByVal hModule As Long, ByVal lpProcName As String) As Long
'Private Declare Function CallWindowProc Lib "user32" Alias "CallWindowProcA" (ByVal lpPrevWndFunc As Long, ByVal hWnd As Long, ByVal Msg As Any, ByVal wParam As Any, ByVal lParam As Any) As Long

Option Explicit
Public Conn As New ADODB.Connection
Public sqliteConn As Object


Private Sub Command1_Click()
    'MsgBox ("≤‚ ‘£°")
    'Dim rs As New ADODB.Recordset
    Dim sql As String
    'sql = "select * from [table]"
    'rs.Open sql, Conn, 1, 1
    'arr = rs.GetRows()
    'Debug.Print UBound(arr, 1)
    
    'For i = 0 To UBound(arr, 1) - 1
    '    Debug.Print arr(1, i)
    'Next
    
    sql = "select nl from tab01 where id=26 limit 1"
    Dim rs As New LiteStatement
    rs.ActiveConnection = sqliteConn
    rs.Prepare sql
    Dim row As Variant
    For Each row In rs.Rows
        MsgBox row(0)
    Next

End Sub

Private Sub Form_Load()
    Set sqliteConn = CreateObject("LiteX.LiteConnection")
    sqliteConn.Open (App.Path & "\test.db")
    'Dim ConnectionString As String
    'ConnectionString = "Provider = Microsoft.Jet.OLEDB.4.0;Persist Security Info = False;Data Source =" & App.Path & "\Database1.mdb"
    'Conn.Open ConnectionString
End Sub

Private Sub Form_Unload(Cancel As Integer)
    'Conn.Close
    'Set Conn = Nothing
    'Debug.Print Conn
End Sub


Private Sub TabStrip1_Click()
Select Case TabStrip1.SelectedItem.Key
Case "tab1"
Frame1.Visible = True

Case "tab2"
Frame1.Visible = False

End Select

End Sub
