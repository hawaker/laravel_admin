<div class="pageContent">
    <form method="post" action="permission/groups/create" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="56">
            <p><label>分组名称：</label><input name="name" type="text" size="30" required="required"/></p>
            <p><label>分组描述：</label><textarea name="desp" cols="30"></textarea></p>
        </div>
        <div class="formBar">
            <ul>
                <li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
                <li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
            </ul>
        </div>
    </form>
</div>