//working on EDIT_user image to select image, get file size, image id and so on with AJAX and JQUERY
$(document).ready(function (){
    
    var user_href;
    var image_href;
    var user_href_splitted;
    var image_href_splitted;
    var user_id;
    var image_name;
    var photo_id;

 
//------------------click event-function when pushed modal_thumbnails------------------
$(".modal_thumbnails").click(function(){
 
//set_user_image is targeted button
$("#set_user_image").prop('disabled', false);
 
//gets ID of image
user_href = $("#user-id").prop('href'); //catches href    
user_href_splitted = user_href.split("=");    
user_id = user_href_splitted[user_href_splitted.length - 1];    
//alert(user_id);

//gets image filesize
image_src = $(this).prop("src");      //catches src (this is sudo variable)
image_href_splitted = image_src.split("/");
image_name   =  image_href_splitted[image_href_splitted.length -1];
    
photo_id = $(this).attr("data");
    
$.ajax({
    url: "includes/ajax_code.php",
    data: {photo_id:photo_id},
    type: "POST",
    success: function(data){
    
        if(!data.error){
            //data comming back
            //alert(data);
            $("#modal_sidebar").html(data);
            
            //location.reaload(true);
        }    
}
});   
    
//alert(image_name);
                           
});
//------------------click event-function when pushed modal_thumbnails------------------
    
    
    
    
    
//------------------new click event  on click set_user_image------------------   
$("#set_user_image").click(function(){
//alert(image_name);
    
//ajax function
$.ajax({
    url: "includes/ajax_code.php",
    data: {image_name: image_name, user_id: user_id},
    type: "POST",
    success: function(data){
    
        if(!data.error){
            //data comming back
            //alert(data);
            $(".user_image_box a img").prop('src', data);
            
            //location.reaload(true);
        }    
}
});       
});
//------------------new click event  on click set_user_image------------------ 
 

    
/*-----------edit_photo.php sidebar-----------*/
    
$(".info-box-header").click(function(){ //1 target class (class with.) info-box-header 2. use function click 3. execute function (alert etc)    
   
    $(".inside").slideToggle("fast");  //1 target class inside 2. use function slideToggle 3. parameter fast
    $("#toggle").toggleClass("glyphicon-menu-down glyphicon , glyphicon-menu-up glyphicon ");
    //1. ID targets with # 2. changes class from arrow up to down (togleClass brings out and sets new class)    
    
});    
    
/*-----------edit_photo.php sidebar-----------*/
    
    
/*-----------photos.php delete prevention script-----------*/
    
$(".delete_link").click(function(){
       return confirm("Do you realy want to delete this photo?");
    })
    
/*-----------photos.php delete prevention script-----------*/
    

tinymce.init({selector:'textarea'});

});


