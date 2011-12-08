<?php
/**
 * Kunena Plugin
 * @package Kunena.Plugins
 * @subpackage Joomla15
 *
 * @copyright (C) 2008 - 2011 Kunena Team. All rights reserved.
 * @license http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * @link http://www.kunena.org
 **/
defined ( '_JEXEC' ) or die ();

class KunenaLoginJoomla {
	protected $params = null;

	public function __construct($params) {
		$this->params = $params;
	}

	public function loginUser($username, $password, $rememberme) {
		$credentials = array('username' => $username, 'password' => $password);
		$options = array('remember' => $rememberme);
		$error = JFactory::getApplication()->login ( $credentials, $options );
		return is_bool($error) ? '' : $error;
	}

	public function logoutUser() {
		$error = JFactory::getApplication()->logout ();
		return is_bool($error) ? '' : $error;
	}

	public function getLoginURL() {
		return JRoute::_('index.php?option=com_user&view=login');
	}

	public function getLogoutURL() {
		return JRoute::_('index.php?option=com_user&view=login');
	}

	public function getRegistrationURL() {
		$usersConfig = JComponentHelper::getParams ( 'com_users' );
		if ($usersConfig->get ( 'allowUserRegistration' ))
			return JRoute::_('index.php?option=com_user&view=register');
	}

	public function getResetURL() {
		return JRoute::_('index.php?option=com_user&view=reset');
	}

	public function getRemindURL() {
		return JRoute::_('index.php?option=com_user&view=remind');
	}
}