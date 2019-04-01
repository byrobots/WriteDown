<template>
  <section>
    <p v-if="null !== tags && tags.length < 1">
      No tags yet. Why not add some?
    </p>

    <ul
      id="tags-list"
      class="tags-list"
    >
      <li
        v-for="tag in tags"
        :key="tag.id"
      >
        {{ tag.name }}
      </li>
      <li class="tag-form-item">
        <a
          href="#"
          @click="toggleForm"
        ><i class="fas fa-plus" /> Add Tag</a>
        <tag-form v-if="formVisible" />
      </li>
    </ul>
  </section>
</template>

<script src="./component.js"></script>
