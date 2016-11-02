{include file="PageHeader.tpl" title="顧客一覧" class=6}
			<div class="container">
{include file="Message.tpl"}
<div class="well">
				 <div style="margin: 0 0 20px 0; float: right">
                  <a href="#" class="btn btn-success" onclick="javascript:submit_c('customer-regist'); return false;"><i class="fa fa-plus"></i>新登録</a>
                  </div>

                  <h4><i class="fa fa-user"> </i> 顧客管理</h4>

                  <table  class="table" value="{$condition.COMPANYNAME}" >

<!--<input type="text" id="search" placeholder="Type to search">!-->
                <tbody>

                <tr>

                <th>
                  <label class="control-label minimal" for="company_name"  {if $condition.cnt == ''} checked{/if} />会社名</label>
                </th>
                <td>


            <input class="input-large minimal" type="text" name="companyname" id="companyname"{if $condition.COMPANYNAME == '$companyname'} checked{/if}   placeholder="会社名"  value="{$companyname}">


                </td>
                </tr>
                <tr>
                <th>
                  <label class="control-label minimal" for="name"  {if $condition.cnt == ''} checked{/if} />氏名</label>

                </th>
                <td>
                 <input class="input-large minimal" type="text" name="name"{if $condition.NAME == '$name'} checked{/if}  id="name" placeholder="氏名" value="{$name}">


                </td>
               </tr>
               <tr>
                <th>
                  <label class="control-label minimal" for="mail"  {if $condition.cnt == ''} checked{/if} />メールアドレス</label>
                </th>
                <td>
                  <input class="input-xlarge minimal" type="text" name="mail" id="mail" {if $condition.MAIL == '$mail'} checked{/if}  placeholder="メールアドレス" value="{$mail}" maxlength="256">
                   </td>
              </tr>
              </tbody>
             </table>


 <div style="width: 43%;
					margin: 0 auto;
					margin-bottom: 25px;">

<button type="button"  class="btn btn-warning" class="search" onClick="JavaScript:submit_c('customer-list', 'search'); return false;"><i class="fa fa-search"></i> 検索</button>


</div>
</div>


<table class="table table-bordered table-striped table-hover customerlisttable">
			<thead>
			<tr>
			<th class="col1">顧客名</th>
            <th class="col2">部署</th>
            <th class="col3">役職</th>
            <th class="col1">氏名</th>
            <th class="col2">メールアドレス</th>
            <th class="col3">電話番号１</th>
            <th class="col1">電話番号2</th>
            <th class="col2">メモ</th>
            <th class="col3">操作</th>
			</tr>
			</thead>
<tbody>


{foreach from=$customer_list item=customer name=loop}
				<tr>
		<td class="companyname">{$customer.COMPANYNAME}</td>
         <td class="department">{$customer.DEPARTMENT}</td>
         <td class="positon">{$customer.POSITON}</td>
         <td class="name">{$customer.NAME}</td>
         <td class="mail">{$customer.MAIL}</td>
         <td class="tel1">{$customer.TEL1}</td>
         <td class="tel2">{$customer.TEL2}</td>
         <td class="memo">{$customer.MEMO}</td>


<td class="edittd"><a href="#" class="btn btn-small btn-primary" onclick="javascript:submit_c('customer-edit', 'index', 'customer_id', {$customer.CUSTOMER_ID}); return false;"><i class="fa fa-pencil"></i> 詳細</a></td>

				</tr>
{/foreach}
				</tbody>
			</table>
			</div>
{include file="PageFooter.tpl"}
