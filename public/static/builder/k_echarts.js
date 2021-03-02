"use strict";

layui.define(function (exports) {
  var initEcharts = function initEcharts(elem, options) {
    var chart = echarts.init(elem);
    chart.setOption(options);
  };

  if (componentOptions.echarts) {
    for (var componentId in componentOptions.echarts) {
      var el = document.getElementById(componentId);
      initEcharts(el, componentOptions.echarts[componentId]);
    }
  }

  exports('k_echarts');
});
//# sourceMappingURL=maps/k_echarts.js.map
