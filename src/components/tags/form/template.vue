<template>
  <section>
    <form
      v-if="true === showForm"
      class="form"
      method="post"
    >
      <div class="form--row">
        <label
          class="form--label"
          for="name"
        >Name</label>
        <span
          v-if="null !== errors.name"
          class="alert alert--error"
        >
          <i class="fas fa-exclamation" />
          {{ errors.name }}
        </span>

        <input
          id="tag"
          v-model="tag.name"
          class="form--control form--input"
          type="text"
          name="tag"
        >
      </div>

      <button
        class="button"
        @click="attemptStore"
      >
        Add New Tag
      </button>
    </form>

    <error-icon v-if="true === showErrorIcon" />
    <spinner v-if="true === showSpinner" />
    <success-icon v-if="true === showSuccessIcon" />
  </section>
</template>

<script src="./component.js"></script>
