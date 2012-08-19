-- Exp No.1
EXPLAIN
SELECT
	fc_goods.*
FROM
	(
		SELECT
			FLOOR(
				RAND() * (SELECT COUNT(*) FROM fc_goods)
			) num,
			@num :=@num + 1
		FROM
			(SELECT @num := 0) a,
			fc_goods
		LIMIT 1
	) b,
	fc_goods
WHERE
	b.num = fc_goods.goods_id;


-- Exp No.2 good!!!!

SELECT
	*
FROM
	`fc_goods` AS t1
JOIN (
	SELECT
		ROUND(
			RAND() * (
				(
					SELECT
						MAX(goods_id)
					FROM
						`fc_goods`
				) - (
					SELECT
						MIN(goods_id)
					FROM
						`fc_goods`
				)
			) + (
				SELECT
					MIN(goods_id)
				FROM
					`fc_goods`
			)
		) AS goods_id
) AS t2
WHERE
	t1.goods_id >= t2.goods_id
ORDER BY
	t1.goods_id
LIMIT 1;