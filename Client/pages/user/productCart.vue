<template>
    <div class="container">
        <h2 class="py-3">Giỏ hàng của bạn</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá bán</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in cart" :key="item.id">
                    <td> <img :src="'https://laravel-api-duongbt.herokuapp.com/upload/' + item.image" width="60px">
                    </td>
                    <td>{{ item.name }}</td>
                    <td>{{ new Intl.NumberFormat(['ban', 'id']).format(item.price) }}</td>
                    <td>
                        <button class="btn btn-primary" @click.prevent="DecreaseItemCount(index)" icon>
                            -
                        </button>
                        <input v-model="item.quantity">
                        <button class="btn btn-primary" @click.prevent="IncreaseItemCount(index)" icon>
                            +
                        </button>
                        <a class=" btn btn-primary" href="" @click="updateQuantity(index)">Update</a>
                    </td>
                    <td>{{ new Intl.NumberFormat(['ban', 'id']).format((item.price) *
                            (item.quantity))
                    }}</td>
                    <td><button class="btn btn-primary" @click="removeCartItem(index)">Xóa</button></td>
                </tr>
            </tbody>
        </table>
        <h1>Tổng tiền thanh toán: {{ new Intl.NumberFormat(['ban', 'id']).format(cartTotalPrice) }}</h1>
        <div class="row">
            <div class="col">
                <h2 class="btn btn-primary" @click.prevent="clearCart()">Xóa tất cả giỏ hàng</h2>
            </div>
            <div class="col text-end">
                <a @click="payment()" class="btn btn-primary">Mua hàng</a>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    layout: 'user',
    computed: {
        cart() {
            return this.$store.state.cart;
        },
        cartTotalPrice() {
            return this.$store.getters.cartTotalPrice;
        }
    },
    methods: {
        removeCartItem(index) {
            this.$store.commit('removeCartItem', parseInt(index));
        },
        IncreaseItemCount(index) {
            this.$store.commit('IncreaseItemCount', parseInt(index));
        },
        DecreaseItemCount(index) {
            this.$store.commit('DecreaseItemCount', parseInt(index));
        },
        updateQuantity(index) {
            this.$store.commit('updateQuantity', parseInt(index));
        },
        clearCart() {
            this.$store.commit('clearCart');
        },
        payment() {
            // console.log(this.cart.length);
            if (this.cart.length < 1) {
                alert('Giỏ hàng không có sản phẩm. Xin vui lòng thêm sản phẩm để tiếp tục mua hàng');
            } else {
                this.$router.push('/user/checkout');
            }
        }
    }
}
</script>
