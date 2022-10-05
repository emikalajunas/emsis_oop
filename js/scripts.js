//------------------------jQuery START------------------------------------
 $(document ).ready(function() {              
        
//------------------Fragment modal search function START------------------
$(".modal_search").each(function() {
    var textModal = $('#textModal_' + this.id),
        html = textModal.html();
    $(this).on("keyup", function() {
        var reg = new RegExp($(this).val() || "&fakeEntity;", 'gi');
        textModal.html(html.replace(reg, function(str, index) {
            var t = html.slice(0, index+1),
                lastLt = t.lastIndexOf("<"),
                lastGt = t.lastIndexOf(">"),
                lastAmp = t.lastIndexOf("&"),
                lastSemi = t.lastIndexOf(";");
            //console.log(index, t, lastLt, lastGt, lastAmp, lastSemi);
            if(lastLt > lastGt) return str; // inside a tag
            if(lastAmp > lastSemi) return str; // inside an entity
            return "<span class='highlight'>" + str + "</span>";
        }));
    });
});
//-------------------Fragment modal search function END------------------- 
        
        
//-----------------------Add/Edit drop down sidebar START-----------------------
//1 step HIDDES class when page is loaded   
$(".form-control-notesbox ").hide();
        
//2 step DROPSDOWN class when clicked
$(".dropdown-call").click(function(){ 
    //alert('works');
    $(".form-control-notesbox").slideToggle("fast");
    $("#toggle").toggleClass("arrow-down, arrow-up");
//    $("#toggle").toggleClass("arrow-up, arrow-down");
});     
//-----------------------Add/Edit drop down sidebar END-----------------------  
       

});
//------------------------jQuery END------------------------------------

