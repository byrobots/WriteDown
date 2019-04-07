<template>
  <section>
    <form
      v-if="true === showForm"
      class="form"
      id="login-form"
      action
      method="post"
    >
      <div class="form--row">
        <label class="form--label" for="email">Email</label>
        <input
          class="form--control form--input"
          id="email"
          v-model="email"
          type="email"
          name="email"
        />
      </div>

      <div class="form--row">
        <label class="form--label" for="password">Password</label>
        <input
          class="form--control form--input"
          id="password"
          v-model="password"
          type="password"
          name="password"
        />
      </div>

      <div class="form--row">
        <button
          class="form--control button"
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
