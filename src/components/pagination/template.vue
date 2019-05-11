<template>
  <nav class="pagination">
    <ul class="pagination__list">
      <li
        v-if="pagination.current_page > 1"
        class="pagination__item pagination__item-prev"
      >
        Prev
      </li>

      <li
        v-for="index in pagination.total_pages"
        :key="index"
        class=""
      >
        <!-- An active link. -->
        <a
          v-if="index !== pagination.current_page"
          href=""
          class="pagination__link pagination__link-current"
        >{{ index }}</a>

        <!-- Disabled item for the current page. -->
        <span
          v-if="index === pagination.current_page"
          class="pagination__link pagination__link-disabled pagination__link-current"
        >{{ index }}</span>
      </li>

      <li
        v-if="pagination.current_page < pagination.total_pages"
        class="pagination__item pagination__item-next"
      >
        Next
      </li>
    </ul>
  </nav>
</template>

<script src="./component.js"></script>
