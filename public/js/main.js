$(document).ready(function () {
    // show/hide form search
    $("#searchShow").on('click', function () {
        $('#form_search').toggle(600);
    });
    // show/hide menu in mobile view
    $('#icon-bar').on('click', function () {
        $(this).toggleClass("fa-bars fa-times");
        $('#menu').toggle(600);
    })

    // minus-add quantity product

    $('.minus1').on('click', function () {
        let id = $(this).parent().attr('id');
        let idName = $('#quantity-' + id);
        let currentVal = parseInt(idName.val());
        console.log(currentVal);
        if (!isNaN(currentVal) && currentVal > 0) {
           idName.val(currentVal - 1);
        }
    })
    $('.add1').on('click', function () {
        let id = $(this).parent().attr('id');
        let idName = $('#quantity-' + id);
        let currentVal = parseInt(idName.val());
        console.log(currentVal);
        if (!isNaN(currentVal)) {
            idName.val(currentVal + 1);
        }
    })

    //Show/hide info footer
    $('#info-btn').on('click', function () {
        $('#info').toggle(400);
    });
})
