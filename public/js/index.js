$(function() {
    var contactForm = $("#contact-form");

    /* Our Approach Slider */
    $(".approach-left").click(function(){
        var activeLi = $("li.active"),
            activeContent = $(".our-approach div.active");

        if (activeLi.prev().text() == ''){ // wrap around to the first li
            activeLi.removeClass('active').parent.children(':last-child').addClass('active');
            activeContent.removeClass('active').hide('slide', {direction: 'right'}, 500, function(){
                $(this).parent.children(':last-child').addClass('active').show('slide', {direction: 'left'}, 500);
            });
        } else {
            activeLi.removeClass('active').prev().addClass('active'); // change active li
            activeContent.removeClass('active').hide('slide', {direction: 'right'}, 500, function(){
                $(this).prev().addClass('active').show('slide', {direction: 'left'}, 500);
            });
        }

    });
    $(".approach-right").click(function(){
        var activeLi = $("li.active"),
            activeContent = $(".our-approach div.active");

        if (activeLi.next().text() == ''){ // wrap around to the first li
            activeLi.removeClass('active').parent.children(':first-child').addClass('active');
            activeContent.removeClass('active').hide('slide', {direction: 'left'}, 500, function(){
                $(this).parent().children(':first-child').addClass('active').show('slide', {direction: 'right'}, 500);
            });
        } else {
            activeLi.removeClass('active').next().addClass('active'); // change active li
            activeContent.removeClass('active').hide('slide', {direction: 'left'}, 500, function(){
                $(this).next().addClass('active').show('slide', {direction: 'right'}, 500);
            });
        }
    });

    /* Our Approach, direct selecting an option */
    $(".our-approach li").click(function(){
        var activeContent = $(".our-approach aside").find('.active'),
            newContent = $("." + $(this).attr('id'));

        if (!newContent.hasClass('active')){
            $(".our-approach").find('.active').removeClass('active');
            newContent.addClass('active');
            activeContent.removeClass('active').fadeOut(500, function(){
                newContent.fadeIn(500);
            });
            $(this).addClass('active');
        }
    });

    /* Testimonial slide */
    $(".testimonial-left").click(function(){
        var activeContent = $(".testimonials div.active");

        if (activeContent.prev().text() == ''){ // wrap around to the first li
            activeContent.removeClass('active').hide('slide', {direction: 'right'}, 500, function(){
                $(this).parent().children(':last-child').addClass('active').show('slide', {direction: 'left'}, 500);
            });
        } else {
            activeContent.removeClass('active').hide('slide', {direction: 'right'}, 500, function(){
                $(this).prev().addClass('active').show('slide', {direction: 'left'}, 500);
            });
        }

    });
    $(".testimonial-right").click(function(){
        var activeContent = $(".testimonials div.active");

        if (activeContent.next().text() == ''){ // wrap around to the first li
            activeContent.removeClass('active').hide('slide', {direction: 'left'}, 500, function(){
                $(this).parent().children(':first-child').addClass('active').show('slide', {direction: 'right'}, 500);
            });
        } else {
            activeContent.removeClass('active').hide('slide', {direction: 'left'}, 500, function(){
                $(this).next().addClass('active').show('slide', {direction: 'right'}, 500);
            });
        }
    });

    /* Anchor Links */
    $('a').click(function(){
        $('html, body').animate({
            scrollTop: $( $(this).attr('href') ).offset().top
        }, 500);
        return false;
    });

    contactForm.find('button').click(function(){ $("#errors").text(''); }); /* Not Ideal */
    /* Contact form validation */
    contactForm.validate({
        onfocusout: false,
        onkeyup: false,
        rules: {
            email: {
                required: true,
                email: true,
                maxlength: 200
            },
            name: "required",
            subject: "required",
            message: "required"
        },
        messages: {
            email: "Please enter a valid email address",
            name: "A name is required",
            subject: "Subject is required",
            message: "A message is required"
        },
        errorPlacement: function(error, element){
            error.appendTo($("#errors"));
        },
        submitHandler: function (form) {
            form.submit();
        }
    });
});
function clearStates() {
    var allContent = $(".out-approach aside");
    allContent.children().each(function(){

    });
}
