<template>
    <div class="div">
        <div class="menuHeader bg-primary text-white">
            <div class="container">
                <div class="row ">
                    <div class="col-md-8">
                        <p>
                            <i><img
                                    src="//bizweb.dktcdn.net/100/415/010/themes/844269/assets/i_phone.png?1646286260817"></i>
                            <span> Hotline:1900 6750</span>
                        </p>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div v-if="user.name">
                                <span>
                                    <a href="/user/profile" class="btn btn-primary text-end">{{ user.name }}</a>
                                </span>
                                <button class="btn btn-light" @click="logout()" aria-haspopup="">Thoát</button>
                            </div>

                            <div class="col-md-8" v-else>
                                <span>
                                    <a href="/user/register" class="btn btn-primary text-end">Đăng ký</a>
                                </span>
                                <span>
                                    <a href="/user/login" class="btn btn-primary">Đăng nhập</a>
                                </span>
                            </div>

                            <div class="col-md-4 text-start">
                                <div class="icon_hotline">
                                    <i>
                                        <img src="//bizweb.dktcdn.net/100/415/010/themes/844269/assets/i_cart.png?1646286260817"
                                            alt="Template Tea House">
                                        <span class="count_item count_item_pr">{{ cart.length }}</span>
                                    </i>
                                    <span class="bolds cartext hidden-xs"><a href="/user/productCart">Giỏ
                                            hàng</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mb-3 mt-2">
                <div class="col-md-5">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container-fluid">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link" href="/user">Trang chủ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Giới thiệu</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Sản phẩm
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li>
                                                <hr class="dropdown-divider">
                                            </li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-md-2 ">
                    <img class="w-100"
                        src="https://bizweb.dktcdn.net/100/415/010/themes/844269/assets/logo.png?1646286260817">
                </div>
                <div class="col-md-5">
                    <nav class="navbar navbar-expand-lg" style="margin-left: 200px;">
                        <div class=" container-fluid">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link">Tin tức</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Thực đơn</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Liên hệ</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- <h1>{{ user.name }}</h1> -->
    </div>
</template>
<script>
const axios = require('axios');

export default {
    methods: {
        async logout() {
            await this.$auth.logout();
            this.$router.push({ name: 'user' })
        },
    },
    computed: {
        cart() {
            return this.$store.state.cart;
        },
        user() {
            if (this.$store.state.auth.user) {
                return this.$store.state.auth.user;
            } else {
                return ''
            }
        }
    }
}
</script>

<style >
.navbar .nav-item a {
    color: #000;
}

.icon_hotline span a {
    color: #fff;
    text-decoration: none;
}
</style>






