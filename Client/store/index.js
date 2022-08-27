import Vuex from 'vuex'

const store = () => {
    return new Vuex.Store({
        state: {
            cart: [],
        },

        mutations: {
            ADD_TO_CART(state, product) {
                const productInCart = state.cart.find(item => parseInt(item.id) === parseInt(product.id))
                if (productInCart) {
                    const productKey = state.cart.findIndex((item) => parseInt(item.id) === parseInt(product.id))
                    state.cart[productKey].quantity = state.cart[productKey].quantity + product.quantity
                } else {
                    state.cart.push(product);
                }
            },
            removeCartItem(state, index) {
                state.cart.splice(index, 1);
            },
            IncreaseItemCount(state, index) {
                let item = state.cart[index];
                item.quantity++;
            },
            DecreaseItemCount(state, index) {
                let item = state.cart[index];
                if (!item) return;
                if (item.quantity == 1) {
                    state.cart.splice(index, 1);
                } else {
                    item.quantity -= 1;
                }
            },
            updateQuantity(state, index) {
                let item = state.cart[index];
                if (item.quantity < 1) {
                    alert('Số lượng sản phẩm không hợp lệ')
                } else {
                    item.quantity = parseInt(item.quantity);
                }
            },
            clearCart(state) {
                state.cart = [];
                localStorage.removeItem("cart");
            },
            // setProfile(state, user) {
            //     state.auth.user = user
            // }
        },

        actions: {
            addProductTocart({ commit }, product) {
                commit('ADD_TO_CART', product);
            },
        },

        getters: {
            cartTotalPrice(state) {
                let total = 0;
                state.cart.forEach(item => {
                    total += item.price * item.quantity;
                })
                return total;
            },
        }
    })
}
export default store