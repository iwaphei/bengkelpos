USE bengkelpos;

ALTER TABLE `ospos_items`
	CHANGE COLUMN `color` `merk` VARCHAR(255) NOT NULL AFTER `description`;