<template>
    <post-index />
</template>

<script>
    /**
     * Internal
     */
    import postForm from '../../components/posts/index';
    import template from '../../mixins/template.js';

    export default {
        components: {postForm},
        mixins: [template],
    };
</script>
