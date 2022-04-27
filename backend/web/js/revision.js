Vue.use(VueToast);

new Vue ({
    el: '#revision-create-app',
    name: "RevisionCreate",
    components: {
        Autocomplete
    },
    computed: {
        totalDiffAmount() {
            return this.products.reduce(function (sum, product) {
                return sum + product.diffAmount;
            }, 0);
        }
    },
    data: () => ({
        suggestProducts: [],
        products: []
    }),
    methods: {
        async searchProductByBarcode(term) {
            if (term.length < 1) {
                return [];
            }

            return new Promise((resolve) => {
                $.get({
                    url: '/revision/get-products-by-barcode',
                    dataType: 'json',
                    data: {term: term},
                    success: function (result) {
                        return resolve(result);
                    },
                    error: function () {
                        console.log('get products by barcode error');
                    }
                });
            });
        },
        getResultValueBarcode(result) {
            console.log(result);
            return result.code;
        },
        async searchProductByName(term) {
            if (term.length < 1) {
                return [];
            }

            return new Promise((resolve) => {
                $.get({
                    url: '/revision/get-products-by-name',
                    dataType: 'json',
                    data: {term: term},
                    success: function (result) {
                        return resolve(result);
                    },
                    error: function () {
                        console.log('get products by name error');
                    }
                });
            });
        },
        getResultValueName(result) {
            return result.name;
        },
        setProduct(product) {
            for (const item of this.products) {
                if (item.id === product.id) {
                    Vue.$toast.warning("Данный товар уже существует");
                    return;
                }
            }
            console.log(product);
            this.products.push({
                ...product,
                quantity: parseFloat(product.quantity),
                price_in: parseFloat(product.price_in),
                price_retail: parseFloat(product.price),
                currentQty: parseFloat(product.quantity),
                diff: 0,
                diffAmount: 0
            });
            this.products = this.products.slice().reverse();
        },
        deleteProduct(i) {
            this.products.splice(i, 1);
        },
        async save() {
            this.products = this.products.map(function (product) {
                return {
                    ...product,
                    quantity: product.currentQty
                };
            });

            $.post({
                url: "/revision/create",
                dataType: 'json',
                data: {
                    balance: this.totalDiffAmount,
                    products: this.products
                },
                success: result => {
                    Vue.$toast.open("Успешно обналвено");
                    this.products = [];
                }
            });
        }
    }
});