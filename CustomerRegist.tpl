{include file="PageHeader.tpl" title="顧客新規登録" class=6}
      <div class="container">
{include file="Message.tpl"}
        <div class="form-horizontal">
        <div class="well">
		<h4><i class="fa fa-user" aria-hidden="true"> </i> 顧客管理</h4>
        </div>
          <table class="table">
            <tbody>
              <tr>
                <th>
                  <label class="control-label" for="company_name">会社名</label>
                </th>
                <td>
                  <input class="input-large" type="text" name="companyname" id="companyname" placeholder="会社名" value="{$companyname}">
                  <!--<span class="label label-important">必須</span>!-->
                </td>
              </tr>
              <tr>
                <th>
                  <label class="control-label" for="department">部署</label>
                </th>
                <td>
                  <input class="input-medium" type="text" name="department" id="department" placeholder="部署" value="{$department}">
                </td>
              </tr>
              <tr>
                <th>
                  <label class="control-label" for="positon">役職</label>
                </th>
                <td>
                  <input class="input-medium" type="text" name="positon" id="positon" placeholder="役職" value="{$positon}">
                </td>
              </tr>

              <tr>
                <th>
                  <label class="control-label" for="name">氏名</label>
                </th>
                <td>
                  <input class="input-medium" type="name" name="name" id="name" placeholder="氏名" value="{$name}">
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
                  <input class="input-medium" type="text" name="tel2" id="tel1" placeholder="電話番号2" value="{$tel2}" maxlength="13">
                </td>
              </tr>


                <tr>
                <th>
                  <label class="control-label" for="memo">メモ</label>
                </th>
                <td>


                  <textarea name="memo" rows="5" cols="100" class="input-xxlarge" type="memo" name="memo" id="memo" value="{$memo}"> </textarea>
                </td>
              </tr>
            </tbody>
          </table>


          <div class="form-actions">
         <a href="#" class="btn btn-success" onclick="javascript:submit_a_Confirm('regist'); return false;"><i class="fa fa-check"></i> 新規登録</a>
          </div>
        </div>
      </div>
{include file="PageFooter.tpl"}
