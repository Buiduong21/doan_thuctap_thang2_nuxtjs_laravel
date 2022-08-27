export default function ({ store, redirect }) {
    if (!store.state.auth.loggedIn) {
        // alert('Xin vui lòng đăng nhập tài khoản để tiếp tục');
        return redirect('/user/login')
    }
}