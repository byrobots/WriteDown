<template>
    <section id="login-form-container">
        <form
            v-if="true === showForm"
            id="login-form"
            method="post"
            action=""
        >
            <div class="form-row">
                <label for="email">Email</label>
                <input id="email" v-model="email" type="email" name="email">
            </div>

            <div class="form-row">
                <label for="password">Password</label>
                <input id="password" v-model="password" type="password" name="password">
            </div>

            <div class="form-row">
                <button class="submit-button" @click="attemptLogin">
                    <i class="fas fa-unlock-alt" />
                    Login
                </button>
            </div>
        </form>

        <error-icon v-if="true === showErrorIcon" />
        <spinner v-if="true === showSpinner" />
        <success-icon v-if="true === showSuccessIcon" />
    </section>
</template>

<script src="./component.js"></script>
