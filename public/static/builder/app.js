layui.use(['layer', 'form', 'table', 'tree'], function(){
    var layer = layui.layer
        ,form = layui.form
        ,tree = layui.tree
        ,table = layui.table;

    // 表单提交
    form.on('submit', function (data) {
        var load = layer.load(data.form)
        var text = $(data.elem).html()
        var reset = function () {
            $(data.elem).attr('disabled', false)
                .removeClass('layui-btn-disabled')
                .html(text)
        }
        $(data.elem).attr('disabled', true)
            .addClass('layui-btn-disabled')
            .html('提交中')

        $.ajax({
            url: '?component_id=' + data.form.id,
            method: 'POST',
            data: data.field,
            complete: function () {
                layer.close(load)
            },
            success: function (res) {
                if (res.code !== 0) {
                    layer.msg(res.msg);
                } else {
                    layer.msg('提交成功');
                }

                // 如果返回url，则2s后跳转
                if (res.url !== undefined) {
                    setTimeout(function () {
                        location.href = res.url;
                    }, 1500);
                } else {
                    reset();
                }
            },
            error: function () {
                reset();
            }
        });
        return false;
    });

    // 树
    $('[data-tree]').each(function (index, el) {
        var settings = $(el).data('tree')
        tree.render({
            elem: '#' + el.id,
            showCheckbox: settings.showCheckbox,
            edit: settings.edit,
            data: settings.data,
        });
    });

    $('table').each(function (index, el) {
        table.init($(el).attr('lay-filter'));
    });
});
