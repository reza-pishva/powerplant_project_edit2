TYPE=VIEW
query=select `school`.`exams`.`id` AS `id`,`school`.`exams`.`exam_type_id` AS `exam_type_id`,`school`.`exams`.`grade_id` AS `grade_id`,`school`.`exams`.`lesson_id` AS `lesson_id`,`school`.`grades`.`grade_name` AS `grade_name`,`school`.`lessons`.`lesson_name` AS `lesson_name`,`school`.`exam_types`.`exam_type` AS `exam_type` from (((`school`.`exams` join `school`.`lessons` on(`school`.`lessons`.`id` = `school`.`exams`.`lesson_id`)) join `school`.`grades` on(`school`.`grades`.`id` = `school`.`exams`.`grade_id`)) join `school`.`exam_types` on(`school`.`exam_types`.`id` = `school`.`exams`.`exam_type_id`))
md5=1dfb35e28a205a4b0ad99323d696bbed
updatable=1
algorithm=0
definer_user=root
definer_host=localhost
suid=2
with_check_option=0
timestamp=2023-06-18 11:15:31
create-version=2
source=SELECT \nexams.`id`,exams.`exam_type_id`,exams.`grade_id`,\nexams.`lesson_id`,grades.`grade_name`,lessons.`lesson_name`,exam_types.`exam_type`\nFROM `exams` \nINNER JOIN `lessons` ON lessons.`id` = exams.`lesson_id`\nINNER JOIN `grades` ON grades.`id` = exams.`grade_id`\nINNER JOIN `exam_types` ON exam_types.`id` = exams.`exam_type_id`
client_cs_name=utf8mb4
connection_cl_name=utf8mb4_unicode_ci
view_body_utf8=select `school`.`exams`.`id` AS `id`,`school`.`exams`.`exam_type_id` AS `exam_type_id`,`school`.`exams`.`grade_id` AS `grade_id`,`school`.`exams`.`lesson_id` AS `lesson_id`,`school`.`grades`.`grade_name` AS `grade_name`,`school`.`lessons`.`lesson_name` AS `lesson_name`,`school`.`exam_types`.`exam_type` AS `exam_type` from (((`school`.`exams` join `school`.`lessons` on(`school`.`lessons`.`id` = `school`.`exams`.`lesson_id`)) join `school`.`grades` on(`school`.`grades`.`id` = `school`.`exams`.`grade_id`)) join `school`.`exam_types` on(`school`.`exam_types`.`id` = `school`.`exams`.`exam_type_id`))
mariadb-version=100424
