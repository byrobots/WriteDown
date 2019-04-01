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
        v-for="(tag, index) in tags"
        :key="tag.id"
        class="tag-item"
      >
        {{ tag.name }}
        <a
          href="#"
          class="tag-delete-link"
          :data-index="index"
          :data-tag="tag.id"
          @click="confirmDelete"
        >
          <i class="fas fa-trash" />
        </a>
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
