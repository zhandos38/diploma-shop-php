let sliderRange = $( "#slider-range" );
$( function() {
    sliderRange.slider({
        range: true,
        slide: function( event, ui ) {
            $('#min-price-input').val(ui.values[ 0 ]);
            $('#max-price-input').val(ui.values[ 1 ]);
        }
    });
} );

function loaderOn() {
    $("#overlay").show();
}

function loaderOff() {
    $("#overlay").hide();
}

$(document).ready(function () {
    $('#category-content-pjax')
        .on('pjax:start', function() {
            loaderOn();
        })
        .on('pjax:end', function() {
            $('html, body').scrollTop('.header');
            loaderOff();
        });

    window.addEventListener('popstate', function(e) {
        Filter.pjaxLoadData(location.search, false);
    });

    // Filter
    Filter = {
        categoryId: null,
        params: {},
        attributes: function(e) {
            this.checkAttributes();
            this.loadData(this.getUrl($.param(Filter.params)), true);
        },
        sort: function(value) {
            this.params.sort = value;
            this.loadData(this.getUrl($.param(Filter.params)), true);
        },
        priceRange: function(e) {
            this.params.price_min = $('#min-price-input').val();
            this.params.price_max = $('#max-price-input').val();
            this.checkAttributes();
            this.loadData(this.getUrl($.param(Filter.params)), true);
        },
        checkAttributes: function() {
            let resultAttr = '';

            let flag = false;
            $('.category-filter').each(function () {
                $(this).find('input:checkbox:checked').each(function () {
                    resultAttr = resultAttr.concat($(this).val(), ',');
                    flag = true;
                });
                resultAttr = resultAttr.slice(0, -1);
                if (flag) {
                    resultAttr = resultAttr.concat('|');
                }
            });
            if (flag) {
                resultAttr = resultAttr.slice(0, -1);
            }

            if (resultAttr) {
                Filter.params.attributes = resultAttr;
            } else {
                delete Filter.params.attributes;
            }
        },
        getUrl: function(params) {
            return location.pathname + '?id=' + this.categoryId + '&' + params;
        },
        getParamByName: function(name, url) {
            if (!url) url = window.location.href;
            name = name.replace(/[\[\]]/g, '\\$&');
            let regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        },
        pjaxLoadData: function (url, addEntry) {
            this.loadData(url, addEntry);
        },
        loadData: function (url, addEntry) {
            $.get({
                url: url,
                success: function (res) {
                    $('#main').html(res);

                    if (addEntry === true) {
                        history.pushState(null, null, url);
                    }
                }
            });
        }
    };
});