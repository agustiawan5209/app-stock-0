$(function () {
    $(document).scroll(function(){
        var navbar = $('.navbar-scroll');
        navbar.toggleClass('bg-info', $(this).scrollTop() > navbar.height());
    })
 })
