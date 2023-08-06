TYPE=VIEW
query=select `school`.`lessons`.`id` AS `id`,`school`.`lessons`.`lesson_name` AS `lesson_name`,`school`.`grades`.`grade_name` AS `grade_name`,`school`.`grades`.`id` AS `grade_id` from (`school`.`lessons` join `school`.`grades` on(`school`.`grades`.`id` = `school`.`lessons`.`grade_id`))
md5=d0fdd9d36f067135b07c705011f61f4a
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2023-06-06 10:13:57
create-version=2
source=SELECT lessons.`id`,lessons.`lesson_name`,grades.`grade_name`,grades.id as grade_id FROM `lessons` INNER JOIN `grades` ON grades.`id` = lessons.`grade_id`
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `school`.`lessons`.`id` AS `id`,`school`.`lessons`.`lesson_name` AS `lesson_name`,`school`.`grades`.`grade_name` AS `grade_name`,`school`.`grades`.`id` AS `grade_id` from (`school`.`lessons` join `school`.`grades` on(`school`.`grades`.`id` = `school`.`lessons`.`grade_id`))
mariadb-version=100424
