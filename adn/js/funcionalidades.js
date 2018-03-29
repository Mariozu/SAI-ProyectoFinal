$(window).load(function() {
    $(".fake").change(function(){
        if($(this).attr("name")=="proceso"){
            $("#face").load(encodeURI("fasesss.php?value="+$(this).val()));
        }
    });
});
