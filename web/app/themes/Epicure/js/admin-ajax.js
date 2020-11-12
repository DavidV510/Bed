var $=jQuery
 

$('.wrap > h2:first-child, .wrap [class$="icon32"] + h2, .postbox .inside h2, .wrap h1').css('width','50vw')
$('#username').css('width','10rem');
$('#name').css('width','8rem');
$('#email').css('width','12rem');
$('#phone').css('width','12rem');
function remove(id){
    $.ajax({
        type:'POST',
        data:{
            'action':'removeOrder',
            'id':id,
            'type':'delete'
        },
        url:admin_ajax.ajaxurl,
        success:function(data){
            var result=JSON.parse(data)
            if(result.response=='success'){ 
                $(`#${id}`).remove();                 
            }
        }
    })
}

function remove_user_order(id){
    $.ajax({
        type:'POST',
        data:{
            'action':'RemoveUserOrder',
            'id':id,
            'type':'delete'
        },
        url:admin_ajax.ajaxurl,
        success:function(data){
            var result=JSON.parse(data)
            if(result.response=='success'){ 
                $(`#${id}user`).remove();                 
            }
        }
    })
}