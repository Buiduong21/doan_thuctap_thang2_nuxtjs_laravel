<template>
    <div>
        <AppHeader />
        <nuxt></nuxt>
        <AppFooter />
    </div>
</template>

<script>
import AppHeader from '../components/User/AppHeader.vue'
import AppFooter from '../components/User/AppFooter.vue'
export default {
    components: {
        AppHeader,
        AppFooter
    }
}
</script>
