<template>
  <section>
    <form
      v-if="true === showForm"
      id="login-form"
      class="form"
      action
      method="post"
    >
      <div class="form__row">
        <label
          class="form__label"
          for="email"
        >Email</label>
        <input
          id="email"
          v-model="email"
          class="form__control form__input"
          type="email"
          name="email"
        >
      </div>

      <div class="form__row">
        <label
          class="form__label"
          for="password"
        >Password</label>
        <input
          id="password"
          v-model="password"
          class="form__control form__input"
          type="password"
          name="password"
        >
      </div>

      <div class="form__row">
        <button
          class="form__control button"
          @click="attemptLogin"
        >
          Login
        </button>
      </div>
    </form>

    <error-icon v-if="true === showErrorIcon" />
    <spinner v-if="true === showSpinner" />
    <success-icon v-if="true === showSuccessIcon" />
  </section>
</template>

<script src="./component.js"></script>
