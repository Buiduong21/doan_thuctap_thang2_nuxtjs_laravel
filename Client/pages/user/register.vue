<template>
    <div>
        <div class="container col-md-5 mb-3">
            <h2 class="text-center">Đăng Ký tài khoản</h2>
            <form @submit.prevent="registerUser()">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" v-model="user.email" class="form-control " id="exampleInputEmail1"
                        aria-describedby="Mơi bạn nhập email" :class="{ 'is-invalid': errors.email }">
                    <div v-if="errors.email" class="invalid-feedback">
                        {{ errors.email[0] }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Họ và tên</label>
                    <input v-model="user.name" name="name" type="text" class="form-control" id="exampleInputEmail1"
                        aria-describedby="Mời bạn nhập họ và tên" :class="{ 'is-invalid': errors.name }">
                    <div v-if="errors.name" class="invalid-feedback">
                        {{ errors.name[0] }}
                    </div>

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Mật khẩu</label>
                    <input v-model="user.password" name="password" type="password" class="form-control"
                        id="exampleInputEmail1" aria-describedby="Mời bạn nhập họ và tên"
                        :class="{ 'is-invalid': errors.password }">
                    <div v-if="errors.password" class="invalid-feedback">
                        {{ errors.password[0] }}
                    </div>

                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    name: 'RegisterForm',
    layout: 'user',
    data() {
        return {
            user: {
                name: '',
                email: '',
                password: '',
            },
            errors: {},
            mess: ''
        }
    },
    methods: {
        async registerUser() {
            await this.$axios
                .post('register', this.user)
                .then(() => {
                    alert('Đăng nhập thành công');
                    this.$router.push('/user/login')
                })
                .catch(error => {
                    if (error.response.data.errors) {
                        this.errors = error.response.data.errors;
                        this.mess = null;
                    } else {
                        this.mess = error.response.data.mess;
                        this.errors = {};
                        // console.error(error.response.data.mess);
                    }
                })
        }
    }
}
</script>


