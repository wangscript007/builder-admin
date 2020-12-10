layui.use(['layer', 'form'], function(){
    var layer = layui.layer
        ,form = layui.form;

    // layer.msg('Hello World');

    form.on('submit', function (data) {
        var load = layer.load(data.form)

        setTimeout(function () {
            console.log('submit', data)
            layer.close(load)
        }, 2000)
        return false;
    });

});
