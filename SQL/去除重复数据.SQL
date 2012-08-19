--peoplepeople 表名
--peopleId 重复字段
--rowid 主ID字段
--and peopleId <> 0 加入排除条件

delete from people
where peopleId  in (select  peopleId  from people  group  by  peopleId  having  count(peopleId) > 1)
and rowid not in (select min(rowid) from  people  group by peopleId  having count(peopleId )>1) and peopleId <> 0