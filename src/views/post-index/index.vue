<template>
  <section id="post-index-container">
    <h1>{{ pagetitle }}</h1>
    <p v-if="'undefined' === typeof posts || null === posts || 0 === posts.length">
      Nothing here. You should write something!
    </p>
  </section>
</template>

<script>
    import page from '../../mixins/page.js';

    export default {
        mixins: [page],
        computed: {
            posts () {
                return this.$store.state.posts
            }
        },
    };
</script>
