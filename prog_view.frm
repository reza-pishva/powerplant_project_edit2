TYPE=VIEW
query=select `school`.`lesson_programs`.`id` AS `id`,`school`.`lesson_programs`.`class_id` AS `class_id`,`school`.`lesson_programs`.`lesson_id` AS `lesson_id`,`school`.`lesson_programs`.`time_start` AS `time_start`,`school`.`lesson_programs`.`time_end` AS `time_end`,`school`.`lesson_programs`.`dayOfWeek` AS `dayOfWeek`,`school`.`lessons`.`lesson_name` AS `lesson_name`,`school`.`class_rooms`.`name` AS `name` from ((`school`.`lesson_programs` join `school`.`lessons` on(`school`.`lessons`.`id` = `school`.`lesson_programs`.`lesson_id`)) join `school`.`class_rooms` on(`school`.`class_rooms`.`id` = `school`.`lesson_programs`.`class_id`))
md5=53f45234ee77bc19b8a921f4894fa1d6
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2023-06-19 09:38:55
create-version=2
source=SELECT \nlesson_programs.`id`,lesson_programs.`class_id`,lesson_programs.`lesson_id`,\nlesson_programs.`time_start`,lesson_programs.`time_end`,lesson_programs.`dayOfWeek`,\nlessons.`lesson_name`,class_rooms.`name`\nFROM `lesson_programs` \nINNER JOIN `lessons` ON lessons.`id` = lesson_programs.`lesson_id` \nINNER JOIN `class_rooms` ON class_rooms.`id` = lesson_programs.`class_id`
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `school`.`lesson_programs`.`id` AS `id`,`school`.`lesson_programs`.`class_id` AS `class_id`,`school`.`lesson_programs`.`lesson_id` AS `lesson_id`,`school`.`lesson_programs`.`time_start` AS `time_start`,`school`.`lesson_programs`.`time_end` AS `time_end`,`school`.`lesson_programs`.`dayOfWeek` AS `dayOfWeek`,`school`.`lessons`.`lesson_name` AS `lesson_name`,`school`.`class_rooms`.`name` AS `name` from ((`school`.`lesson_programs` join `school`.`lessons` on(`school`.`lessons`.`id` = `school`.`lesson_programs`.`lesson_id`)) join `school`.`class_rooms` on(`school`.`class_rooms`.`id` = `school`.`lesson_programs`.`class_id`))
mariadb-version=100424
