<template>
    <div id="login-container">
        <header>
            <h1>{{ pagetitle }}</h1>
        </header>

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
