<template>
    <div class="Content">
        <div class="banner">
            <img src="https://bizweb.dktcdn.net/100/415/010/themes/844269/assets/slider_1.jpg?1646286260817" alt="">
        </div>
        <div>
            <h1>Danh mục sản phẩm</h1>
        </div>
        <div>
            <h1>Tìm kiếm : <input type="text" v-model="search"></h1>
        </div>
        <div class="category">
            <div class="text-center" v-for="category in categorys" :key="category.id">
                <a class="categorya btn btn-primary">{{ category.name }}</a>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-3" v-for="product in filterProduct" :key="product.id">
                    <div class="card">
                        <img :src="'https://laravel-api-duongbt.herokuapp.com/upload/' + product.image"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <!-- <h2>{{ product.category_id }}</h2> -->
                            <h5 class="card-title">{{ product.name }}</h5>
                            <p class="card-text">{{ product.desr }}</p>
                            <p href="#">{{ new Intl.NumberFormat(['ban',
                                    'id']).format(product.price)
                            }}</p>
                            <nuxt-link class="btn btn-primary" :to="`/user/${product.id}/detailProduct`">Chi tiết
                            </nuxt-link>
                            <a class="btn btn-primary" href="/user/productCart" @click="addToCart(product)">Thêm
                                vào giỏ
                                hàng</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row section_time_open">
                <div class="col-md-6 left_module">
                    <h2 class="title_tab">
                        Thời gian mở cửa
                    </h2>

                    <p>
                        “Cà phê nhé" - Một lời hẹn rất riêng của người Việt. Một lời ngỏ mộc mạc để mình ngồi
                        lại bên nhau và sẻ chia câu chuyện của riêng mình.
                    </p>
                    <span class="time">T2 - T6: 8h30 - 21h30</span>
                    <span class="time">T7 - CN: 8h00 - 22h00</span>
                    <a href="/dat-ban" class="btn_booknow" title="Đặt bàn ngay">Đặt bàn ngay</a>
                </div>
                <div class="col-md-4 bg_right">
                    <img
                        src="https://bizweb.dktcdn.net/100/415/010/themes/844269/assets/banner_time_open.jpg?1622460223509">
                </div>
            </div>
            <div class="blog">
                <div class="row">
                    <div class="col-md-4" v-for="post in posts" :key="post.id">
                        <img class="w-100"
                            src="https://bizweb.dktcdn.net/100/415/010/articles/untitled-5.jpg?v=1608884590463" alt="">
                        <h4>{{ post.title }}</h4>
                        <p v-html="post.content"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="image_advertising">
            <div class="row">
                <div class="col-md-2 modul_width">
                    <img class="w-100"
                        src="https://bizweb.dktcdn.net/thumb/large/100/415/010/themes/844269/assets/picture_1.jpg?1646286260817"
                        alt="">
                </div>
                <div class="col-md-2 modul_width">
                    <img class="w-100"
                        src="https://bizweb.dktcdn.net/thumb/large/100/415/010/themes/844269/assets/picture_2.jpg?1646286260817"
                        alt="">
                </div>
                <div class=" col-md-2 modul_width">
                    <img class="w-100"
                        src="https://bizweb.dktcdn.net/thumb/large/100/415/010/themes/844269/assets/picture_1.jpg?1646286260817"
                        alt="">
                </div>
                <div class="col-md-2 modul_width">
                    <img class="w-100"
                        src="https://bizweb.dktcdn.net/thumb/large/100/415/010/themes/844269/assets/picture_2.jpg?1646286260817"
                        alt="">
                </div>
                <div class="col-md-2 modul_width">
                    <img class="w-100"
                        src="https://bizweb.dktcdn.net/thumb/large/100/415/010/themes/844269/assets/picture_4.jpg?1646286260817"
                        alt="">
                </div>
                <div class="col-md-2 modul_width">
                    <img class="w-100"
                        src="https://bizweb.dktcdn.net/thumb/large/100/415/010/themes/844269/assets/picture_1.jpg?1646286260817"
                        alt="">
                </div>
            </div>

        </div>
    </div>
</template>

<script>
// const axios = require('axios');

export default {
    layout: 'user',
    data() {
        return {
            products: [],
            posts: [],
            categorys: [],
            search: ''
        }
    },
    mounted() {
        this.getProduct(),
            this.getPost(),
            this.getCategory()
    },
    methods: {
        addToCart(product) {
            product.quantity = 1
            this.$store.dispatch('addProductTocart', product);
        },
        getProduct: function () {
            this.$axios.get('apiproduct')
                .then(response => {
                    this.products = response.data
                })
        },
        getPost: function () {
            this.$axios.get('apipost')
                .then(response => {
                    this.posts = response.data
                })
        },
        getCategory: function () {
            this.$axios.get('apicategory')
                .then(response => {
                    this.categorys = response.data
                })
        },
    },
    computed: {
        filterProduct() {
            return this.products.filter(product => product.name.toLowerCase().includes(this.search.toLowerCase()) || product.price.toLowerCase().includes(this.search.toLowerCase()))
        }
    }
}
</script>

<style>
h1 {
    text-align: center;
    padding: 20px;
}

/* section_time_open */
.section_time_open {
    padding: 20px;
}

.left_module {
    background-color: #4d8a54;
    padding: 80px 56px 96px 65px;
    min-height: 443px;
    position: relative;
}

.bg_right img {
    background-repeat: no-repeat;
    background-size: cover;
    width: 486px;
    height: 420px;
    background-position: right;
    padding: 0;
    margin-top: 12px;
    margin-left: -15px;
}

.modul_width {
    padding: 0px;
}

/* style category */
.category {
    display: flex;
    justify-content: center;
    margin: 10px;
}

.category a {
    width: 150px;
    margin: 5px 7px;
    border-radius: 70px;
}
</style>