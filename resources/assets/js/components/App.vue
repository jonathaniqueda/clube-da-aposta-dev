<template>
    <div>
        <login></login>
    </div>
</template>

<script>
    import Login from './login/Login.vue';

    export default {
        name: 'app',
        created() {
            if(jwtToken.getToken()) {
                this.$store.dispatch('setAuthUser');
            }
        },
        components: {
            Login,
        }
    }
</script>
