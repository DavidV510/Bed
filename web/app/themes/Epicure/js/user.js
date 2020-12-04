var $=jQuery

// Signing Up
if(document.querySelector('#signup')){
    document.querySelector('#signup').addEventListener('submit',function(e){
        e.preventDefault()
        var user={
            name:$( "input[name*='nameUser']" ).val(),
            email:$( "input[name*='emailUser']" ).val(),
            phone:$( "input[name*='phoneUser']" ).val(),
            password:$("input[name*='passUser']" ).val(),
            repeatPassword:$("input[name*='rep_pass']").val()
        }
        if(user.password!==user.repeatPassword){
            $('.complete').text('Please Mach The Passwords!').css('color','red')    
        }
    
        if(user.name==='' || user.email==='' || user.phone === '' || user.password==='' || user.repeatPassword===''){
            $('.complete').text('Please Complete The Missing!').css('color','red')    
        }
    
        else{
            $.ajax({
                type:'POST',
                data:{
                    'action':'createUser',
                    'nameUser':user.name,
                    'emailUser':user.email,
                    'phoneUser':user.phone,
                    'passwordUser':user.password
                },
                url:admin_ajax.ajaxurl,
                success:function(response){
                    var rep=JSON.parse(response.replace('0',''))
                    console.log(rep)
                    if(rep.res==='existes'){
                        //window.location=admin_ajax.siteurl
                        $('.complete').text('This user exists!').css('color','red')
                        console.log('Existes'); 
                    }
                    if(rep.res==='added'){
                        window.location=admin_ajax.siteurl
                        console.log('adae')
                    }
                },
                error:function(response){
                    console.log(response)
                }
            })
        }
    })
}


if(document.querySelector('#Login')){
    document.querySelector('#Login').addEventListener('submit',function(e){
        e.preventDefault()
        var user={
            email:$("input[name*='emailLogUser']" ).val(),
            password:$("input[name*='passLogUser']" ).val(),
        }
        $.ajax({
          type:'POST',
          data:{
            'action':'loginEpicure',
            'emailLogUser':user.email,
            'passLogUser':user.password
          },
          url:admin_ajax.ajaxurl,
          success:function(response){
            var rep=JSON.parse(response.replace('0',''))
            if(rep.res==='loged'){
                window.location=admin_ajax.siteurl
                window.localStorage.clear();
            }
            if(rep.res==='Not'){
                $('.loged').text('Wrong Password').css('color','red')
                console.log('Existes'); 
            }
            if(rep.res==="N_User"){
                $('.loged').text('No User').css('color','red')
            }
          }        
        })
    })
}


function logout(){
    console.log("Log OuTS")
    $.ajax({
        type:'POST',
        data:{
            'action':'Logout'
        },
        url:admin_ajax.ajaxurl,
        success:function(response){
            window.location='http://3.15.175.12/'
        }
    })
}



// Adding Dish to DB and page-Cart.php -> Working with the current session//


var items_User_Json;
var totalUser=0
function Add_To_Bag_User(id ,numID){
    var title=$(`#${id} .innerModal .modal-dish-title .title span`).text();
    var img=$(`#${id} .innerModal .modal-dialog .modal-dish-img img`).attr('src');
    if(side==='')
    {
        side='No Sides'
    }

    if(change===''){
    
        change='No Changes'
    }
    var quantity=Number(document.querySelector(`#num${numID}`).innerHTML);
    var total=quantity*Number($(`#${id} .modal-dish-content .modal-dish-price span span`).text());

    var ItemObject={
        id:id,
        title:title,
        img:img,
        side:side,
        change:change,
        quantity:quantity,
        total:total
    }
    
    $.ajax({
        type:'POST',
        data:{
            'action':'addToBagUser',
            'item_user':JSON.stringify(ItemObject)
        },
        url:admin_ajax.ajaxurl,
        success:function(response){
            var rep=$.trim(response)
          window.location='http://3.15.175.12/cart/'
        }
    })
}


// Remove Item from Cart -> User's Item's

function removeDish_User(id){
    $.ajax({
        type:'POST',
        data:{
            'action':'RemoveUserDish',
            'id':id,
            'type':'delete'
        },
        url:admin_ajax.ajaxurl,
        success:function(response){
            window.location='http://3.15.175.12/cart/'
        }
    })
}

// Ordering For Users

if(document.querySelector('#form3')){
    
    document.querySelector("#form3").addEventListener('submit',function(e){
        e.preventDefault()
           var theOrder={
            name:$( "input[name*='name']" ).val(),
            email:$( "input[name*='email']" ).val(),
            phone:$( "input[name*='phone']" ).val(),
            total:Number($('.form-Price-user').text()),
        }
        
            $.ajax({
                        type:'POST',
                        data:{
                            'action':'sendItemToAdmin_User',
                            'name':theOrder.name,
                            'email':theOrder.email,
                            'phone':theOrder.phone,
                            'totalPrice':theOrder.total
                        },
                        url:admin_ajax.ajaxurl,
                        success:function(response){
                            console.log('Successfully Sended DATA')
                            window.location='http://3.15.175.12/thanks-for-ordering/'
                        },
                        error:function(response){
                            console.log(response)
                        }
                    })
      })
}