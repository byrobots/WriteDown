<template>
  <section id="post-form-container">
    <form
      v-if="true === showForm"
      id="post-form"
      :action="action"
      method="post"
    >
      <input
        v-model="post.id"
        type="hidden"
        name="postId"
      >

      <div
        id="post-title-row"
        class="form-row"
      >
        <label for="post-title">Title</label>
        <span
          v-if="null !== errors.title"
          class="single-error"
        >
          <i class="fas fa-exclamation" />
          {{ errors.title }}
        </span>

        <input
          id="post-title"
          v-model="post.title"
          type="text"
          name="post-title"
          @change="predictedSlug"
        >

        <div class="generated-url-container">
          URL:
          <code class="generated-url">{{ post.slug }}</code>
        </div>
      </div>

      <div
        id="post-publish-at-row"
        class="form-row"
      >
        <label for="post-publish-at">Publish at</label>
        <span
          v-if="null !== errors.publishAt"
          class="single-error"
        >
          <i class="fas fa-exclamation" />
          {{ errors.publishAt }}
        </span>

        <flat-pickr
          v-model="post.publishAt"
          :config="{
            altInput: true,
            dateFormat: 'Y-m-d H:i:S',
            enableTime: true,
            time_24hr: true,
          }"
        />
      </div>

      <div
        id="post-excerpt-row"
        class="form-row"
      >
        <label for="post-excerpt">Excerpt</label>
        <span
          v-if="null !== errors.excerpt"
          class="single-error"
        >
          <i class="fas fa-exclamation" />
          {{ errors.excerpt }}
        </span>

        <input
          id="post-excerpt"
          v-model="post.excerpt"
          type="text"
          name="post-excerpt"
        >
      </div>

      <div class="form-row">
        <label for="post-body">Body</label>
        <span
          v-if="null !== errors.body"
          class="single-error"
        >
          <i class="fas fa-exclamation" />
          {{ errors.body }}
        </span>

        <textarea
          id="post-body"
          v-model="post.body"
          name="post-body"
          class="wysiwyg-editor"
        />
      </div>

      <div class="form-row">
        <button
          class="submit-button"
          @click="attemptStore"
        >
          <i class="fas fa-save" />
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
