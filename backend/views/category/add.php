<div id="map">
    <span class='title'>添加分类</span>
</div>
<div id="content">
    <form action="" method="post">
        <table class='table table-striped table-bordered'>
            <thead>
            <tr>
                <th width="20%">名称</th>
                <th>值</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>所属分类</td>
                <td>
                    <select name="" id="">

                        <option value=""></option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>分类名称</td>
                <td>
                    <input type="text" name="cname" />
                </td>
            </tr>
            <tr>
                <td>分类标题</td>
                <td>
                    <textarea name="title"></textarea>
                </td>
            </tr>
            <tr>
                <td>分类关键字</td>
                <td>
                    <textarea name="keywords"></textarea>
                </td>
            </tr>
            <tr>
                <td>分类描述</td>
                <td>
                    <textarea name="description"></textarea>
                </td>
            </tr>
            <tr>
                <td>分类排序</td>
                <td>
                    <input name="sort" type="text" />
                </td>
            </tr>
            <tr>
                <td>是否显示</td>
                <td>
                    <lable>
                        <input type="radio" name="display" value="1"/>
                        <span>显示</span>
                    </lable>
                    <lable>
                        <input type="radio" name="display" value="0"/>
                        <span>隐藏</span>
                    </lable>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" class='btn' /></td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
