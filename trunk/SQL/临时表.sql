CREATE TEMPORARY TABLE table_tmp ENGINE = MEMORY AS(
	SELECT
		*
	FROM
		csdnusertable
	LIMIT 10
)

drop table IF EXISTS table_tmp;

CREATE TEMPORARY TABLE table_temp_1 ENGINE=MEMORY AS (SELECT goods_id from fc_goods LIMIT 10);