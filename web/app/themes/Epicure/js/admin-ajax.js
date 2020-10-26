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