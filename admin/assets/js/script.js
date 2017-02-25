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



$(function(){
    $('.button-checkbox').each(function(){
        var $widget = $(this),
            $button = $widget.find('button'),
            $checkbox = $widget.find('input:checkbox'),
            color = $button.data('color'),
            settings = {
                on: {
                    icon: 'glyphicon glyphicon-check'
                },
                off: {
                    icon: 'glyphicon glyphicon-unchecked'
                }
            };

        $button.on('click', function () {
            $checkbox.prop('checked', !$checkbox.is(':checked'));
            $checkbox.triggerHandler('change');
            updateDisplay();
        });

        $checkbox.on('change', function () {
            updateDisplay();
        });

        function updateDisplay() {
            var isChecked = $checkbox.is(':checked');
            // Set the button's state
            $button.data('state', (isChecked) ? "on" : "off");

            // Set the button's icon
            $button.find('.state-icon')
                .removeClass()
                .addClass('state-icon ' + settings[$button.data('state')].icon);

            // Update the button's color
            if (isChecked) {
                $button
                    .removeClass('btn-default')
                    .addClass('btn-' + color + ' active');
            }
            else
            {
                $button
                    .removeClass('btn-' + color + ' active')
                    .addClass('btn-default');
            }
        }
        function init() {
            updateDisplay();
            // Inject the icon if applicable
            if ($button.find('.state-icon').length == 0) {
                $button.prepend('<i class="state-icon ' + settings[$button.data('state')].icon + '"></i> ');
            }
        }
        init();
    });
});