TYPE=VIEW
query=select `eu`.`id` AS `id`,`eu`.`score` AS `score`,`eu`.`user_id` AS `user_id`,`eu`.`exam_id` AS `exam_id`,`eu`.`updated_at` AS `updated_at`,`e`.`lesson_id` AS `lesson_id`,`e`.`grade_id` AS `grade_id`,`e`.`exam_type_id` AS `exam_type_id`,`l`.`lesson_name` AS `lesson_name`,`u`.`f_name` AS `f_name`,`u`.`l_name` AS `l_name`,`u`.`father_name` AS `father_name`,`u`.`national_code` AS `national_code`,`g`.`grade_name` AS `grade_name`,`et`.`exam_type` AS `exam_type` from (((((`school`.`exam_users` `eu` join `school`.`exams` `e` on(`e`.`id` = `eu`.`exam_id`)) join `school`.`lessons` `l` on(`l`.`id` = `e`.`lesson_id`)) join `school`.`users` `u` on(`u`.`id` = `eu`.`user_id`)) join `school`.`grades` `g` on(`g`.`id` = `e`.`grade_id`)) join `school`.`exam_types` `et` on(`et`.`id` = `e`.`exam_type_id`))
md5=ee375e3038c381fbc2e482982d284ec1
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2023-06-27 10:02:26
create-version=2
source=SELECT eu.id,eu.score,eu.user_id,eu.exam_id,eu.updated_at,e.lesson_id,e.grade_id,e.exam_type_id,l.lesson_name,u.f_name,u.l_name,u.father_name,u.national_code,g.grade_name,et.exam_type\nFROM exam_users eu \nJOIN exams e ON e.id=eu.exam_id\nJOIN lessons l ON l.id=e.lesson_id\nJOIN users u ON u.id=eu.user_id\nJOIN grades g ON g.id=e.grade_id\nJOIN exam_types et ON et.id=e.exam_type_id
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `eu`.`id` AS `id`,`eu`.`score` AS `score`,`eu`.`user_id` AS `user_id`,`eu`.`exam_id` AS `exam_id`,`eu`.`updated_at` AS `updated_at`,`e`.`lesson_id` AS `lesson_id`,`e`.`grade_id` AS `grade_id`,`e`.`exam_type_id` AS `exam_type_id`,`l`.`lesson_name` AS `lesson_name`,`u`.`f_name` AS `f_name`,`u`.`l_name` AS `l_name`,`u`.`father_name` AS `father_name`,`u`.`national_code` AS `national_code`,`g`.`grade_name` AS `grade_name`,`et`.`exam_type` AS `exam_type` from (((((`school`.`exam_users` `eu` join `school`.`exams` `e` on(`e`.`id` = `eu`.`exam_id`)) join `school`.`lessons` `l` on(`l`.`id` = `e`.`lesson_id`)) join `school`.`users` `u` on(`u`.`id` = `eu`.`user_id`)) join `school`.`grades` `g` on(`g`.`id` = `e`.`grade_id`)) join `school`.`exam_types` `et` on(`et`.`id` = `e`.`exam_type_id`))
mariadb-version=100424
