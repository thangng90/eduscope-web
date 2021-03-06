/*==============   VARIABLES / FUNTIONS   ================*/
var is_touch_device = (('ontouchstart' in window) || (navigator.MaxTouchPoints > 0) || (navigator.msMaxTouchPoints > 0));
//Toggle Full Screen
function toggleFullScreen() {
    if ((document.fullScreenElement && document.fullScreenElement !== null) || (!document.mozFullScreen && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
            document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
}

// serializeObject
$.fn.serializeObject = function () {
    var o = {},
        a = this.serializeArray();
    $.each(a, function () {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};

// Confirm Dialog        
$("[data-confirm]").on('click', function(){
    if (!confirm($(this).data('confirm'))) return !1;
});

/*==============   UI.V1   ================*/

// vNotify
$.extend({
    vNotify: function (options, type) {
        var def = {
            type: 'success',
            duration: 0,
            dismissable: true,
            message: '',
            class: '',
            // container: '#alert-box'
        };
        if ($.type(options) === "string") options = {
            message: options
        };
        if (type) options.type = type;
        options = $.extend({}, def, options);

        // build container
        options.container = (options.container && $(options.container).length) ? $(options.container) : $('.alert-box.fixed').length ? $('.alert-box.fixed') : $('<div class="alert-box fixed" />').appendTo('body');

        // add notification
        var $al = $("<div />", {
            class: 'alert alert-' + options.type,
            text: options.message
        });
        options.class && $al.addClass(options.class);
        options.dismissable && $al.addClass('alert-dismissible').prepend('<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>');
        options.container.append(function () {
            if (options.duration)
                return $al.fadeIn().delay(options.duration).fadeOut(function () {
                    $(this).remove();
                })
            return $al;
        });
    }
});
/*

Cách dùng vNotify:

$.vNotify('Nội dung thông báo'); // kiểu mặc định là success - màu xanh lá

$.vNotify('Nội dung thông báo', 'info'); // tham số thứ 2, các kiểu alert:   info / success / danger / warning

$.vNotify({
    message: 'Nội dung là đây',
    type: 'danger',             // các kiểu alert:   info / success / danger / warning
    duration: 2000,             // thời gian hiển thị, alert box sẽ ẩn sau thời gian này
    dismissable: true,          // false: không cho phép tắt, ẩn nút close
    class: 'abc',         // custom class
    container: '#selector'      // thành phần chứa thông báo, nếu không có container, thông báo sẽ hiển thị góc phải bên dưới
});

// option mặc định:
        type: 'success',
        duration: 0,
        dismissable: true,
        message: '',
        class: '',
*/


// Preloader
$(window).load(function () {
    $('.loading-container').fadeOut(100, function () {
        $(this).remove();
    });
});

$(function () {

    $('body').addClass(is_touch_device ? 'touch' : 'no-touch');

    /*$('.dropdown-menu').click(function(event){
	  event.stopPropagation();
	}); tam thoi bo qua */

    $(document).on('click', '.navbar-toggle', function () { // Toggle Aside menu
        $('aside.left-panel').toggleClass('collapsed');
    })

    .on('click', '.description a.edit', function (e) { // Edit description
        $('.description-content').prop('contenteditable', !0).focus()
            .on('focusout', function () { // change
                $(this).prop('contenteditable', !1);
                alert('làm gì đó với:\n\n' + $(this).text().trim());
                // $.ajax( dosomething );
            });
        return !1;
    }).

    on('click', '#photo .fullscreen-toggle', function () {
        $('#photo').toggleClass('overlay');
        toggleFullScreen();
    });


    // Multi level  
    $("aside.left-panel nav.navigation > ul > li:has(ul) > a").click(function () {
        if ($("aside.left-panel").hasClass('collapsed') == false || $(window).width() < 768) {
            $("aside.left-panel nav.navigation > ul > li > ul").slideUp(300);
            $("aside.left-panel nav.navigation > ul > li").removeClass('active');
            if (!$(this).next().is(":visible")) {
                $(this).next().slideToggle(300, function () {
                    $("aside.left-panel:not(.collapsed)").getNiceScroll().resize();
                });
                $(this).closest('li').addClass('active');
            }
            return false;
        }
    });

    /*============== MODULES ================*/

    //Popover
    if ($.isFunction($.fn.popover)) {
        $('.popover-btn').popover();
    }
    //Tooltip
    if ($.isFunction($.fn.tooltip)) {
        $('.tooltip-btn').tooltip()
    }
    //NanoScroll - fancy scroll bar
    if ($.isFunction($.fn.niceScroll)) {
        $(".nicescroll").niceScroll({
            cursorcolor: '#9d9ea5',
            cursorborderradius: '0px'
        });
    }
    if ($.isFunction($.fn.niceScroll)) {
        $("aside.left-panel:not(.collapsed)").niceScroll({
            cursorcolor: '#8e909a',
            cursorborder: '0px solid #fff',
            cursoropacitymax: '0.5',
            cursorborderradius: '0px'
        });
    }
    // 	Chosen Select
    if ($.isFunction($.fn.chosen)) {
        var $def = {
            width: '100%',
            no_results_text: 'không tìm thấy lựa chọn nào với '
        };
        $('.chosen-select').chosen($def);
        $('.chosen-select-deselect').chosen($.extend({
            allow_single_deselect: true
        }, $def));
        $('.chosen-select-nosearch').chosen($.extend({
            disable_search: true
        }, $def));
    }
    // Scroll 2 Top
    $('.scrollToTop').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 800);
        return false;
    });

    /*============== UI CUSTOM   ================*/
    // Signin / Signup Modalbox
    !is_touch_device && $(".open-modal").click(function () {
        if ($(this).data('target')) {
            $($(this).data('target')).modal('show');
            return !1;
        }
    });

    // Get list of Schools by provId
    $(".prov-select").change(function () {
        var schoolE = $(this).closest("form").find(".school-select");
        $.ajax({
            type: "POST",
            dataType: "json",
            //url: "data/schools.json",
            url: "php/getSchoolController.php",
            data: "provinceId="+$(this).val(),
            success: function (list) {
                console.log(list);
                if (!list.success) {
                    console.log("Error");
                    return !1;
                }
                schoolE.empty();
                $.each(list.data, function (i, s) {
                    $("<option/>", {
                        "value": s.id,
                        "text": s.name
                    }).appendTo(schoolE);
                    schoolE.trigger('chosen:updated');
                });
            },
            error: function () {
                schoolE.empty();
                console.log("Error");
                schoolE.trigger('chosen:updated');
            }
        });
    });
    
    // Star rating
    $("#rating-input").change(function () {
        alert("đánh giá " + $(this).prop('disabled', true).val() + "*")
        // $.ajax raning;
        $(this).prop("disabled", true).closest(".photo-rating").addClass("disabled"); // disable
    });


});

$("#loginForm").submit(function() {
    var inputs = $("form#loginForm :input");
    var email = "";
    var password = "";
    inputs.each(function() {
        if($(this).attr('type') == "email")
            email = $(this).val();
        if($(this).attr('type') == "password")
            password = CryptoJS.SHA1($(this).val());
            //password = $(this).val();
        //console.log("pasword: " + password);
    });
    
    $.ajax({
        type: "POST",
        url: "php/loginController.php",
        data: "email="+email+"&password="+password,
        success: function(answer) {
            //alert(answer);
            //console.log(answer);
            window.location.href = '?action=home';
        },
        statusCode: {
            404: function() {
                console.log("page not found");
            }
        }
    });
    
    return true;
});

$("#registerForm").submit(function() {
    var inputs = $("form#registerForm :input");
    var schoolE = $(this).closest("form").find(".school-select");
    var provinceE = $(this).closest("form").find(".prov-select");
    
    var fullname = "";
    var username = "";
    var email = "";
    var schoolId;
    var provinceId;
    var password = "";
    var confirmPassword = "";
    
    inputs.each(function() {
        if($(this).attr('class') == "form-control username") {
            username = $(this).val();
            console.log("username: " + username);
        }
        if($(this).attr('class') == "form-control fullname") {
            fullname = $(this).val();
            console.log("fullname: " + fullname);
        }
        if($(this).attr('class') == "form-control password") {
            password = $(this).val();
            console.log("password: " + password);
        }
        if($(this).attr('class') == "form-control confirm-password") {
            confirmPassword = $(this).val();
            console.log("confirm password: " + confirmPassword);
        }
        if($(this).attr('type') == "email") {
            email = $(this).val();
            console.log("email: " + email);
        } 
    });
    
    schoolId = schoolE.find(":selected").val();
    provinceId = provinceE.find(":selected").val();
    console.log("schoolId: " + schoolId);
    console.log("provinceId: " + provinceId);
    
    if(password != confirmPassword) {
        console.log("confirm password does not match");
        return false;
    } else {
        // display loading
        $(".reg-loading").html("<i class='fa fa-spinner fa-spin fa-2x'></i>");
        $.ajax({
            type: "POST",
            url: "php/registerController.php",
            data: "fullname="+fullname+"&username="+username+"&email="+email+"&schoolId="+schoolId+"&password="+password,
            success: function(answer) {
                $(".reg-loading").empty();
                $("#registerModal").modal('hide');
                $("#regNotificationModal").modal('show');
                var resultText = "";
                console.log("answer: " + answer);
                switch(parseInt(answer)) {
                    case 0:
                        resultText = "Cảm ơn bạn đã đăng kí tài khoản tại EduScope Network.<br/><br/>Một email đã được gửi đến địa chỉ <span style='color:blue;'><i>" + email + "</i></span>, vui lòng kiểm tra hộp thư đến và làm theo hướng dẫn để hoàn tất việc đăng kí.";
                        console.log("case 0");
                        break;
                    default:
                        resultText = "Đã có lỗi xảy ra trong quá trình đăng kí. Vui lòng đăng kí lại.";
                        break;
                }
                
                $("#informText").html(resultText);
            },
            error: function() {
                
            }
        })
    }
});

$("#activationForm").submit(function() {
    window.location.href = '?action=home';
});

function showActivationModal() {
    $("#activationModal").modal('show');
}

function closeModal() {
    $("#regNotificationModal").modal('hide');
}