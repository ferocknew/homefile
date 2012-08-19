SELECT
  a.*
FROM `table1` a
  INNER JOIN (SELECT
                id
              FROM table1
              ORDER BY id
              LIMIT 999000,10 ) b
    ON a.id = b.id;