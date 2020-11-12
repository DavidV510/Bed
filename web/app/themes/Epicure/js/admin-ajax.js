var $=jQuery
 
//  if($('.striped > tbody > :nth-child(odd), ul.striped > :nth-child(odd), .alternate')){
//     $('.striped > tbody > :nth-child(odd), ul.striped > :nth-child(odd), tr td').css('border-top','2px solid black');
//  }
//  $('.wisper').parent().css('display','none')
// $('.users .column-phone').css('width','4vw');
// $('.users .column-email').css('width','13vw')
// $('.users .column-role').css('width','4vw');
// if($('[data-colname="Item List"]')){
//     var itemElements=$('[data-colname="Item List"]');
//     var wisper=$('.wisper')
//     for(var i=0;i<itemElements.length;i++){
//         itemElements[i].innerHTML=wisper[i].innerHTML
//     }
//      $('[data-colname="Item List"]').append($('.wisper ').html())
//     $('[data-colname="Item List"]').css('position','relative')
// }$('#username').css('width','10rem');


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
