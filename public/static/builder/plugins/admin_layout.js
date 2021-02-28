layui.define(['layer', 'element'], function(exports){
    var layer = layui.layer
        ,element = layui.element;

    // 是否首页URL
    var isHomeUrl = function (url) {
        return url === undefined || url === '' || url === null || url === '/'
    }

    // 选项卡过滤名
    var tabFilter = 'admin-layout-tabs'

    // 当前焦点选项卡索引
    var tabIdx = -1

    // 已经打开的选项卡
    var tabs = [];

    var menu = $('#admin-layout-menu')

    // 让第一个tab不可关闭
    $('#admin-layout-tabs li:first .layui-tab-close').hide()

    // 监听选项卡切换
    element.on('tab(' + tabFilter + ')', function (data) {
        var idx = data.index - 1
        if (idx === -1) {
            tabIdx = -1
            $('.ke-tab-item.itemed').removeClass('itemed')
            $('.ke-tab-item:first').addClass('itemed')

            var query = getUrlQuery()
            if (query.title) {
                delete query.title
            }
            history.pushState(null, null, location.pathname + queryToString(query))
            setCurrentMenu('/')
            return
        }
        if (tabs[idx] && tabIdx != idx) {
            tabIdx = idx
            tabs[idx].switch()
        }
    })

    // 监听选项卡删除
    element.on('tabDelete(' + tabFilter + ')', function (data) {
        var idx = data.index - 1
        if (idx === -1) {
            return
        }
        tabs[idx].close()
        tabs.splice(idx, 1)
    })

    // 创建tab
    var createTab = function (url, title) {
        var isHome = isHomeUrl(url)

        var iframe = $('.ke-tab-item:last').removeClass('itemed').clone()
        iframe.find('iframe').attr('src', url).attr('id', url)
        iframe.addClass('itemed')

        $('.ke-tab-content').append(iframe)

        var tab = {
            url: url,
            title: title,
            iframe: iframe,
            switch: function() {
                element.tabChange(tabFilter, url)
                $('.ke-tab-item').removeClass('itemed')
                iframe.addClass('itemed')
                var query = queryToString({ title: title })

                if (isHome) {
                    history.pushState(null, null, location.pathname + location.search)
                } else {
                    history.pushState(null, null, location.pathname + query + '#' + url)
                }
                setCurrentMenu(url)
            },
            close: function () {
                element.tabDelete(tabFilter, url)
                iframe.remove()
            }
        }

        tabs.push(tab)

        element.tabAdd(tabFilter, {
            title: title,
            id: url
        })
        element.tabChange(tabFilter, url)

        return tab
    }

    // 获取url对应的tab
    // 不存在返回-1, -2是首页
    var getMatchTab = function (url) {
        if (isHomeUrl(url)) {
            return -2
        }
        for (var i = 0; i < tabs.length; i++) {
            if (tabs[i].url === url) {
                return tabs[i]
            }
        }
        return -1
    }

    // 展开父级
    var setItemedMenu = function (that) {
        that.parents('.layui-nav-item').addClass('layui-nav-itemed')
    }

    // iframe加载
    var setIframeUrl = function (url, title) {
        // 获取标题
        if (title === '' || title === undefined || title === null) {
            title = menu.find('[href="' + url + '"]').text()
        }
        var query = getUrlQuery()
        if (title === '' || title === undefined || title === null) {
            title = query.title
        }
        query.title = title

        var tab = getMatchTab(url)
        if (tab !== -1 && tab !== -2) {
            tab.switch()
        } else if(tab !== -2) {
            tab = createTab(url, title)
        } else {
            // 首页
            element.tabChange(tabFilter, '/')
        }
        var queryString = queryToString(query)

        if (url === undefined || url === '' || url === null || url === '/') {
            history.pushState(null, null, location.pathname + queryString)
        } else {
            history.pushState(null, null, location.pathname + queryString + '#' + url)
        }
    }

    // 加载当前焦点菜单
    var loadCurrentMenu = function () {
        var hash = location.hash
        if (hash) {
            hash = hash.substr(1)

            var that = menu.find('[href="' + hash + '"]')
            setItemedMenu(that)
            setIframeUrl(hash)
        }
    }

    // 设置url为焦点菜单
    var setCurrentMenu = function (url) {
        menu.find('[target="admin-container"]').parent().removeClass('layui-this')
        menu.find('[href="' + url + '"]').parent().addClass('layui-this')
    }

    // 后台布局头部
    $('[lay-filter="top-header-right"] a').on('click', function () {
        var url = $(this).attr('href')
        var title = $(this).text()
        $(this).parent().removeClass('layui-this')
        setIframeUrl(url, title)
        console.log('nav', url, title)
        return false
    })

    // 侧栏点击
    menu.on('click', '[target="admin-container"]', function () {
        var url = $(this).attr('href')

        setIframeUrl(url)
        return false
    })
    //
    // $(document).on('[pjax]', '#admin-container')

    // $(document).on('ready pjax:end', function(event) {
    //     console.log('form render')
    //     form.render()
    // })

    loadCurrentMenu()

    exports('admin_layout')
});
