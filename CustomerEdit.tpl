{include file="PageHeader.tpl" title="社員編集" class=6}
      <div class="container">
{include file="Message.tpl"}
        <div class="form-horizontal">

        <div class="well"><h4><i class="fa fa-edit"> </i> 顧客編集</h4></div>
          <table class="table">
            <tbody>
              <tr>
                <th>
                  <label class="control-label" for="user_name">会社名</label>
                </th>
                <td>
                   <input class="input-medium" type="text" name="companyname" id="companyname" placeholder="会社名" value="{$companyname}">
                  <span class="label label-important">必須</span>
                </td>
              </tr>
              <tr>
                <th>
                  <label class="control-label" for="account">部署</label>
                </th>
                <td>
                  <input class="input-medium" type="text" name="department" id="department" placeholder="部署" value="{$department}">
                </td>
              </tr>
              <tr>
                <th>
                  <label class="control-label" for="mail">役職</label>
                </th>
                <td>
                  <input class="input-xxlarge" type="text" name="positon" id="mail" placeholder="役職" value="{$positon}">
                </td>
              </tr>
              <tr>
                <th>
                  <label class="control-label" for="mail">氏名</label>
                </th>
                <td>
                  <input class="input-xxlarge" type="text" name="name" id="name" placeholder="役職" value="{$name}">
                </td>
              </tr>
              <tr>
                <th>
                  <label class="control-label" for="mail">メールアドレス</label>
                </th>
                <td>
                  <input class="input-xxlarge" type="text" name="mail" id="mail" placeholder="メールアドレス" value="{$mail}" maxlength="256">
                </td>
              </tr>
                <tr>
                <th>
                  <label class="control-label" for="tel1">電話番号1</label>
                </th>
                <td>
                  <input class="input-medium" type="text" name="tel1" id="tel1" placeholder="電話番号1" value="{$tel1}" maxlength="13">
                </td>
              </tr>
              <tr>
                <th>
                  <label class="control-label" for="tel2">電話番号2</label>
                </th>
                <td>
                  <input class="input-medium" type="text" name="tel2" id="tel2" placeholder="電話番号2" value="{$tel2}" maxlength="13">
                </td>
              </tr>

              <tr>
                <th>
                  <label class="control-label" for="memo">メモ</label>
                </th>
                <td>
                 <!--<input class="input-medium" type="text" name="memo" id="memo" placeholder="メモ" value="{$memo}" maxlength="1000">!-->
                <input class="input-xxlarge" type="text" name="memo" id="memo" value="{$memo}" maxlength="1000" > </input>
                </td>
              </tr>

          </tbody>
          </table>
     <input type="hidden" name="customer_id" value="{$customer_id}">
          <div class="form-actions">

	    <a href="#" class="btn btn-primary" onclick="javascript:submit_c_Confirm('customer-edit', 'edit'); return false;"><i class="fa fa-refresh"></i> 更新</a>



		   <a href="#" class="btn btn-danger" onclick="javascript:submit_a_delConfirm('delete'); return false;"><i class="fa fa-trash"></i> 削除</a>
          </div>
        </div>
      </div>
{include file="PageFooter.tpl"}
