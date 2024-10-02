$(".openMenu,.closeMenu,.over").on("click", function() {
    $(".menuRight ul ul").slideUp(300), 
    $(".menuRight .sub > i").removeClass("rotate"), 
    $(".menuRightMain,.over,#wrapper,body").toggleClass("open transition")
}), 

$(".menuRight>ul>li.sub>i").on("click", function(s) {
    s.preventDefault(), 
    $cssmnu = $(this).next("ul").css("display"), 
    "none" == $cssmnu ? ($(this).next("ul").stop().slideDown(300), 
    $(this).addClass("rotate")) : ($(this).next("ul").stop().slideUp(300), 
    $(this).removeClass("rotate"))
});

$(".menuRight ul li ul li.sub i").on("click", function(s) {
    $ktul = $(this).next("ul").css("display");
    $(".menuRight ul li ul li ul").hide();
    $(".menuRight ul li ul li.sub i").removeClass("rotate");
    if($ktul=='none'){
        $(this).next("ul").stop().slideDown(300);
        $(this).addClass("rotate");
    }else{
        $(this).next("ul").stop().slideUp(300);
        $(this).removeClass("rotate");
    }
});

$('#hamburger').click(function(){
    $kts=$('.menuRightMain').hasClass('open');
    if($kts==true){
        $(this).addClass('xmenu');
    }
});
$('#hamburger').click(function(){
    $kts=$('.menuRightMain').css('left');
    if($kts=='-280px'){
        $(this).addClass('xmenu');
    }
});
$('.over').click(function(){
    $kts=$('.menuRightMain').css('left');
    if($kts=='0px'){
        $('#hamburger').removeClass('xmenu');
    }
});