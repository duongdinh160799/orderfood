$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    const $button  = document.querySelector('#sidebar-toggle');
    const $wrapper = document.querySelector('#wrapper');

    $button.addEventListener('click', (e) => {
        e.preventDefault();
        $wrapper.classList.toggle('toggled');
    });

});
function addtocart(e,id,price){


    if($("#item-" + id).length == 0) {
        let html = ' <div class="d-flex mt-4" id="item-'+id+'">';
        html += '<img class="img-thumbnail ml-3 " src="' + e.querySelector('img').src + '" width="50px" height="50px">';
        html += '<div class="p-2  col-4 ">'+ e.querySelector('h6').textContent +'</div>';
        html += '<div class="p-2  col-3  text-center">';
        html += '<div class="input-group">';
        html += '<input type="number" name="quantity['+id+']" id="quantity-'+id+'" value="1" class="form-control text-center" min="1" max="100"  onchange="changeQuantily(this,'+id+','+price+')">';
        html += ' </div></div><div class="p-2  col-2  text-end" id="price-'+id+'">'+price+'$</div>';
        html += '  <div class="p-2  flex-grow-1 text-end"> <a href="#" class="btn btn-default" onclick="deleteItem('+id+')"> <i class="fas fa-trash-alt"></i> </a></div></div>';
        $('#cart').append(html);
    }
    else  {

        var a = $('#quantity-'+id).val()*1 +1;
        $('#quantity-'+id).val(a);
        var new_price = price*a;
        $('#price-'+id).text(new_price+'$');
    }

}
function changeQuantily(e,id,price){
    var new_price = price*$(e).val();
    $('#price-'+id).text(new_price+'$');
}

function deleteItem(id){
    $('#item-'+id).remove();
}
