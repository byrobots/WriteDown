<template>
  <section id="post-create">
    <header>
      <h1
        class="pagetitle"
        v-text="pagetitle"/>
    </header>

    <post-form action="/admin/posts" />
  </section>
</template>

<script>
    /**
     * Internal
     */
    import page from '../../mixins/page.js';
    import postForm from '../../components/post-form';

    export default {
        components: {postForm},
        mixins: [page],
    };
</script>
