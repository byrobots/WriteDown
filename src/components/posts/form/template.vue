<template>
  <section class="post-form-container">
    <form
      v-if="true === showForm"
      id="post-form"
      class="form"
      method="post"
    >
      <div class="form__row">
        <label
          class="form__label"
          for="post-title"
        >Title</label>
        <span
          v-if="null !== errors.title"
          class="alert alert__error"
        >
          <i class="fas fa-exclamation" />
          {{ errors.title }}
        </span>

        <input
          id="post-title"
          v-model="post.title"
          class="form__control form__input"
          type="text"
          name="post-title"
          @change="predictedSlug"
        >

        <div class="generated-url">
          URL:
          <code class="generated-url__slug">{{ post.slug }}</code>
        </div>
      </div>

      <div class="form__row">
        <label
          class="form__label"
          for="post-publish-at"
        >Publish at</label>
        <span
          v-if="null !== errors.publishAt"
          class="alert alert__error"
        >
          <i class="fas fa-exclamation" />
          {{ errors.publishAt }}
        </span>

        <flat-pickr
          v-model="post.publishAt"
          :config="{
            altInput: true,
            altInputClass: 'form__control form__input',
            dateFormat: 'Y-m-d H:i:S',
            enableTime: true,
            time_24hr: true,
          }"
        />
      </div>

      <div class="form__row">
        <label
          class="form__label"
          for="post-excerpt"
        >Excerpt</label>
        <span
          v-if="null !== errors.excerpt"
          class="alert alert__error"
        >
          <i class="fas fa-exclamation" />
          {{ errors.excerpt }}
        </span>

        <textarea
          id="post-excerpt"
          v-model="post.excerpt"
          class="form__control form__textarea"
          type="text"
          name="post-excerpt"
        />
      </div>

      <div class="form__row form__row--compacted">
        <label
          class="form__label"
          for="post-body"
        >Body</label>
        <span
          v-if="null !== errors.body"
          class="alert alert__error"
        >
          <i class="fas fa-exclamation" />
          {{ errors.body }}
        </span>

        <textarea
          id="post-body"
          v-model="post.body"
          class="wysiwyg-editor form__control form__textarea"
          name="post-body"
        />
      </div>

      <input
        v-model="post.id"
        type="hidden"
        name="postId"
      >

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
