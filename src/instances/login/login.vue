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
    /**
     * Internal.
     */
    import footerSignoff from '../../components/footer-signoff';
    import loginForm from '../../components/login-form';
    import page from '../../mixins/page.js';

    export default {
        components: {footerSignoff, loginForm},
        mixins: [page],
    };
</script>
