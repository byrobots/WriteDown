<template>
  <section>
    <ul
      class="tag-list"
    >
      <li
        v-for="(tag, index) in tags"
        :key="tag.id"
        class="tag-list__item"
      >
        {{ tag.name }}
        <a
          href="#"
          class="tag-list__delete-button"
          :data-index="index"
          :data-tag="tag.id"
          @click="confirmDelete"
        >
          <i class="fas fa-trash" />
        </a>
      </li>
    </ul>
  </section>
</template>

<script src="./component.js"></script>
