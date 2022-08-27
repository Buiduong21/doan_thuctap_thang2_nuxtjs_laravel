<template>
    <div class="container">
        <h2 class="text-center">Thông tin người dùng</h2>
        <section style="background-color: #eee;">
            <div class="container py-5">
                <form class="">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mb-4">
                                <div class="card-body text-center">
                                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                        alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                                    <h5 class="my-3">Ảnh</h5>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-8">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mb-0">Tên người dùng</p>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="text-muted mb-0 w-100" name="name" v-model="user.name">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mb-0">Email</p>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="text-muted mb-0 w-100" name="email" v-model="user.email">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mb-0">Giới tính</p>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="text-muted mb-0 w-100" name="gender" v-model="user.gender">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mb-0">Địa chỉ</p>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="text-muted mb-0 w-100" name="location"
                                                v-model="user.location">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mb-0">Sinh nhật</p>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="text-muted mb-0 w-100" name="birthday"
                                                v-model="user.birthday">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mb-0">Kỹ năng</p>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="text-muted mb-0 w-100 w-100" v-model="user.skills">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p class="mb-0">Notes</p>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="text-muted mb-0 w-100 w-100" v-model="user.notes">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button name="" id="" class="btn btn-primary" @click.prevent="UpdateProfile"
                                    style="float: right;" href="#" role="button">Chỉnh sửa hồ
                                    sơ</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
</template>

<script>
const axios = require('axios');
export default {
    layout: 'user',
    data() {
        return {
            user: {
            },
        }
    },
    mounted() {
        this.user = this.$store.state.auth.user
        // this.user = this.getProfile()
    },
    methods: {
        // getProfile() {
        //     this.$axios.get('apiprofile/' + this.user.id).then(response => {
        //         console.log('oki')
        //         this.user = response.data
        //         console.log(this.user)
        //     })
        // },
        UpdateProfile() {
            const data = {
                id: this.user.id,
                name: this.user.name,
                email: this.user.email,
                gender: this.user.gender,
                location: this.user.location,
                skills: this.user.skills,
                birthday: this.user.birthday,
                notes: this.user.notes,
            }
            console.log(data)
            this.$axios.post('apiprofile', data)
                .then(response => {
                    console.log(response.data);
                    this.user = response.data;
                    const userToUpdate = { ...this.$auth.user }
                    this.$auth.setUser(userToUpdate)
                    // this.$store.state('setProfile', response.data)
                    alert('thành công');
                    // this.$router.push('/user');
                })
                .catch(error => {
                    alert('that bai');
                    if (error.response.data.errors) {
                        this.errors = error.response.data.errors;
                    } else {
                        this.mess = error.response.data.mess;
                    }
                });
        },
    }
}
</script>

