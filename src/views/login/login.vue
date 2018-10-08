<template>
    <div id="login-container">
        <header>
            <h1 v-text="pagetitle"></h1>
        </header>

        <loginform></loginform>
        <footersignoff />
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
