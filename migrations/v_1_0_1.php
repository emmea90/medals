<?php
/**
*
* @author Gremlinn (Nathan DuPra) mods@dupra.net | Anvar Stybaev (DEV Extension phpBB3.1.x)
* @package Medals System Extension
* @copyright Anvar 2015 (c) Extensions bb3.mobi
* @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
*
*/

namespace bb3mobi\medals\migrations;

class v_1_0_1 extends \phpbb\db\migration\migration
{
	public function effectively_installed()
	{
		return isset($this->config['medals_version']) && version_compare($this->config['medals_version'], '1.0.1', '>=');
	}

	static public function depends_on()
	{
		return array('\bb3mobi\medals\migrations\v_1_0_0');
	}

	/**
	* Drop columns medal_user_points in the database:
	*
	* @return array Array of table schema
	* @access public
	*/
	public function update_schema()
	{
		return array(
			'drop_columns'	=> array(
				$this->table_prefix . 'users'	=> array(
					'medal_user_points',
				),
			),
		);
	}

	public function update_data()
	{
		return array(
			// Update version
			array('config.update', array('medals_version', '1.0.1')),
		);
	}
}
