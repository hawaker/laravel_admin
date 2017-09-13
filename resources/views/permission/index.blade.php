<div class="pageContent">
    <div class="tabs">
        <div class="tabsHeader">
            <div class="tabsHeaderContent">
                <ul><li><a href="javascript:;"><span>权限管理</span></a></li></ul>
            </div>
        </div>
        <div class="tabsContent">
            <div>
                <div layoutH="100" style="float:left; display:block; overflow:auto; width:240px; border:solid 1px #CCC; line-height:21px; background:#fff">
                    <ul class="tree treeFolder">
                        <li><a href="permission/show" target="ajax" rel="permissionBox">全部分组</a>
                            <ul>
                                @foreach($groups as $value)
                                <li><a href="permission/show/{{$value['id']}}" target="ajax" rel="permissionBox">{{$value['name']}}</a></li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
                <div id="permissionBox" class="unitBox" style="margin-left:246px;"></div>
            </div>
        </div>
        <div class="tabsFooter"><div class="tabsFooterContent"></div></div>
    </div>
</div>