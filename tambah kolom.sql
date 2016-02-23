USE bengkelpos;

ALTER TABLE `ospos_people`
	CHANGE COLUMN `person_id` `person_id` INT(10) NOT NULL AUTO_INCREMENT FIRST;
	
ALTER TABLE `ospos_people`
	ADD COLUMN `plate_number` VARCHAR(10) NOT NULL AFTER `last_name`,
	ADD COLUMN `vehicle_info` VARCHAR(100) NOT NULL AFTER `plate_number`;

ALTER TABLE `ospos_items`
	ADD COLUMN `listing_price` DECIMAL(15,2) NOT NULL AFTER `unit_price`;