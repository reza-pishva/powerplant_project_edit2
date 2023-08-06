TYPE=VIEW
query=select `u`.`id` AS `user_id`,`u`.`f_name` AS `f_name`,`u`.`l_name` AS `l_name`,`u`.`gender` AS `gender`,`u`.`national_code` AS `national_code`,`u`.`email` AS `email`,`c`.`name` AS `name`,`c`.`id` AS `class_id`,`g`.`grade_name` AS `grade_name`,`g`.`id` AS `grade_id` from (((`school`.`users` `u` left join `school`.`user_to_classes` `uc` on(`u`.`id` = `uc`.`user_id`)) left join `school`.`class_rooms` `c` on(`uc`.`class_id` = `c`.`id`)) left join `school`.`grades` `g` on(`c`.`grade_id` = `g`.`id`))
md5=3f2868b97c3cd346256ab8a289d6ed6a
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2023-06-22 15:00:14
create-version=2
source=SELECT u.id AS user_id,u.f_name,u.l_name,u.gender,u.national_code,u.email,c.name,c.id AS class_id,g.grade_name,g.id AS grade_id\nFROM users u \nLEFT JOIN user_to_classes uc ON u.id=uc.user_id\nLEFT JOIN class_rooms c ON uc.class_id=c.id\nLEFT JOIN grades g ON c.grade_id=g.id
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `u`.`id` AS `user_id`,`u`.`f_name` AS `f_name`,`u`.`l_name` AS `l_name`,`u`.`gender` AS `gender`,`u`.`national_code` AS `national_code`,`u`.`email` AS `email`,`c`.`name` AS `name`,`c`.`id` AS `class_id`,`g`.`grade_name` AS `grade_name`,`g`.`id` AS `grade_id` from (((`school`.`users` `u` left join `school`.`user_to_classes` `uc` on(`u`.`id` = `uc`.`user_id`)) left join `school`.`class_rooms` `c` on(`uc`.`class_id` = `c`.`id`)) left join `school`.`grades` `g` on(`c`.`grade_id` = `g`.`id`))
mariadb-version=100424
