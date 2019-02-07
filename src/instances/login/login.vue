<template>
    <div id="login-container">
        <header>
            <h1 v-text="pagetitle" />
        </header>

        <login-form />

        <footer class="sign-off">
            <a href="https://github.com/by-robots/writedown">WriteDown</a>,
            a project <a href="https://by-robots.com">By Robots</a>.
        </footer>
    </div>
</template>

<script>
    /**
     * Internal.
     */
    import loginForm from '../../components/login-form';
    import template from '../../mixins/template.js';

    export default {
        components: {loginForm},
        mixins: [template],
    };
</script>
