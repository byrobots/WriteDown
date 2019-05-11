<template>
  <nav class="pagination">
    <ul class="pagination__list">
      <li
        v-if="pagination.current_page > 1"
        class="pagination__item pagination__item-prev"
      >
        <a
          class="pagination__link"
          @click="gotoPage(pagination.current_page-1)"
        >
          &lt; Prev
        </a>
      </li><!--

      --><li
        v-for="index in pagination.total_pages"
        :key="index"
        class="pagination__item"
      >
        <!-- An active link. -->
        <a
          v-if="index !== pagination.current_page"
          class="pagination__link"
          @click="gotoPage(index)"
        >
          {{ index }}
        </a>

        <!-- Disabled item for the current page. -->
        <span
          v-if="index === pagination.current_page"
          class="pagination__link pagination__link-disabled pagination__link-current"
        >
          {{ index }}
        </span>
      </li><!--

      --><li
        v-if="pagination.current_page < pagination.total_pages"
        class="pagination__item pagination__item-next"
      >
        <a
          class="pagination__link"
          @click="gotoPage(pagination.current_page+1)"
        >
          Next &gt;
        </a>
      </li>
    </ul>
  </nav>
</template>

<script src="./component.js"></script>
