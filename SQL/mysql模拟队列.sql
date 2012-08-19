UPDATE targets,
 (
	SELECT
		id
	FROM
		targets
	WHERE
		STATUS = 0
	AND SCHEDULE < CURRENT_TIMESTAMP
	ORDER BY
		SCHEDULE ASC
	LIMIT 1
) tmp
SET STATUS = 1
WHERE
	targets.id = LAST_INSERT_ID(tmp.id);
SELECT * FROM targets WHERE ROW_COUNT()>0 and id=LAST_INSERT_ID();

-- http://blog.csdn.net/huithe/article/details/7048032