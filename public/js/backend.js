
$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    if ($("#datepicker").length){
        $("#datepicker").datepicker({
            autoclose: true,
            todayHighlight: false
        });
    }

    $('.sub-menu ul').hide();
    $(".sub-menu a").click(function () {
        $(this).parent(".sub-menu").children("ul").slideToggle("100");
        $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
    });
    $("#success-alert").hide();
    const $button  = document.querySelector('#sidebar-toggle');
    const $wrapper = document.querySelector('#wrapper');

    $button.addEventListener('click', (e) => {
        e.preventDefault();
        $wrapper.classList.toggle('toggled');
    });
    if ($('#imgInp').length){
        imgInp.onchange = evt => {
            const [file] = imgInp.files;
            if (file) {
                blah.src = URL.createObjectURL(file);
            }
        };
    }
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
function changeStatusOrder(e,id){
    $.ajax({
        url :route('admin.changeStatusOrder'),
        type : "post",
        data : {
            _token:$(e).data('token'),
            id : id,
            status: e.value
        },
        success : function (res){
            if (res.success){
                $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
                    $("#success-alert").slideUp(500);
                });
                if (res.success == '2'){
                    var parent = e.parentNode;
                    e.remove();
                    parent.prepend('Done');
                    parent.classList.add("text-success");
                }else if(res.success == '3'){
                    var parent = e.parentNode;
                    e.remove();
                    parent.prepend('Cancel');
                    parent.classList.add("text-danger");
                }
            }
        }
    });
}
function searchOrder(e){
    $.ajax({
        url :route('admin.listOrder'),
        type : "get",
        data : {
            _token:$(e).data('token'),
            status: e.value
        },
        success : function (res){
            if (res){
                $('body').html(res);
            }
        }
    });
}
function searchItem(e){
    $.ajax({
        url :route('admin.listItem'),
        type : "get",
        data : {
            _token:$(e).data('token'),
            status: e.value
        },
        success : function (res){
            if (res){
                $('body').html(res);
            }
        }
    });
}
function searchItemUser(e){
    $.ajax({
        url :route('user.index'),
        type : "get",
        data : {
            _token:$(e).data('token'),
            status: e.value
        },
        success : function (res){
            if (res){
                $('body').html(res);
            }
        }
    });
}
function searchRecharge(e){
    $.ajax({
        url :route('admin.listRecharge'),
        type : "get",
        data : {
            _token:$(e).data('token'),
            status: e.value
        },
        success : function (res){
            if (res){
                $('body').html(res);
                $("#success-alert").hide();
            }
        }
    });
}
function searchWithdrawal(e){
    $.ajax({
        url :route('admin.listWithdrawal'),
        type : "get",
        data : {
            _token:$(e).data('token'),
            status: e.value
        },
        success : function (res){
            if (res){
                $('body').html(res);
                $("#success-alert").hide();
            }
        }
    });
}
function searchUser(e){
    var search = $('#search').val();
    console.log(search);
    $.ajax({
        url :route('admin.index'),
        type : "get",
        data : {
            _token:$(e).data('token'),
            search: search
        },
        success : function (res){
            if (res){
                $('body').html(res);
                $("#success-alert").hide();
            }
        }
    });
}
function upload(){
    var imgcanvas = document.getElementById("canv1");
    var fileinput = document.getElementById("finput");
    var image = new SimpleImage(fileinput);
    image.drawTo(imgcanvas);
}

function changeStatusRecharge(e,id){
    $.ajax({
        url :route('admin.changeStatusRecharge'),
        type : "post",
        data : {
            _token:$(e).data('token'),
            id : id,
            status: e.value
        },
        success : function (res){
            if (res.success){
                $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
                    $("#success-alert").slideUp(500);
                });
                if (res.success == '2'){
                    var parent = e.parentNode;
                    e.remove();
                    parent.prepend('Done');
                    parent.classList.add("text-success");
                }else if(res.success == '3'){
                    var parent = e.parentNode;
                    e.remove();
                    parent.prepend('Cancel');
                    parent.classList.add("text-danger");
                }
            }
        }
    });
}
function changeStatusWithdrawal(e,id){
    $.ajax({
        url :route('admin.changeStatusWithdrawal'),
        type : "post",
        data : {
            _token:$(e).data('token'),
            id : id,
            status: e.value
        },
        success : function (res){
            if (res.success){
                $("#success-alert").fadeTo(2000, 500).slideUp(500, function(){
                    $("#success-alert").slideUp(500);
                });
                if (res.success == '2'){
                    var parent = e.parentNode;
                    e.remove();
                    parent.prepend('Done');
                    parent.classList.add("text-success");
                }else if(res.success == '3'){
                    var parent = e.parentNode;
                    e.remove();
                    parent.prepend('Cancel');
                    parent.classList.add("text-danger");
                }
            }
        }
    });
}
