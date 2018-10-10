<template>
    <section id="login-form-container">
        <form method="post" action="" id="login-form" v-if="true === showForm">
            <div class="form-row">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" v-model="email">
            </div>

            <div class="form-row">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" v-model="password">
            </div>

            <div class="form-row">
                <button class="submit-button" v-on:click="attemptLogin">
                    <i class="fas fa-unlock-alt"></i>
                    Login
                </button>
            </div>
        </form>

        <spinner v-if="true === showSpinner" />
        <erroricon v-if="true === showErrorIcon" />
    </section>
</template>

<script src="./component.js"></script>
