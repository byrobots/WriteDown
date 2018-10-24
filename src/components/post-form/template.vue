<template>
  <form
    id="post-create-container"
    :action="action"
    method="post">

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

    <div class="form-row">
      <label for="post-body">Body</label>
      <textarea
        id="post-body"
        v-model="postBody"
        name="post-body"
        class="wysiwyg-editor"/>
    </div>

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

<script src="./component.js"></script>
