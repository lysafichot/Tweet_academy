$(window).scroll(function(){

    if($(window).scrollTop() == $(document).height() - $(window).height()){
        $.ajax({
            url : "../controller/loadScroll.php?lastid=" + $(".tweetos:last").attr("id"),
            success : function(html) {
                // alert($(".tweetos:last").attr("id"));
                if(html){
                    $(".main").append(html);
                }
            }
        })
    }
});