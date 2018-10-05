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
    import spinner from '../spinner';

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

                // TODO: Attempt to login with the details
            }
        },
    };
</script>
