SELECT a.*,b.group_name,b.group_img FROM `fclub`.`fc_flc_color` as a, `fclub`.`fc_flc_colorgroup` as b where a.group_code=b.group_id ORDER BY hex(CONVERT(a.color_name USING GBK))