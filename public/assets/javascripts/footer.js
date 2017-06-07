
$(function() {
    var page = $('.page').attr('id');
    $("ul.menu-items li."+page).addClass("active");
    $(".icon-thumbnail."+page).addClass("bg-complete");
});