<div class="pageContent">
    <form method="post" action="permission/create" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone);">
        <div class="pageFormContent" layoutH="56">
            <p><label>权限名称:</label><input name="name" type="text" size="30" required="required"/></p>
            <p><label>权限分组:</label>
                <input type="hidden" name="groups.id">
                <input class="required" name="groups.name" type="text" postField="keyword" lookupGroup="group"/>
                <a class="btnLook" href="permission/groups/lookup" lookupGroup="group">查找带回</a>
            </p>
            <p><label>权限描述:</label><textarea name="desp" cols="30"></textarea></p>
        </div>
        <div class="formBar">
            <ul>
                <li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
                <li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
            </ul>
        </div>
    </form>
</div>