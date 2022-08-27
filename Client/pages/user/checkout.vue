<template>
    <div class="container">
        <form @submit.prevent="sendDataOrder()">
            <div class="row py-5">
                <div class="col-md-6">
                    <div class="mb-3">
                        <input v-model="customer_email" type="email" name="customer_email" class="form-control "
                            id="exampleInputEmail1" placeholder="email"
                            :class="{ 'is-invalid': errors && errors['customer_email'] }">
                        <div v-if="errors && errors['customer_email']" class="invalid-feedback">
                            {{ errors['customer_email'][0] }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <input v-model="customer_name" name="customer_name" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="Tên"
                            :class="{ 'is-invalid': errors && errors['customer_name'] }">
                        <div v-if="errors && errors['customer_email']" class="invalid-feedback">
                            {{ errors['customer_email'][0] }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <input v-model="customer_phone" name="customer_phone" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="Số điện thoại"
                            :class="{ 'is-invalid': errors && errors['customer_phone'] }">
                        <div v-if="errors && errors['customer_phone']" class="invalid-feedback">
                            {{ errors['customer_phone'][0] }}
                        </div>
                    </div>
                    <div class="mb-3">
                        <input v-model="customer_address" name="customer_address" type="text" class="form-control"
                            id="exampleInputEmail1" placeholder="Địa chỉ"
                            :class="{ 'is-invalid': errors && errors['customer_address'] }">
                        <div v-if="errors != false && errors['customer_address']" class="invalid-feedback">
                            {{ errors['customer_address'][0] }}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 ">
                    <h4>Đơn hàng</h4>
                    <table class="table">
                        <tr v-for="item in cart" :key="item.id">
                            <td> <img :src="'http://127.0.0.1:8000/upload/' + item.image" width="60px"> </td>
                            <td>{{ item.name }}</td>
                            <!-- <td>{{ new Intl.NumberFormat(['ban', 'id']).format(item.price) }}</td> -->
                            <td>{{ item.quantity }} </td>
                            <td class="text-end">{{ new Intl.NumberFormat(['ban', 'id']).format((item.price) *
                                    (item.quantity))
                            }}</td>
                        </tr>
                    </table>
                    <hr>
                    <div class="row">
                        <div class="col-md">
                            <p>Tổng tiền</p>
                            <p>Phí vận chuyển</p>
                        </div>
                        <div class="col-md text-end">
                            <h4>{{ new Intl.NumberFormat(['ban', 'id']).format(cartTotalPrice) }}</h4>
                            <p>-</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md">
                            <a href="/user/productCart">Quay lại giỏ hàng</a>
                        </div>
                        <div class="col-md text-end">
                            <button type="submit" class="btn btn-primary">Thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    layout: 'user',
    middleware: 'checkLogin',
    data() {
        return {
            customer_address: '',
            customer_email: '',
            customer_name: '',
            customer_phone: '',
            total: 0,
            errors: false,
            myCart: []
        }
    },
    computed: {
        cart() {
            return this.$store.state.cart;
        },
        cartTotalPrice() {
            return this.$store.getters.cartTotalPrice;
        }
    },
    methods: {
        sendDataOrder() {
            const data = {
                customer_address: this.customer_address,
                customer_email: this.customer_email,
                customer_name: this.customer_address,
                customer_phone: this.customer_phone,
                myCart: this.cart,
                total: this.cartTotalPrice
            }

            this.$axios.post('apiorder', data)
                .then(response => {
                    console.log(response.data);
                    alert('thành công');
                    this.$store.commit('clearCart');
                    this.$router.push('/user');
                })
                .catch(error => {
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
