<?php

require_once 'framework/ControllerAbstract.php';
require_once 'helper/SessionManager.php';
require_once 'Exception.php';
require_once 'helper/HtmlTagData.php';


class UserEditController extends Framework_ControllerAbstract
{
	private $session = NULL;
	protected function _getValidationSetting() {
		// key = action-name, var = { validation-ini-file, section-name }
		return array('edit' => array('validation_user.ini', 'user'));
	}

	public function indexAction()
	{
		// @note indexには、SSO関係の人は入ってこない。backに入る。
		// Dispdataをクリアする。
		$this->_saveDispdata(array());

		$this->_setupView();
		$this->_render('UserEdit');
	}

	private function _setupView()
	{
		$user_info = SessionManager::getUserInfo();

		$user_id   = $this->_getParam('user_id');
		$param = array($user_id);

		// 取得
		$user_list = $this->_query( $this->_getDBh(), "user_list_select_id", $param, TRUE );

		// Session Dispdata に格納用
		$lists = array( 'disp_list'     => $user_list,
						'param'         => $param,
						'search_assign' => '');

		// Session Dispdataへ格納
		$this->_saveDispdata($lists);

		$this->_smarty->assign('user_id', $user_list[0]["USER_ID"]);
		$this->_smarty->assign('user_name', $user_list[0]["USER_NAME"]);
		$this->_smarty->assign('account', $user_list[0]["ACCOUNT"]);
		$this->_smarty->assign('password', $user_list[0]["PASSWORD"]);
		$this->_smarty->assign('mail', $user_list[0]["MAIL"]);
		$this->_smarty->assign('tel', $user_list[0]["TEL"]);
	}

	public function editAction()
	{
		$user_info = SessionManager::getUserInfo();

		// Dispdataをクリアする。
		$this->_saveDispdata(array());

		$user_id   = $this->_getParam('user_id');
		$user_name = $this->_getParam('user_name');
		$account   = $this->_getParam('account');
		$mail      = $this->_getParam('mail');
		$tel   = $this->_getParam('tel');

		// 更新処理
		$param = array(
			  $account				//
			 ,$user_name			//
			 ,$mail					//
			 ,$tel				//
			 ,date('Y/m/d H:i:s')	// UPDATE_DATE
			,$user_info['user_id']	// UPDATE_USER_ID
			,$user_id				//
		);


		$ret = Functions::query($this->_getDBh(), 'user_update', $param);


//		$info_msg = "ユーザー：".$user_name." を更新しました。";
//		$this->_smarty->assign('info_msg', $info_msg);

		$this->_setupView();

//		$this->_rerender();
		$this->_forward('index', 'user-list');
	}

	public function deleteAction()
	{
		$user_info = SessionManager::getUserInfo();

		// Dispdataをクリアする。
		$this->_saveDispdata(array());

		$user_id   = $this->_getParam('user_id');
		$user_name = $this->_getParam('user_name');

		// 現在ログインユーザは削除できない
		if($user_id == $user_info['user_id']){
			$err_msg[] = ErrMessage::create('1', 'ユーザー', "現在ログイン中のユーザーは削除できません。", '', '');
			$this->_smarty->assign('err_msg', $err_msg);

			$this->_setupView();
			$this->_rerender();
			return;
		}

		$param = array($user_id);

		// 更新処理
		$param = array(
			 date('Y/m/d H:i:s')	// UPDATE_DATE
			,$user_info['user_id']	// UPDATE_USER_ID
			,$user_id			// CUSTOMER_CODE
		);
		$ret = Functions::query($this->_getDBh(), 'user_delete', $param);

		$info_msg = "ユーザー：".$user_name." を削除しました。";
//		$this->_smarty->assign('info_msg', $info_msg);

//		$this->_setupView();

//		$this->_rerender();
		$this->_forward('index', 'user-list', null, array("info_msg" => $info_msg));
//		$this->_render('UserList');
	}
}
