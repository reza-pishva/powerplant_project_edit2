TYPE=VIEW
query=select `eu`.`id` AS `id`,`eu`.`score` AS `score`,`eu`.`user_id` AS `user_id`,`eu`.`exam_id` AS `exam_id`,`e`.`lesson_id` AS `lesson_id`,`e`.`grade_id` AS `grade_id`,`e`.`exam_type_id` AS `exam_type_id`,`l`.`lesson_name` AS `lesson_name`,`u`.`f_name` AS `f_name`,`u`.`l_name` AS `l_name` from (((`school`.`exam_users` `eu` join `school`.`exams` `e` on(`e`.`id` = `eu`.`exam_id`)) join `school`.`lessons` `l` on(`l`.`id` = `e`.`lesson_id`)) join `school`.`users` `u` on(`u`.`id` = `eu`.`user_id`))
md5=b16eabab147bc877e089ec68d2352bbd
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2023-06-27 09:36:29
create-version=2
source=SELECT eu.id,eu.score,eu.user_id,eu.exam_id,e.lesson_id,e.grade_id,e.exam_type_id,l.lesson_name,u.f_name,u.l_name\nFROM exam_users eu \nJOIN exams e ON e.id=eu.exam_id\nJOIN lessons l ON l.id=e.lesson_id\nJOIN users u ON u.id=eu.user_id
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `eu`.`id` AS `id`,`eu`.`score` AS `score`,`eu`.`user_id` AS `user_id`,`eu`.`exam_id` AS `exam_id`,`e`.`lesson_id` AS `lesson_id`,`e`.`grade_id` AS `grade_id`,`e`.`exam_type_id` AS `exam_type_id`,`l`.`lesson_name` AS `lesson_name`,`u`.`f_name` AS `f_name`,`u`.`l_name` AS `l_name` from (((`school`.`exam_users` `eu` join `school`.`exams` `e` on(`e`.`id` = `eu`.`exam_id`)) join `school`.`lessons` `l` on(`l`.`id` = `e`.`lesson_id`)) join `school`.`users` `u` on(`u`.`id` = `eu`.`user_id`))
mariadb-version=100424
