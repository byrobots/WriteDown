<template>
  <section class="post-form-container">
    <form
      v-if="true === showForm"
      class="form"
      id="post-form"
      method="post"
    >
      <div class="form--row">
        <label class="form--label" for="post-title">Title</label>
        <span
          v-if="null !== errors.title"
          class="alert alert--error"
        >
          <i class="fas fa-exclamation" />
          {{ errors.title }}
        </span>

        <input
          class="form--control form--input"
          id="post-title"
          v-model="post.title"
          type="text"
          name="post-title"
          @change="predictedSlug"
        >

        <div class="generated-url">
          URL:
          <code class="generated-url--slug">{{ post.slug }}</code>
        </div>
      </div>

      <div class="form--row">
        <label class="form--label" for="post-publish-at">Publish at</label>
        <span
          v-if="null !== errors.publishAt"
          class="alert alert--error"
        >
          <i class="fas fa-exclamation" />
          {{ errors.publishAt }}
        </span>

        <flat-pickr
          v-model="post.publishAt"
          :config="{
            altInput: true,
            altInputClass: 'form--control form--input',
            dateFormat: 'Y-m-d H:i:S',
            enableTime: true,
            time_24hr: true,
          }"
        />
      </div>

      <div class="form--row">
        <label class="form--label" for="post-excerpt">Excerpt</label>
        <span
          v-if="null !== errors.excerpt"
          class="alert alert--error"
        >
          <i class="fas fa-exclamation" />
          {{ errors.excerpt }}
        </span>

        <textarea
          class="form--control form--textarea"
          id="post-excerpt"
          v-model="post.excerpt"
          type="text"
          name="post-excerpt"
        />
      </div>

      <div class="form--row form--row--compacted">
        <label class="form--label" for="post-body">Body</label>
        <span
          v-if="null !== errors.body"
          class="alert alert--error"
        >
          <i class="fas fa-exclamation" />
          {{ errors.body }}
        </span>

        <textarea
          class="wysiwyg-editor form--control form--textarea"
          id="post-body"
          v-model="post.body"
          name="post-body"
        />
      </div>

      <input
        v-model="post.id"
        type="hidden"
        name="postId"
      />

      <button
        class="button"
        @click="attemptStore"
      >
        Save
      </button>
    </form>

    <error-icon v-if="true === showErrorIcon" />
    <spinner v-if="true === showSpinner" />
    <success-icon v-if="true === showSuccessIcon" />
  </section>
</template>

<script src="./component.js"></script>
