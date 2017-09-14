<div class="pageContent">
    <form method="post" action="permission/create" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="56">
            <dl class="nowrap">
                <dt>权限名称：</dt><dd><input class="required" name="name" type="text"/></dd>
            </dl>
            <dl class="nowrap">
                <dt>权限分组：</dt>
                <dd>
                    <input name="org1.id" value="" type="hidden"/>
                    <input class="required" name="org1.name" type="text"  lookupGroup="org1"  readonly="readonly" />
                    <a class="btnLook" href="permission/groups/lookup" lookupGroup="org1">查找带回</a>	
                </dd>
            </dl>
            <dl class="nowrap">
                <dt>权限描述:</dt>
                <dd><textarea name="desp" cols="22" rows="3"></textarea></dd>
            </dl>
        </div>
        <div class="formBar">
            <ul>
                <li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
                <li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
            </ul>
        </div>
    </form>
</div>