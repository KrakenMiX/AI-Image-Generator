$(document).ready(function () {
    $('.dropdown-toggle').click(function(e) {
        if ($('.dropdown-toggle').hasClass('toggle-change')) {
            $('.dropdown-toggle').removeClass('toggle-change')
            $('.dropdown-menu').removeClass('show')
        } else {
            $('.dropdown-toggle').addClass('toggle-change')
            $('.dropdown-menu').addClass('show')
        }
    })
})