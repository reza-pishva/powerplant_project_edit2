TYPE=VIEW
query=select `school`.`users`.`id` AS `id`,`school`.`users`.`f_name` AS `f_name`,`school`.`users`.`l_name` AS `l_name`,`school`.`users`.`national_code` AS `national_code`,`school`.`users`.`father_name` AS `father_name`,`school`.`users`.`gender` AS `gender`,`school`.`users`.`email` AS `email`,`school`.`users`.`role` AS `role`,`school`.`exam_users`.`date_shamsi` AS `date_shamsi`,`school`.`exam_users`.`score` AS `score`,`school`.`lessons`.`lesson_name` AS `lesson_name` from (((`school`.`exam_users` join `school`.`users` on(`school`.`users`.`id` = `school`.`exam_users`.`user_id`)) join `school`.`exams` on(`school`.`exams`.`id` = `school`.`exam_users`.`exam_id`)) join `school`.`lessons` on(`school`.`exams`.`lesson_id` = `school`.`lessons`.`id`))
md5=08f1d7ab7522e184bbec7640b82358e0
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2023-04-24 06:46:49
create-version=2
source=SELECT \nusers.`id`,users.`f_name`,users.`l_name`,users.`national_code`,users.`father_name`,users.`gender`,users.`email`,users.`role`,\nexam_users.`date_shamsi`,exam_users.`score`,lessons.`lesson_name`\nFROM `exam_users` \nINNER JOIN `users` ON users.`id` = exam_users.`user_id` \nINNER JOIN `exams` ON exams.`id` = exam_users.`exam_id`\nINNER JOIN `lessons` ON exams.`lesson_id` = lessons.`id`
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `school`.`users`.`id` AS `id`,`school`.`users`.`f_name` AS `f_name`,`school`.`users`.`l_name` AS `l_name`,`school`.`users`.`national_code` AS `national_code`,`school`.`users`.`father_name` AS `father_name`,`school`.`users`.`gender` AS `gender`,`school`.`users`.`email` AS `email`,`school`.`users`.`role` AS `role`,`school`.`exam_users`.`date_shamsi` AS `date_shamsi`,`school`.`exam_users`.`score` AS `score`,`school`.`lessons`.`lesson_name` AS `lesson_name` from (((`school`.`exam_users` join `school`.`users` on(`school`.`users`.`id` = `school`.`exam_users`.`user_id`)) join `school`.`exams` on(`school`.`exams`.`id` = `school`.`exam_users`.`exam_id`)) join `school`.`lessons` on(`school`.`exams`.`lesson_id` = `school`.`lessons`.`id`))
mariadb-version=100424
