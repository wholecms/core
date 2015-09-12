$(function(){
    $("body").on('change','.checkbox-page-scaffold',function(){
        var elements = ['header_top','header_top_left','header_top_right','header ','header_left','header_right','header_bottom ','content_top','content_left','content_main','content_right ','content_bottom','footer_top','footer ','footer_bottom'];
        var element_name = $(this).attr("value");
        var select_element = $(".page-scaffold ." +element_name);
        if (this.checked)
        {
            if (element_name=="content_left" || element_name=="content_right")
            {
                var col_size = "col-md-8";
                if ($('.page-scaffold .content_main').hasClass('col-md-8')){col_size = "col-md-10 col-xs-10";}
                if ($('.page-scaffold .content_main').hasClass('col-md-10')){col_size = "col-md-12 col-xs-12";}
                $('.page-scaffold .content_main').attr('class','content_main dd').addClass(col_size);
            }
            select_element.hide();

        }
        else
        {
            if (element_name=="content_left" || element_name=="content_right")
            {
                var col_size = "col-md-8";
                if ($('.page-scaffold .content_main').hasClass('col-md-10')){col_size = "col-md-8 col-xs-8";}
                if ($('.page-scaffold .content_main').hasClass('col-md-12')){col_size = "col-md-10 col-xs-10";}
                $('.page-scaffold .content_main').attr('class','content_main dd').addClass(col_size);
            }
            select_element.show();
        }
    });



    $(".content_right_container").css({"top":($(".page-container").offset().top+1)+"px"});
    $('.content_right_container .row .scroll').slimScroll({
        height:($(window).height()+1)-$(".page-container").offset().top,
        width:'100%'
    });

    $(window).resize(function(){
        $(".content_right_container").css({"top":($(".page-container").offset().top+1)+"px"});
        var h = ($(window).height()+1)-$(".page-container").offset().top;
        $('.content_right_container .row .scroll').slimScroll({
            height:h,
            width:'100%'
        });
    });


    $(".page-scaffold span a").click(function(e){
        e.stopPropagation();
        $(this).contextmenu('show',e);
        $("#context-menu2").attr("data-field",$(this).attr("href"));
        return false;
    }).contextmenu({target: '#context-menu2'});

    $("body").on("click",".list_check",function(){
        var parent_li = $(this).parents("ul li ul li");
        var field = $(this).parents("div").attr("data-field");
        var type = parent_li.attr("data-type");
        var id = parent_li.attr("data-data_id");
        var clone = $("ol li[data-data_id='"+id+"'][data-type='"+type+"']");
        clone.find(".dd-remove").removeClass("disabled");
        if($(".page-scaffold #"+field+" ol").size()==0){
            $(".page-scaffold #"+field+" .dd-empty").remove();
            $(".page-scaffold #"+field).append("<ol class=\"dd-list\"></ol>");
        }
        $(".page-scaffold #"+field+" ol").append(clone.clone());
        clone.remove();
        parent_li.remove();
        //alert(field);
        return false;
    });

    $(".right_container_responsive a").click(function(){
        if ($(this).attr("id")=="open")
        {
            $(this).parents(".page-scaffold-main").attr("class","page-scaffold-main  col-xs-9 col-md-9");
            $(".content_right_container").show();
            $(this).attr("id","close");
        }else
        {
            $(this).parents(".page-scaffold-main").attr("class","page-scaffold-main  col-xs-12 col-md-12");
            $(".content_right_container").hide();
            $(this).attr("id","open");
        }
        return false;
    });



});
//
//var updateOutput = function (e) {
//    var list = e.length ? e : $(e.target),
//        output = list.data('output');
//    return window.JSON.stringify(list.nestable('serialize'));
//    //if (window.JSON) {
//    //    console.log(window.JSON.stringify(list.nestable('serialize')));
//    //    output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
//    //} else {
//    //    output.val('JSON browser support required for this demo.');
//    //    console.log('JSON browser support required for this demo.');
//    //}
//};