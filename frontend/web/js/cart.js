let body = $('body');

body.on('click', '.add-to-cart', function () {
    addItem($(this).data('id'));
});

body.on('click', '#add-to-cart-qty-btn', function () {
    const qty = $('#add-to-cart-qty-input').val();
    addItem($(this).data('id'), qty);
});

$('form#product-option-form').on('submit', function (e) {
    e.preventDefault();

    let data = $(this).serialize();

    $.get({
        url: `/ru/cart/add?${data}`,
        dataType: 'JSON',
        success: function (result) {
            setCart(result);
        },
        error: function () {
            console.log('Cart add error!');
        }
    });

    return false;
});

body.on('click', '.remove', function () {
    let id = $(this).data('id');
    $.get({
        url: '/ru/cart/delete-item',
        data: {id: id},
        dataType: 'Json',
        success: function (result) {
            setCart(result);
        },
        error: function () {
            alert('Error');
        }
    });
});

body.on('click', '.cart-minus-btn', function () {
    let parent = $(this).parents('.js-quantity');
    let inputQty = parent.find('.js-result');
    let inputQtyVal = parseInt(inputQty.val());
    inputQty.val(--inputQtyVal);

    addItem($(this).data('id'), inputQtyVal);
});

body.on('click', '.cart-plus-btn', function () {
    let parent = $(this).parents('.js-quantity');
    let inputQty = parent.find('.js-result');
    let inputQtyVal = parseInt(inputQty.val());
    inputQty.val(++inputQtyVal);

    addItem($(this).data('id'), inputQtyVal);
});

function addItem(id, qty = null) {
    $.get({
        url: '/ru/cart/add',
        data: {optionId: id, qty: qty},
        dataType: 'Json',
        success: function (res) {
            setCart(res);
            swal({
                title: "Успех!",
                text: "Товар успешно добавлен в корзину!",
                icon: "success",
            });
        },
        error: function () {
            alert('Error');
        }
    });
}

function setCart(data) {
    $('.cart-qty').html(data['qty']);
    $('#cart-sum').html(currencyFormatter(parseFloat(data['sum'])) + '₸');
    $('#cart-list').html(data['list']);
}
