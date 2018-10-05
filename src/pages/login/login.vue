<template>
    <div id="login-container">
        <loginform v-bind:pagetitle="pagetitle"></loginform>
    </div>
</template>

<script>
    export default {
        computed: {
            pagetitle () {
                return this.$store.state.pagetitle;
            }
        },
    };
</script>

<style lang="scss">
    #login-container {
        display: flex;
        width: 100%;
        height: 100%;
        align-items: center;
        justify-content: center;
    }
</style>
