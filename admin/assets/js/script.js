$(document).ready(function(){
$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
    $("[data-toggle=tooltip]").tooltip();
    
    
    //sidebar
      
            $(".sm-side ul.wrapper>li>a").click(function () {
                var heightchild = $(this).parent().children("ul").innerHeight();
                $(this).parent().addClass("open");

                if (($(this).parent().children().length) > 1) {
                    if ($(this).parent().children("ul").css("display") == "none") {
                        $(this).children("span.down-up").css({
                            "transform": "rotate(90deg)"
                        });
                        $(this).parent().nextAll("li").children("a").children("span").css({
                            "transform": "rotate(0deg)"
                        });
                        $(this).parent().prevAll("li").children("a").children("span").css({
                            "transform": "rotate(0deg)"
                        });
                        $(this).parent().animate({
                            top: '0px'
                        }, 500);
                        $(this).parent().prevAll("li").animate({
                            top: '0px'
                        }, 500);
                        $(this).parent().prevAll("li").children("ul").slideUp(500);
                        $(this).parent().nextAll("li").children("ul").slideUp(500);
                        $(this).parent().children("ul").slideDown(500);
                        $(this).parent().nextAll("li").animate({
                            top: heightchild
                        }, 500);
                    } else {

                        $(this).parent().children("ul").slideUp(500);

                        $(this).parent().nextAll("li").animate({
                            top: '0px'
                        }, 500);
                        $(this).children("span").css({
                            "transform": "rotate(0deg)"
                        });
                    }
                    $(this).parent().siblings("li").removeClass("open");
                } else {

                    $(this).parent().animate({
                        top: '0px'
                    }, 500);
                    $(this).parent().prevAll("li").animate({
                        top: '0px'
                    }, 500);
                    $(this).parent().prevAll("li").children("ul").slideUp(500);
                    $(this).parent().nextAll("li").children("ul").slideUp(500);
                    $(this).parent().nextAll("li").animate({
                        top: '0px'
                    }, 500);
                    $(this).parent().siblings("li").removeClass("open");
                }
            });


       
});

