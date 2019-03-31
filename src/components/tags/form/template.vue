<template>
  <section id="tag-form-container">
    <form
      v-if="true === showForm"
      id="tag-form"
      method="post"
    >
      <div
        id="tag-row"
        class="form-row"
      >
        <label for="tag">Tag</label>
        <span
          v-if="null !== errors.tag"
          class="single-error"
        >
          <i class="fas fa-exclamation" />
          {{ errors.tag }}
        </span>

        <input
          id="tag"
          v-model="tag.tag"
          type="text"
          name="tag"
        >
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
