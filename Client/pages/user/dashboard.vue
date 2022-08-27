<template>
    <div class="container">
        <div class="row">
            <div v-for="product in products" :key="product.id">
                <h2>{{ product.category_id }}</h2>
                <h2>{{ product.name }}</h2>
                <p>{{ product.price }}</p>
                <p>{{ product.desr }}</p>
            </div>
        </div>
    </div>
</template>

<script>
const axios = require('axios');

export default {
    data() {
        return {
            products: []
        }
    },
    mounted() {
        this.getProduct();
    },
    methods: {
        getProduct: function () {
            axios.get('http://127.0.0.1:8000/api/apiproduct')
                .then(response => {
                    console.log(response.data.data);
                    this.products = response.data.data
                    // this.$router.push('/user');
                })

        },
        // checkLoggedIn() {
        //     const token = window.localStorage.getItem('token')
        //     if (token == null) {
        //         this.$router.push('/user/login')
        //     }
        //     axios.get('http://127.0.0.1:8000/api/user', {
        //         headers: { Authorization: 'Bearer ' + token }
        //     })
        //         .then(function (response) {
        //             console.log(response.data)
        //         })
        //         .catch(() => {
        //             this.$router.push('/user/login');
        //         })
        // },
    }
}
</script>

