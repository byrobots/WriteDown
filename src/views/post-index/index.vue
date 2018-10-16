<template>
  <section id="post-index-container">
    <h1 
      class="pagetitle" 
      v-text="pagetitle"/>
    <div v-if="!posts || posts.length < 1">
      <p>
        Nothing here. You should write something!
      </p>

      <div class="call-to-action">
        <a 
          href="#" 
          class="button">
          Let&rsquo;s do that
        </a>
      </div>
    </div>
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
