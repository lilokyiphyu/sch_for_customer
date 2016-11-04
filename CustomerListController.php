<?php
require_once 'framework/ControllerAbstract.php';
require_once 'helper/SessionManager.php';
require_once 'Exception.php';
require_once 'helper/HtmlTagData.php';

class CustomerListController extends Framework_ControllerAbstract
{
  private $session = NULL;
  protected function _getValidationSetting() {
    // key = action-name, var = { validation-ini-file, section-name }
    return array();
  }

  public function indexAction()
  {
    // @note indexには、SSO関係の人は入ってこない。backに入る。
    // Dispdataをクリアする。
    $this->_saveDispdata(array());
    $this->_setupView();
    $this->_render('CustomerList');
  }

  public function searchAction() {

//    $param = $this->_getInputParameter();
    $param = $this->_getParams();
    $condition = $param;

    if(strlen($condition['COMPANYNAME']) > 0) {
      $condition['COMPANYNAME'] = '%'.$condition['COMPANYNAME'].'%';
      if(strlen($condition['NAME'])>0)

      {
        $condition['NAME'] = '%'.$condition['NAME'].'%';
      }

	if(strlen($condition['MAIL'])>0)
		{
			$condition['MAIL'] = '%'.$condition['MAIL'].'%';
		}

    }

    // 検索結果欄の値渡し
    $this->_setupView($condition);
    // 検索ボックス欄の値渡し
    $this->_smarty->assign('condition', $param);
    $this->_render('CustomerList');
  }

 	 private function _getInputParameter()
 		{

  			$param = array(
      		 'COMPANYNAME' => $this->_getParam('companyname'),
       		 'NAME'        => $this->_getParam('name'),
      		 'MAIL'        => $this->_getParam('mail'),
    		);
  			return $param;
 		 }


	private function _setupView($condition = array())
	{
		//$customer_info = SessionManager::getCustomerInfo();

		$param = array();
		if($condition['mail']) $param['MAIL'] = $condition['mail'];

		if($condition['name']) $param['NAME'] = $condition['name'];

		if($condition['companyname']) $param['COMPANYNAME'] = $condition['companyname'];

		$customer_list = Functions::selectFrom($this->_getDBh(), 'CUSTOMER', $param);

		$this->_smarty->assign('customer_list', $customer_list);


		$lists = array( 'disp_list'     => $customer_list,
			'param'         => $param,
			'search_assign' => '');

		$this->_saveDispdata($lists);
		$this->_smarty->assign('customer_list',  $customer_list);
		$this->_smarty->assign('companyname', $companyname);
		$this->_smarty->assign('name', $name);
		$this->_smarty->assign('mail', $mail);

		$this->setHeader();

		// 左メニュー部分の設定処理
		$this->setPageNavi();

	}

  private function setHeader(){


  	$customer_info = SessionManager::getCustomerInfo();

  	$this->_smarty->assign('login_user_name', $customer_info['customer_name']);

  }



  private function setPageNavi(){

  	// 企業管理をactiveにする
  	$StatusListActive = "active";
  	$this->_smarty->assign('CustomerListActive', $StatusListActive);

  }
}







