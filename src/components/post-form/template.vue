<template>
  <section id="post-form-container">
    <form
      v-if="true === showForm"
      id="post-form"
      :action="action"
      method="post">

      <div
        id="post-title-row"
        class="form-row">
        <label for="post-title">Title</label>
        <span
          v-if="0 < errors.title.length"
          class="single-error">
            <i class="fas fa-exclamation"></i>
            {{ errors.title }}
        </span>

        <input
          id="post-title"
          v-model="post.title"
          type="text"
          name="post-title">

        <div class="generated-url-container">
          URL: <code class="generated-url">{{ post.slug }}</code>
        </div>
      </div>

      <div
        id="post-excerpt-row"
        class="form-row">
        <label for="post-excerpt">Excerpt</label>
        <span
          v-if="0 < errors.excerpt.length"
          class="single-error">
            <i class="fas fa-exclamation"></i>
            {{ errors.excerpt }}
        </span>

        <input
          id="post-excerpt"
          v-model="post.excerpt"
          type="text"
          name="post-excerpt">
      </div>

      <div class="form-row">
        <label for="post-body">Body</label>
        <span
          v-if="0 < errors.body.length"
          class="single-error">
            <i class="fas fa-exclamation"></i>
            {{ errors.body }}
        </span>

        <textarea
          id="post-body"
          v-model="post.body"
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

    <error-icon v-if="true === showErrorIcon" />
    <spinner v-if="true === showSpinner" />
    <success-icon v-if="true === showSuccessIcon" />
  </section>
</template>

<script src="./component.js"></script>
