<template>
    <div class="container col-md-5 mb-3 my-5">
        <h2 class="text-center">Đăng nhập tài khoản</h2>
        <form @submit.prevent="loginUser()">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="email" name="email" v-model="user.email" class="form-control " id="exampleInputEmail1"
                    aria-describedby="Mơi bạn nhập email" :class="{ 'is-invalid': errors.email }">
                <div v-if="errors.email" class="invalid-feedback">
                    {{ errors.email[0] }}
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" name="password" v-model="user.password" class="form-control"
                    id="exampleInputPassword1" :class="{ 'is-invalid': errors.password }">
                <div v-if="errors.password" class="invalid-feedback">
                    {{ errors.password[0] }}
                </div>

            </div>
            <span v-if="mess">{{ mess }}</span>
            <button type=" submit" class="btn btn-primary w-100">
                <span class="spinner-border" v-if="loading"></span>
                Đăng nhập</button>
            <div class="my-5 text-center">
                <p><a href="/user/register" class="text-end">Nếu bạn chưa có tài khoản bấm vào đây để đăng ký</a>
                </p>
            </div>
        </form>
    </div>
</template>

<script>
const axios = require('axios');
export default {
    layout: 'auth',
    data() {
        return {
            user: {
                email: '',
                password: ''
            },
            errors: {},
            loading: false,
            mess: ''
        }
    },
    methods: {
        async loginUser() {
            this.loading = true;
            await this.$auth.loginWith('local', { data: this.user })
                .then(() => {
                    alert('Đăng nhập thành công');
                    this.$router.push('/user');
                })
                .catch(error => {
                    this.loading = false;
                    if (error.response.data.errors) {
                        this.errors = error.response.data.errors;
                        this.mess = null;
                    } else {
                        this.mess = error.response.data.mess;
                        this.errors = {};
                    }
                });
        }
    }
}
</script>

