/**
 * 获取query参数
 * @returns {{}}
 */
function getUrlQuery() {
    if (!location.search) return {}
    var search = location.search.substr(1)
    var obj = {}
    var temps = search.split('&')
    for (var i = 0; i < temps.length; i++) {
        var temp = temps[i].split('=')
        obj[temp[0]] = window.decodeURIComponent(temp[1])
    }
    return obj
}

function queryToString(query) {
    if (!query) return ''
    var str = '?'
    for (var key in query) {
        str += key + '=' + window.encodeURIComponent(query[key])
    }
    if (str === '?') {
        return ''
    }

    return str
}
