layui.use(['layer', 'form', 'table'], function(){
    var layer = layui.layer
        ,form = layui.form
        ,table = layui.table;

    // layer.msg('Hello World');

    form.on('submit', function (data) {
        var load = layer.load(data.form)

        setTimeout(function () {
            console.log('submit', data)
            layer.close(load)
        }, 2000)
        return false;
    });

    $('table').each(function (index, el) {
        table.init($(el).attr('lay-filter'));
    });
});
