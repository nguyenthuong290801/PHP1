// nav
$(document).ready(function () {
    // sticky navbar khi lăn chuột
    $(window).scroll(function () {
        if (this.scrollY > 20) {
            $('.navbar__pc').addClass("sticky");
        } else {
            $('.navbar__pc').removeClass("sticky");

        }
    });
    //
});
// 