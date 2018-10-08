<template>
    <section id="login-form-container">
        <form method="post" action="" id="login-form" v-if="false === showSpinner">
            <div class="form-row">
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </div>

            <div class="form-row">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </div>

            <div class="form-row">
                <button class="submit-button" v-on:click="attemptLogin">
                    <i class="fas fa-unlock-alt"></i>
                    Login
                </button>
            </div>
        </form>

        <spinner v-if="true === showSpinner" />
    </section>
</template>

<script>
    /**
     * Components
     */
    import spinner from '../spinner';

    /**
     * Classes
     */
    import Do_Login from '../../classes/do-login.js';

    export default {
        components: { spinner },
        data () {
            return {
                showSpinner: false,
            };
        },
        methods: {
            attemptLogin (event) {
                event.preventDefault();
                this.showSpinner = true;

                const login = new Do_Login;
                login.make_request();
            }
        },
    };
</script>
