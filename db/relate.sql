CREATE TABLE `users` (
`id` INTEGER NOT NULL AUTO_INCREMENT ,
`health` INTEGER DEFAULT NULL ,
`email` VARCHAR(255) DEFAULT NULL ,
`password` VARCHAR(255) DEFAULT NULL ,
`created` DATETIME DEFAULT NULL ,
`modified` DATETIME DEFAULT NULL ,
PRIMARY KEY (`id`)
);

CREATE TABLE `activities` (
`id` INTEGER NOT NULL AUTO_INCREMENT ,
`name` VARCHAR(255) DEFAULT NULL ,
`frequency` INTEGER DEFAULT NULL ,
`created` DATETIME DEFAULT NULL ,
`modified` DATETIME DEFAULT NULL ,
PRIMARY KEY (`id`)
);

CREATE TABLE `activities_users` (
`activity_id` INTEGER DEFAULT NULL ,
`user_id` INTEGER DEFAULT NULL ,
UNIQUE KEY (`activity_id`, `user_id`)
);

CREATE TABLE `questions` (
`id` INTEGER NOT NULL AUTO_INCREMENT ,
`content` VARCHAR(255) DEFAULT NULL ,
`type` VARCHAR(255) DEFAULT NULL ,
`created` DATETIME DEFAULT NULL ,
`modified` DATETIME DEFAULT NULL ,
PRIMARY KEY (`id`)
);

CREATE TABLE `choices` (
`id` INTEGER NOT NULL AUTO_INCREMENT ,
`value` INTEGER DEFAULT NULL ,
`content` VARCHAR(255) DEFAULT NULL ,
`created` DATETIME DEFAULT NULL ,
`modified` DATETIME DEFAULT NULL ,
`question_id` INTEGER DEFAULT NULL ,
PRIMARY KEY (`id`)
);

CREATE TABLE `responses` (
`id` INTEGER NOT NULL AUTO_INCREMENT ,
`value` INTEGER DEFAULT NULL ,
`created` DATETIME DEFAULT NULL ,
`modified` DATETIME DEFAULT NULL ,
`activity_id` INTEGER DEFAULT NULL ,
`user_id` INTEGER DEFAULT NULL ,
`choice_id` INTEGER DEFAULT NULL ,
`question_id` INTEGER DEFAULT NULL ,
PRIMARY KEY (`id`)
);

ALTER TABLE `users` ADD FOREIGN KEY (id) REFERENCES `responses` (`user_id`);
ALTER TABLE `activities` ADD FOREIGN KEY (id) REFERENCES `responses` (`activity_id`);
ALTER TABLE `activities_users` ADD FOREIGN KEY (activity_id) REFERENCES `activities` (`id`);
ALTER TABLE `activities_users` ADD FOREIGN KEY (user_id) REFERENCES `users` (`id`);
ALTER TABLE `questions` ADD FOREIGN KEY (id) REFERENCES `choices` (`question_id`);
ALTER TABLE `questions` ADD FOREIGN KEY (id) REFERENCES `responses` (`question_id`);
ALTER TABLE `choices` ADD FOREIGN KEY (id) REFERENCES `responses` (`choice_id`);
