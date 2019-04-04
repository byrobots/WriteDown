<template>
  <section>
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
    </ul>

    <tag-form />
  </section>
</template>

<script src="./component.js"></script>
