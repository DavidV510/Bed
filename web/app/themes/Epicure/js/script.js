var $=jQuery
$(document).ready(function(){
    $('.headContainer .mobile .showMenu .icons .searchIcon').on('click',function(){
        $('.headContainer .mobile .searchMobile').toggle('slow')
    })

    // Opening the Hidden Menu
    $('.headContainer .mobile .showMenu .toggle').on('click',function(){
        $('.headContainer .mobile .hiddenMenu').toggle('')
    })
    $('.headContainer .mobile .showMenu .toggle::after').on('click',function(){
        $('.headContainer .mobile .hiddenMenu').toggle('')
    })
    $('.headContainer .mobile .showMenu .toggle::before').on('click',function(){
        $('.headContainer .mobile .hiddenMenu').toggle('')
    })

    // Closing the Hidden Menu
    $('.headContainer .mobile .hiddenMenu .close').on('click',function(){
        $('.headContainer .mobile .hiddenMenu').toggle('slow')
    })


    // Activate Owl-Carousel 
    if(parseInt($(window).width()) < 780){
        $('.owl-carousel').owlCarousel({
            center: false,
            dots:false,
            dragEndSpeed:600,
            items:2,
            loop:false,
            margin:-415,
            responsive:{
                300:{
                    margin:140,
                    center:true,
                },

                700:{
                    margin:-415
                }
            }
            
        })
    }
    else{
        $('.owl-carousel').css('display','grid');
    }

})

function sendAjax(arg,num){
    var id=$('#dishes').data('id')

    $.ajax({
            type:'post',
            url:admin_ajax.ajaxurl,
            data:{
                'action': 'getDishes',
                'name': arg,
                'id' : id
            },
            success:function(response){
               var rep=response.replace('0','')
              $('.theDishes').html(rep);
              $(`#dishes button`).css('border-bottom','none')
              $(`#dishes button:nth-child(${num})`).css('border-bottom','solid 2.3px rgba(222, 144, 0, 0.466)');
              
            },
            error:function(response){
                console.log(response)
            }
        })
}




function reduce(id){
    var num=document.querySelector(`#num${id}`).innerHTML
    num=Number(num)
    num--
    document.querySelector(`#num${id}`).innerHTML=num
    console.log(Number(num))
    if(Number(num)<=1){
        document.querySelector('.reduce').style.opacity="0"
        document.querySelector('.reduce').setAttribute("disabled")
    }
    if(Number(num)>1){
        document.querySelector('.reduce').style.opacity="100"
        document.querySelector('.reduce').setAttribute("editable")
    }
}

function add(id){
    var num=document.querySelector(`#num${id}`).innerHTML
    num=Number(num)
    num++
    document.querySelector(`#num${id}`).innerHTML=num
    if(Number(num)>1){
        document.querySelector('.reduce').style.opacity="100"
        document.querySelector('.reduce').setAttribute("editable")
    }
}


var CartDishes=[];
var Local_CartDishes=[];
var side=''
var change=''
function chooseSide(name , id){
    console.log('Side name is ' + name)
    
    $(`.side .inside`).css('display','none')
    $(`#${id} .inside`).css('display','block')
    side=name
}

function chooseChange(name,id){
    console.log('Change name is ' + name)
    $(`.change .inside`).css('display','none')
    $(`#${id} .inside`).css('display','block')
    change=name
}


function addToBag(id ,numID){
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
    
    
    if(localStorage.getItem('CartDishes')){
        Local_CartDishes=JSON.parse(localStorage.getItem('CartDishes'));
        Local_CartDishes.push(ItemObject)
        localStorage.setItem('CartDishes',JSON.stringify(Local_CartDishes))
        console.log('CartDishes Exists: '+Local_CartDishes)
        window.location='http://epicure.local/cart/'
    }
    else{
        CartDishes.push(ItemObject);
        localStorage.setItem('CartDishes',JSON.stringify(CartDishes))
        Local_CartDishes=JSON.parse(localStorage.getItem('CartDishes'));
        console.log('CartDishes Dont Exists: ' + Local_CartDishes)
        window.location='http://epicure.local/cart/'

    }
}



var TableDishes=JSON.parse(localStorage.getItem('CartDishes'))

if(TableDishes){
    var total=0
    var tr=''
    for(var i=0;i<TableDishes.length;i++){
      tr+=`<tr id=${TableDishes[i].id}><td>`+TableDishes[i].title+`</td>`
      tr+=`<td class="table-img"><img src='${TableDishes[i].img}'> </td>`
      tr+=`<td>${TableDishes[i].side}</td>`
      tr+=`<td>${TableDishes[i].change}</td>`
      tr+=`<td>${TableDishes[i].quantity}</td>`
      tr+=`<td>${TableDishes[i].total} <svg xmlns="http://www.w3.org/2000/svg" width="14" height="13" viewBox="0 0 14 13">
      <g fill="none" fill-rule="evenodd" stroke="#000" stroke-width=".639">
          <path d="M1 12V.48h5.253C8.127.453 9.064 1.616 9.064 3.97v4.45"/>
          <path d="M13.544.48V12H8.291c-1.874.027-2.811-1.136-2.811-3.49V4.06"/>
      </g>
  </svg></td>`
      tr+=`<td><button class="CartButton" onclick="removeDish('${TableDishes[i].id}')"> Remove </button></td></tr>`
      
     total+=TableDishes[i].total
    
    }
    tr+=''
    $('.form-Price').text(total)
}

$('table tbody').append(tr)


function removeDish(id){
    var theDish=TableDishes.find(dish => dish.id===id)
    TableDishes.splice(TableDishes.indexOf(theDish),1);
    localStorage.setItem('CartDishes',JSON.stringify(TableDishes));
    $(`#${id}`).remove();

    var newTotal=Number($('.form-Price').text())-Number(theDish.total)

    $('.form-Price').text(newTotal)
    console.log(theDish)
}



if(document.querySelector('#form1')){
    
document.querySelector("#form1").addEventListener('submit',function(e){
    e.preventDefault()
       var theOrder={
        name:$( "input[name*='name']" ).val(),
        email:$( "input[name*='email']" ).val(),
        phone:$( "input[name*='phone']" ).val(),
        total:Number($('.form-Price').text()),
        ItemList:TableDishes
    }
    var JsonString=JSON.stringify(theOrder.ItemList)
    console.log(JsonString)
    console.log(JSON.parse(JsonString))
    console
        $.ajax({
                    type:'POST',
                    data:{
                        'action':'sendItemToAdmin',
                        'name':theOrder.name,
                        'email':theOrder.email,
                        'phone':theOrder.phone,
                        'ItemList':JSON.stringify(theOrder.ItemList),
                        'totalPrice':theOrder.total
                    },
                    url:admin_ajax.ajaxurl,
                    success:function(response){
                        console.log('Successfully Sended DATA')
                        window.location='http://epicure.local/thanks-for-ordering/'
                    },
                    error:function(response){
                        console.log(response)
                    }
                })
  })
}








//   Search Things To Do


if($('#searchInput').val()==''){
    $(".open .open-inner .open-search .search-button").attr("disabled", true);
}

$('#searchInput').focus(function(){
    $('#search_options').css('display','block');
})



function search_Input(){
    
    var input = document.getElementById("searchInput");
    var filter = input.value.toLowerCase();
    var SearchOptions = document.getElementById("search_options");
    var ListOptions = document.getElementById("search_options").getElementsByClassName('search_list');
    for (var i = 0; i < ListOptions.length; i++) {
        
        var p=ListOptions[i].getElementsByTagName('p')[0]
        var txtValue = p.textContent || p.innerText;

        if (txtValue.toLowerCase().indexOf(filter) > -1) {
            ListOptions[i].style.display = "";
        } else {
            ListOptions[i].style.display = "none";
        }
    }
}


function select_Search_Input(id){
    document.getElementById('searchInput').value=$(`#${id} p`).text()
    document.getElementById("search_options").style.display='none';
    $(".open .open-inner .open-search .search-button").removeAttr("disabled");
}
// /////////////////////////////




// Head Search

if($(".right .search .search-form .search-input").val()==''){
    $(".right .search .search-form search-button").attr("disabled", true);
}




$(".right .search .search-form .search-input").focus(function(){
    $('#search_options_header').css('display','block');
})

function search_header_Input(){
    
    var input = $(".right .search .search-form .search-input");
    var filter = input.value.toLowerCase();
    var SearchOptions = document.getElementById("#search_options_header");
    var ListOptions = document.getElementById("search_options_header").getElementsByClassName('search_list');
    for (var i = 0; i < ListOptions.length; i++) {
        
        var p=ListOptions[i].getElementsByTagName('p')[0]
        var txtValue = p.textContent || p.innerText;

        if (txtValue.toLowerCase().indexOf(filter) > -1) {
            ListOptions[i].style.display = "";
        } else {
            ListOptions[i].style.display = "none";
        }
    }
}


function select_Search_Input_header_Desktop(id){
    $(".right .search .search-form .search-input").val($(`#${id} p`).text())
    console.log($(`#${id} p`).text())
    document.getElementById("search_options_header").style.display='none';
    $(".right .search .search-form search-button").removeAttr("disabled");
}



// Mobile Head Search

if($(".headContainer .mobile .searchMobile .search-form input").val()==''){
    $(".headContainer .mobile .searchMobile .search-form .search-button").attr("disabled", true);
}


$(".headContainer .mobile .searchMobile .search-form input").focus(function(){
    $('.headContainer .mobile .searchMobile #search_options_header').css('display','block');
})


function search_header_Input(){
    
    var input = $(".headContainer .mobile .searchMobile .search-form input");
    var filter = input.value.toLowerCase();
    var SearchOptions = $('.headContainer .mobile .searchMobile #search_options_header');
    var ListOptions = SearchOptions.getElementsByClassName('search_list');
    for (var i = 0; i < ListOptions.length; i++) {
        
        var p=ListOptions[i].getElementsByTagName('p')[0]
        var txtValue = p.textContent || p.innerText;

        if (txtValue.toLowerCase().indexOf(filter) > -1) {
            ListOptions[i].style.display = "";
        } else {
            ListOptions[i].style.display = "none";
        }
    }
}


function select_Search_Input_header(id){
    $(".headContainer .mobile .searchMobile .search-form input").val($(`#${id} p`).text())
    $('.headContainer .mobile .searchMobile #search_options_header').css('display','none');
    $(".headContainer .mobile .searchMobile .search-form .search-button").removeAttr("disabled");
}
