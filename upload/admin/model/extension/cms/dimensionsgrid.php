<?php
class ModelExtensionCmsDimensionsgrid extends Model {

	public function install() {

		if (!$this->isExistTable('product_size')) {
			$this->db->query("
				CREATE TABLE `".DB_PREFIX."product_size` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`name` varchar(10) NOT NULL,
				PRIMARY KEY (`id`)
				) ENGINE=MyISAM DEFAULT CHARSET=utf8;
			");
			$this->db->query("INSERT INTO `".DB_PREFIX."product_size` VALUES (1,'S'),(2,'M'),(3,'L'),(4,'XL'),(5,'XXL');");
		}

		if (!$this->isExistField('product_option_value', 'product_size_id')) {
		    $this->db->query("ALTER TABLE `" . DB_PREFIX . "product_option_value` ADD COLUMN  `product_size_id` int(11) AFTER `option_value_id`");
		}
	}

	public function uninstall() {

		$this->db->query("DROP TABLE IF EXISTS `" . DB_PREFIX . "product_size`");

		if ($this->isExistField('product_option_value', 'product_size_id')) {
		    $this->db->query("ALTER TABLE `" . DB_PREFIX . "product_option_value` DROP COLUMN  `product_size_id`");
		}
	}

	protected function isExistField($table, $field)
	{
		$chk = $this->db->query("SHOW COLUMNS FROM `" . DB_PREFIX . "{$table}` WHERE `field` = '{$field}'");
		return $chk->num_rows ? true : false;
	}

	protected function isExistTable($table)
	{
		$chk = $this->db->query("SELECT COUNT(*) AS cnt FROM information_schema.TABLES WHERE table_name='".DB_PREFIX."{$table}'");
		return (!empty($chk->row['cnt'])) ? true : false;
	}

}
