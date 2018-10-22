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

    <div
      id="post-title-row"
      class="form-row">
      <label for="post-title">Title</label>
      <input
        id="post-title"
        v-model="postTitle"
        type="text"
        name="post-title">

      <div class="generated-url-container">
        URL: <code class="generated-url">{{ postSlug }}</code>
      </div>
    </div>

    <div
      id="post-excerpt-row"
      class="form-row">
      <label for="post-excerpt">Excerpt</label>
      <input
        id="post-excerpt"
        v-model="postExcerpt"
        type="text"
        name="post-excerpt">
    </div>

    <wysiwyg
      label="Body"
      identifier="post-content"/>

    <div class="form-row">
      <button
        class="submit-button"
        @click="attemptStore">
        <i class="fas fa-save"/>
        Save
      </button>
    </div>
  </form>
</template>

<script>
    /**
     * Internal
     */
    import page from '../../mixins/page.js';

    /**
     * Classes
     */
    import Post from '../../library/post.js';

    export default {
        mixins: [page],
        data: () => ({
            postBody: '',
            postExcerpt: '',
            postTitle: '',
            postSlug: 'Add a title to generate the URL',
        }),
        methods: {
            /**
             * Submits data provided by the user to see if it's valid.
             */
            attemptStore (event) {
                event.preventDefault();

                const api = new Post();
                api.store()
                    .then(response => {
                        //
                    }).catch(response => {
                        //
                    });
            },
        },
    };
</script>
