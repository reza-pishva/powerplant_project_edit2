TYPE=VIEW
query=select `school`.`class_rooms`.`id` AS `id`,`school`.`class_rooms`.`name` AS `name`,`school`.`class_rooms`.`grade_id` AS `grade_id`,`school`.`grades`.`grade_name` AS `grade_name` from (`school`.`class_rooms` join `school`.`grades` on(`school`.`grades`.`id` = `school`.`class_rooms`.`grade_id`))
md5=f9aeefaa08706f69b176db445fcf7977
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2023-06-19 09:54:20
create-version=2
source=SELECT \nclass_rooms.`id`,class_rooms.`name`,class_rooms.`grade_id`, grades.`grade_name`\nFROM `class_rooms`\nINNER JOIN `grades` ON  grades.`id` = class_rooms.`grade_id`
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `school`.`class_rooms`.`id` AS `id`,`school`.`class_rooms`.`name` AS `name`,`school`.`class_rooms`.`grade_id` AS `grade_id`,`school`.`grades`.`grade_name` AS `grade_name` from (`school`.`class_rooms` join `school`.`grades` on(`school`.`grades`.`id` = `school`.`class_rooms`.`grade_id`))
mariadb-version=100424
