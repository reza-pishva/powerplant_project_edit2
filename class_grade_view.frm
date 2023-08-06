TYPE=VIEW
query=select `school`.`class_rooms`.`id` AS `id`,`school`.`class_rooms`.`name` AS `name`,`school`.`grades`.`grade_name` AS `grade_name`,`school`.`grades`.`id` AS `grade_id` from (`school`.`class_rooms` join `school`.`grades` on(`school`.`grades`.`id` = `school`.`class_rooms`.`grade_id`))
md5=4258aa436fd6982743a816d8c45ed4a0
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2023-06-06 09:11:03
create-version=2
source=SELECT class_rooms.`id`,class_rooms.`name`,grades.`grade_name`,grades.id AS grade_id FROM `class_rooms` INNER JOIN `grades` ON grades.`id` = class_rooms.`grade_id`
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `school`.`class_rooms`.`id` AS `id`,`school`.`class_rooms`.`name` AS `name`,`school`.`grades`.`grade_name` AS `grade_name`,`school`.`grades`.`id` AS `grade_id` from (`school`.`class_rooms` join `school`.`grades` on(`school`.`grades`.`id` = `school`.`class_rooms`.`grade_id`))
mariadb-version=100424
