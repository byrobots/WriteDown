<template>
  <form
    id="post-create-container"
    action=""
    method="post">
    <header>
      <h1
        class="pagetitle"
        v-text="pagetitle"/>
    </header>

    <div class="form-row">
      <label for="post-title">Title</label>
      <input 
        id="post-title" 
        type="text" 
        name="post-title">
    </div>

    <div class="form-row">
      <label for="post-excerpt">Excerpt</label>
      <input 
        id="post-excerpt" 
        type="text" 
        name="post-excerpt">
    </div>

    <wysiwyg 
      label="Body" 
      identifier="post-content"/>

    <div class="form-row">
      <button
        class="submit-button">
        <i class="fas fa-save"/>
        Save
      </button>
    </div>
  </form>
</template>

<script>
    import page from '../../mixins/page.js';

    export default {
        mixins: [ page ],
    };
</script>
