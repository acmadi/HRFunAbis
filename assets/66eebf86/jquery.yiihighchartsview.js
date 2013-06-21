/**
 * Created by JetBrains PhpStorm.
 * User: GUFENG
 * Date: 11-12-21
 * Time: 下午2:30
 * To change this template use File | Settings | File Templates.
 */

;(function($){

    $.fn.highchartsview = function(){
        return this.each(function(){
            var $this = $(this);
            var id = $this.attr('id');
        });
    };

    $.fn.highchartsview.update = function(id, url){
        $.ajax({
            url:url + '&json=1',
            success:function(dataProvider){
                var len = $.chart.series.length;
                var datas = $.parseJSON(dataProvider);
                for(var i=0; i<len; i++){
                    var data = new Array();
                    var dataName = $.chart.series[i]['name'];
                    //$.chart.series[i].setData([],true);
                    for(var j=0; j<datas.length; j++){
                        data[j] = Number(datas[j][dataName]);
                    }
                    $.chart.series[i].setData(data,true);
                }
            }
        })
    };
    
})(jQuery);