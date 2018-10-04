<template>
    <div id="login-container">
        <form method="post" action="">
            <header>
                <h1>{{pagetitle}}</h1>
            </header>
        </form>
    </div>
</template>

<script>
    export default {
        data: () => ({
            pagetitle: '',
        }),
        mounted: () => {
            this.pagetitle = this.$el.attributes['data-pagetitle'].value;
        },
    };
</script>

<style lang="scss">
    html,
    body {
        height: 100%;
    }

    #login-container {
        display: flex;
        width: 100%;
        height: 100%;
        align-items: center;
        justify-content: center;
    }

    form {
        padding: 1em;
        background: #fff;
    }
</style>
