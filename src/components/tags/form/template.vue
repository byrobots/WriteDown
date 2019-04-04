<template>
  <section class="tag-form" id="tag-form-container">
    <form
      v-if="true === showForm"
      id="tag-form"
      method="post"
    >
      <div
        id="name-row"
        class="form-row"
      >
        <label for="name">Name</label>
        <span
          v-if="null !== errors.name"
          class="single-error"
        >
          <i class="fas fa-exclamation" />
          {{ errors.name }}
        </span>

        <input
          id="tag"
          v-model="tag.name"
          type="text"
          name="tag"
        >
      </div>

      <div class="form-row">
        <button
          class="submit-button"
          @click="attemptStore"
        >
          Add New Tag
        </button>
      </div>
    </form>

    <error-icon v-if="true === showErrorIcon" />
    <spinner v-if="true === showSpinner" />
    <success-icon v-if="true === showSuccessIcon" />
  </section>
</template>

<script src="./component.js"></script>
