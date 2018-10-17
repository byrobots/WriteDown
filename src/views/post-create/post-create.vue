<template>
  <div id="post-create-container">
    <header>
      <h1 
        class="pagetitle" 
        v-text="pagetitle"/>
    </header>
  </div>
</template>

<script>
    import page from '../../mixins/page.js';

    export default {
        mixins: [page],
    };
</script>
