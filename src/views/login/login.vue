<template>
    <div id="login-container">
        <header>
            <h1 v-text="pagetitle"></h1>
        </header>

        <login-form />
        <footer-signoff />
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
