TYPE=VIEW
query=select `u`.`id` AS `user_id`,`u`.`f_name` AS `f_name`,`u`.`l_name` AS `l_name`,`u`.`gender` AS `gender`,`u`.`national_code` AS `national_code`,`u`.`email` AS `email`,`c`.`name` AS `name`,`c`.`id` AS `class_id`,`c`.`year` AS `year`,`g`.`grade_name` AS `grade_name`,`g`.`id` AS `grade_id` from (`school`.`grades` `g` left join (`school`.`class_rooms` `c` left join (`school`.`user_to_classes` `uc` left join `school`.`users` `u` on(`u`.`id` = `uc`.`user_id`)) on(`uc`.`class_id` = `c`.`id`)) on(`c`.`grade_id` = `g`.`id`))
md5=0a24bde398063219c562170b03ce32b6
updatable=0
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2023-06-23 14:14:33
create-version=2
source=SELECT u.id AS user_id,u.f_name,u.l_name,u.gender,u.national_code,u.email,c.name,c.id AS class_id,c.year,g.grade_name,g.id AS grade_id\nFROM users u \nRIGHT JOIN user_to_classes uc ON u.id=uc.user_id\nRIGHT JOIN class_rooms c ON uc.class_id=c.id\nRIGHT JOIN grades g ON c.grade_id=g.id
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `u`.`id` AS `user_id`,`u`.`f_name` AS `f_name`,`u`.`l_name` AS `l_name`,`u`.`gender` AS `gender`,`u`.`national_code` AS `national_code`,`u`.`email` AS `email`,`c`.`name` AS `name`,`c`.`id` AS `class_id`,`c`.`year` AS `year`,`g`.`grade_name` AS `grade_name`,`g`.`id` AS `grade_id` from (`school`.`grades` `g` left join (`school`.`class_rooms` `c` left join (`school`.`user_to_classes` `uc` left join `school`.`users` `u` on(`u`.`id` = `uc`.`user_id`)) on(`uc`.`class_id` = `c`.`id`)) on(`c`.`grade_id` = `g`.`id`))
mariadb-version=100424
