<template>
    <form method="post" action="">
        <header>
            <h1>{{ pagetitle }}</h1>
        </header>
    </form>
</template>

<script>
    export default {
        props: [ 'pagetitle' ],
    };
</script>
