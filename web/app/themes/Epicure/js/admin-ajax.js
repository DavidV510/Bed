var $=jQuery

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