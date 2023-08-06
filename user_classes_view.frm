TYPE=VIEW
query=select `u`.`id` AS `user_id`,`u`.`f_name` AS `f_name`,`u`.`l_name` AS `l_name`,`u`.`gender` AS `gender`,`u`.`national_code` AS `national_code`,`u`.`email` AS `email`,`c`.`name` AS `name`,`g`.`grade_name` AS `grade_name` from (((`school`.`users` `u` join `school`.`user_to_classes` `uc` on(`u`.`id` = `uc`.`user_id`)) join `school`.`class_rooms` `c` on(`uc`.`class_id` = `c`.`id`)) join `school`.`grades` `g` on(`c`.`grade_id` = `g`.`id`))
md5=2321afe474fe8017babe9576b11afb62
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2023-06-22 13:11:35
create-version=2
source=SELECT u.id AS user_id,u.f_name,u.l_name,u.gender,u.national_code,u.email,c.name,g.grade_name\nFROM users u \nJOIN user_to_classes uc ON u.id=uc.user_id\nJOIN class_rooms c ON uc.class_id=c.id\nJOIN grades g ON c.grade_id=g.id
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `u`.`id` AS `user_id`,`u`.`f_name` AS `f_name`,`u`.`l_name` AS `l_name`,`u`.`gender` AS `gender`,`u`.`national_code` AS `national_code`,`u`.`email` AS `email`,`c`.`name` AS `name`,`g`.`grade_name` AS `grade_name` from (((`school`.`users` `u` join `school`.`user_to_classes` `uc` on(`u`.`id` = `uc`.`user_id`)) join `school`.`class_rooms` `c` on(`uc`.`class_id` = `c`.`id`)) join `school`.`grades` `g` on(`c`.`grade_id` = `g`.`id`))
mariadb-version=100424
