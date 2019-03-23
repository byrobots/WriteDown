<template>
  <section>
    <p v-if="null !== tags && tags.length < 1">
      No tags yet. Why not add some?
    </p>

    <ul
      v-if="null !== tags && tags.length > 0"
      id="tags-list"
    >
      <li
        v-for="tag in tags"
        :key="tag.id"
      >
        {{ tag.tag }}
      </li>
    </ul>
  </section>
</template>

<script src="./component.js"></script>
