var UINestable = function () {

    //var updateOutput = function (e) {
    //    var list = e.length ? e : $(e.target),
    //        output = list.data('output');
    //    if (window.JSON) {
    //        output.val(window.JSON.stringify(list.nestable('serialize'))); //, null, 2));
    //    } else {
    //        output.val('JSON browser support required for this demo.');
    //    }
    //};


    var removeDisabled = function(e){
        var list = e.length ? e : $(e.target);
        list.find("ol.dd-list li").each(function(key,item){
            if (typeof $(item).parents(".nl_item")[0] == "undefined")
            {
                $(item).children(".dd-remove").removeClass("disabled");
                var id = $(item).attr("data-data_id");
                var type = $(item).attr("data-type");
                $("#context-menu2 ul li[data-data_id='"+id+"'][data-type='"+type+"']").remove();

            }
        });
    }

    return {
        //master_page function to initiate the module
        init: function () {

            // activate Nestable for list 1
            $('#nestable_list_1').nestable({
                group: 1
            });
                //.on('change', updateOutput);

            // activate Nestable for list 2
            $('#nestable_list_2').nestable({
                group: 1
            });
                //.on('change', updateOutput);


            /*--------------*/
            $('#nl_header_top').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_header_top_left').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_header_top_right').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_header').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_header_left').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_header_center').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_header_right').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_header_bottom').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_content_top').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_content_left').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_navigation').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_content_main').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_content_right').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_content_bottom').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_footer_top').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_footer').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_footer_bottom').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_hidden_field_1').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_hidden_field_2').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_hidden_field_3').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_other_field_1').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_other_field_2').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_other_field_3').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_other_field_4').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_other_field_5').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);

            $('#nl_item_content').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_item_block').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);
            $('#nl_item_module').nestable({maxDepth:1,group: 1}).on('change',removeDisabled);

            $('#nl_block_attribute').nestable({group: 1}).on('change',removeDisabled);

            $('.nl_item').nestable({maxDepth:1,group: 1});
            /*--------------*/

            // output initial serialised data
            //updateOutput($('#nestable_list_1').data('output', $('#nestable_list_1_output')));
            //updateOutput($('#nestable_list_2').data('output', $('#nestable_list_2_output')));

            $('#nestable_list_menu').on('click', function (e) {
                var target = $(e.target),
                    action = target.data('action');
                if (action === 'expand-all') {
                    $('.dd').nestable('expandAll');
                }
                if (action === 'collapse-all') {
                    $('.dd').nestable('collapseAll');
                }
            });

            $('#nestable_list_3').nestable();

        }

    };

}();