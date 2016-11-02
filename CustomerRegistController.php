<?php


require_once 'framework/ControllerAbstract.php';
require_once 'helper/SessionManager.php';
require_once 'Exception.php';
require_once 'helper/HtmlTagData.php';
require_once 'Zend/Validate.php';

//ini_set('display_errors', 1);//ini_set('display_errors', 1);


class CustomerRegistController extends Framework_ControllerAbstract
{


	private $session = NULL;
	protected function _getValidationSetting() {
		// key = action-name, var = { validation-ini-file, section-name }
		return array('regist' => array('validation_customer.ini', 'customer'));
	}






	public function indexAction()
	{
		// Dispdataをクリアする。
		$this->_saveDispdata(array());

		$this->_setupView();
		$this->_render('CustomerRegist');


	}

	private function _setupView()
	{
		$customer_info = SessionManager::getCustomerInfo();/*edit this code*/



		$customer_id   = $this->_getParam('customer_id');
		$companyname = $this->_getParam('companyname');
		$department  = $this->_getParam('department');
		$positon      = $this->_getParam('positon');
		$name   = $this->_getParam('name');
		$mail   = $this->_getParam('mail');
		$tel1   = $this->_getParam('tel1');
		$tel2   = $this->_getParam('tel2');
		$note   = $this->_getParam('note');

		$this->_smarty->assign('customer_id',   $customer_id);
		$this->_smarty->assign('company_name', $companyname);
		$this->_smarty->assign('department',   $department);
		$this->_smarty->assign('positon',  $positon);
		$this->_smarty->assign('name',      $name);
		$this->_smarty->assign('mail',   $mail);
		$this->_smarty->assign('tel1',   $tel1);
		$this->_smarty->assign('tel2',   $tel2);
		$this->_smarty->assign('memo',  $memo);





	}





	public function registAction()
	{
		// Dispdataをクリアする。

		if(SessionManager::passSubmit()){
			$this->_registCustomer();
		}

		//adding testing

		$this->_saveDispdata(array());

		$customer_info = SessionManager::getCustomerInfo();//edit this code


		$customer_id   = $this->_getParam('customer_id');
		$companyname = $this->_getParam('companyname');
		$department  = $this->_getParam('department');
		$positon      = $this->_getParam('positon');
		$name   = $this->_getParam('name');
		$mail   = $this->_getParam('mail');
		$tel1   = $this->_getParam('tel1');
		$tel2   = $this->_getParam('tel2');
		$memo   = $this->_getParam('memo');




		// 登録処理
		$param = array(
				"companyname"=>$companyname				//
				,"department"=>$department				//
				,"positon"=>$positon				//
				,"name"=>$name					//
				,"mail"=>$mail
				,"tel1"=>$tel1
				,"tel2"=>$tel2
				,"memo"=>$memo

		);

		$result = Functions::insertTo($this->_getDBh(),'customer',$param,'0');



		$customer_info = SessionManager::getCustomerInfo();

		$this->_forward('index', 'customer-list');




	}


private function _registCustomer()
	{
		$customer_info = SessionManager::getCustomerInfo();

		$customer_id   = $this->_getParam('customer_id');
		$companyname = $this->_getParam('companyname');
		$department  = $this->_getParam('department');
		$positon      = $this->_getParam('positon');
		$name   = $this->_getParam('name');
		$mail   = $this->_getParam('mail');
		$tel1   = $this->_getParam('tel1');
		$tel2   = $this->_getParam('tel2');
		$memo   = $this->_getParam('memo');




		// 登録処理
		  $param = array(
				"companyname"=>$companyname				//
				,"department"=>$department				//
				,"positon"=>$positon				//
				,"name"=>$name					//
				,"mail"=>$mail
				,"tel1"=>$tel1
				,"tel2"=>$tel2
				,"memo"=>$memo
				,date('Y/m/d H:i:s')	// CREATE_DATE
				,$user_info['customer_id']	// CREATE_USER_ID
				,date('Y/m/d H:i:s')	// UPDATE_DATE
				,$user_info['user_id']	// UPDATE_USER_ID
				,"0"					// DELETE_FLAG

		);

		$ret = Functions::query($this->_getDBh(), 'customer_insert', $param,'0');


	}



}
