<template>
  <section>
    <form
      v-if="true === showForm"
      class="form form-tag"
      method="post"
    >
      <span
        v-if="null !== errors.name"
        class="alert alert__error"
      >
        <i class="fas fa-exclamation" />
        {{ errors.name }}
      </span>

      <div class="form__row form-tag__input">
        <label
          class="form__label"
          for="name"
        >Name</label>

        <input
          id="tag"
          v-model="tag.name"
          class="form__control form__input"
          type="text"
          name="tag"
        >
      </div>

      <div class="form-tag__button">
        <button
          class="button"
          @click="attemptStore"
        >
          Add Tag
        </button>
      </div>
    </form>

    <error-icon v-if="true === showErrorIcon" />
    <spinner v-if="true === showSpinner" />
    <success-icon v-if="true === showSuccessIcon" />
  </section>
</template>

<script src="./component.js"></script>
