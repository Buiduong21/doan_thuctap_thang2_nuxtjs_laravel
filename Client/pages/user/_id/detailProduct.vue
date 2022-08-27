<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <img :src="'https://laravel-api-duongbt.herokuapp.com/upload/' + product.image" alt="">
            </div>
            <div class=" col-md-6">
                <h4>{{ product.name }}</h4>
                <p>Giá : {{ product.price }}</p>
                <p>Số lượng: <input type="number" v-model="quantity" value="1" min="1"></p>
                <div>
                    <a class="btn btn-primary rounded-pill" href="/user/productCart" @click="addToCart(product)">Thêm
                        vào giỏ hàng</a>
                </div>
                <hr>
                <p> Giao hàng miễn phí: Áp dụng đơn hàng > 200.000đ</p>
                <p> Thanh toán tại nhà: Nhanh chóng và an toàn</p>

            </div>
        </div>
        <div class="content">
            <h1>Mô tả sản phẩm</h1>
            <p>{{ product.desr }}</p>
        </div>
    </div>
</template>

<script>
const axios = require('axios');

export default {
    layout: 'user',
    data() {
        return {
            product: [],
            quantity: 1
        }
    },
    mounted() {
        this.getProductDetail()
    },
    methods: {
        getProductDetail() {
            console.log(this.$route.params.id);
            this.$axios.get('apiproduct/' + this.$route.params.id)
                .then(response => {
                    this.product = response.data
                    console.log(response.data)
                })
        },
        addToCart(product) {
            product.quantity = parseInt(this.quantity)
            this.$store.dispatch('addProductTocart', product);
        }
    }
}
</script>
