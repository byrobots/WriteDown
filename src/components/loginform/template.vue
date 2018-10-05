<template>
    <form method="post" action="" class="login-form">
        <div class="form-row">
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
        </div>

        <div class="form-row">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>

        <div class="form-row">
            <button class="submit-button">
                <i class="fas fa-unlock-alt"></i>
                Login
            </button>
        </div>
    </form>
</template>

<script>
    export default { };
</script>
