<?php

require_once 'framework/ControllerAbstract.php';
require_once 'helper/SessionManager.php';
require_once 'Exception.php';
require_once 'helper/HtmlTagData.php';

class CustomerEditController extends Framework_ControllerAbstract
{
  private $session = NULL;
  protected function _getValidationSetting() {
    // key = action-name, var = { validation-ini-file, section-name }
  return array('edit' => array('validation_customer.ini', 'customer'));

  }

  public function indexAction()
  {
    // @note indexには、SSO関係の人は入ってこない。backに入る。
    // Dispdataをクリアする。
    $this->_saveDispdata(array());
    $this->_setupView();
    $this->_render('CustomerEdit');
  }

  private function _setupView()
  {
    $customer_info = SessionManager::getCustomerInfo();

    $customer_id   = $this->_getParam('customer_id');
    $param = array($customer_id);

    // 取得
    $customer_list = $this->_query( $this->_getDBh(), "customer_list_select_id", $param, TRUE );



    // Session Dispdata に格納用
    $lists = array( 'disp_list'     => $customer_list,
            'param'         => $param,
            'search_assign' => '');


      // Session Dispdataへ格納
    $this->_saveDispdata($lists);




      $this->_smarty->assign('customer_id', $customer_list[0]["CUSTOMER_ID"]);
      $this->_smarty->assign('companyname', $customer_list[0]["COMPANYNAME"]);
      $this->_smarty->assign('department', $customer_list[0]["DEPARTMENT"]);
      $this->_smarty->assign('positon', $customer_list[0]["POSITON"]);
      $this->_smarty->assign('name', $customer_list[0]["NAME"]);
      $this->_smarty->assign('mail', $customer_list[0]["MAIL"]);
      $this->_smarty->assign('tel1', $customer_list[0]["TEL1"]);
      $this->_smarty->assign('tel2', $customer_list[0]["TEL2"]);
      $this->_smarty->assign('memo', $customer_list[0]["MEMO"]);
  }
//update edit


  private function _getInputParameter() {
  	$param = array();

  	// 生年月日

  	$param['CUSTOMER_ID']			 = $this->_getParam('$customer_id');		// メール
  	$param['COMPANYNAME']			 = $this->_getParam('companyname');		// 氏名
  	$param['DEPARTMENT']	 = $this->_getParam('department');	// 氏名（ローマ字）
  	$param['POSITON']		 = $this->_getParam('positon');		// 性別
  	$param['NAME']		 = $this->_getParam('name');		// 住所
  	$param['MAIL']			 = $this->_getParam('mail');			// 電話番号
  	$param['TEL1']			 = $this->_getParam('tel1');		// 顔写真
  	$param['TEL2']		 = $this->_getParam('tel2');	// 最終学歴
  	$param['MEMO']		     = $this->_getParam('memo');		// 滞在期間


  	return $param;
  }





public function editAction()
{
	$custmer_info = SessionManager::getCustomerInfo();
	// Dispdataをクリアする。
	$param = $this->_getInputParameter();//testing
	$this->_saveDispdata(array());


	$customer_id   = $this->_getParam('customer_id');
	$companyname = $this->_getParam('companyname');
	$department  = $this->_getParam('department');
	$positon      = $this->_getParam('positon');
	$name   = $this->_getParam('name');
	$mail   = $this->_getParam('mail');
	$tel1   = $this->_getParam('tel1');
	$tel2   = $this->_getParam('tel2');
	$memo   = $this->_getParam('memo');

	;
	// 更新処理

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

$where = array(

	"customer_id" => $customer_id

	);


  $ret = Functions::updateTo($this->_getDBh(), 'customer', $param,$where,'0');

$this->_forward('index', 'customer-list',null, $param);
return ;

}
 public function deleteAction()

  {
  $customer_info = SessionManager::getCustomerInfo();

  $this->_saveDispdata(array());

  $customer_id   = $this->_getParam('customer_id');
  $companyname = $this->_getParam('companyname');
  $department  = $this->_getParam('department');
  $positon      = $this->_getParam('positon');
  $name   = $this->_getParam('name');
  $mail   = $this->_getParam('mail');
  $tel1   = $this->_getParam('tel1');
  $tel2   = $this->_getParam('tel2');
  $memo   = $this->_getParam('memo');
  // 更新処理
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


  	$where = array(
  			  "customer_id = $customer_id"

  	);
  	$ret = Functions::deleteFrom($this->_getDBh(), 'customer', $param,$where,'0');
  	$this->_forward('index', 'customer-list');

  }

}
