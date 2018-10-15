<template>
  <div id="login-container">
    <header>
      <h1 v-text="pagetitle"/>
    </header>

    <login-form />
    <footer-signoff />
  </div>
</template>

<script>
    import page from '../../mixins/page.js';

    export default {
        mixins: [page],
        computed: {
            pagetitle () {
                return this.$store.state.pagetitle;
            }
        },
    };
</script>
