if(typeof ymaps !== 'undefined'){
    ymaps.ready(init);
}

function init () {
    var center   = [42.330186, 69.592237];
    myMap = new ymaps.Map("map", {
        center: center,
        zoom: 12
    }, {
        balloonMaxWidth: 200,
        searchControlProvider: 'yandex#search'
    });

    myMap.events.add('click', function (e) {
        fillCoords(e.get('coords'));
        if (myMap.balloon.isOpen()) {
            myMap.balloon.close();
        }
        var coords = e.get('coords');
        myMap.balloon.open(coords, {
            contentHeader:'Ваш адрес',
            contentBody: '<p>Координаты щелчка: ' + [
                coords[0].toPrecision(6),
                coords[1].toPrecision(6)
            ].join(', ') + '</p>',
            contentFooter:'<sup>Gul Market</sup>'
        });
    });

    myMap.events.add('balloonopen', function (e) {
        myMap.hint.close();
    });
}

function fillCoords(coords) {
    $('#longitude').val(coords[1].toPrecision(8));
    $('#latitude').val(coords[0].toPrecision(8));
}