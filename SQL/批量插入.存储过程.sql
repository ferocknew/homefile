USE [HeroCRM2010]
GO

/****** Object:  StoredProcedure [dbo].[WorkJobInsert]    Script Date: 05/26/2010 17:11:20 ******/
SET ANSI_NULLS ON
GO

SET QUOTED_IDENTIFIER ON
GO

CREATE Proc [dbo].[WorkJobInsert](@WorkName varchar(400),
@WorkItem varchar(400),
@BeginDate datetime,
@EndDate datetime,
@Description varchar(1000),
@CreateEmpId int,
@CreateTime datetime,
@LastUpdateEmpId int,
@LastUpdateTime datetime,
@Status int,
@Description_WorkJob_Emp varchar(1000),
@BeginDateTime datetime,
@EnddateTime datetime,
@DepID int)
As
Declare @WorkJobId int
Declare @InterNewBarsId int

Begin

	Insert Into WorkJob(WorkName,WorkItem,BeginDate,EndDate,Description,
						CreateEmpId,CreateTime,LastUpdateEmpId,LastUpdateTime)

	values(@WorkName,@WorkItem,@BeginDate,@EndDate,@Description,
			@CreateEmpId,@CreateTime,@LastUpdateEmpId,@LastUpdateTime)
	
	Select @WorkJobId=@@identity

	Insert Into WorkJob_Emp(Emp_Id,Wjob_Id,State,Description,BeginDateTime,EndDateTime)
	(Select Id,@WorkJobId,@Status,@Description_WorkJob_Emp,@BeginDateTime,@EnddateTime From InternetBars Where  SaleDepartment=@DepID)
	
End

GO


