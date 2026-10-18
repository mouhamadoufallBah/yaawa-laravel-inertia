<script setup>
defineProps({
  category: Object,
});
</script>

<template>
  <button
    class="category"
    href="categories/cereales.html"
    :style="{ background: category.color }"
  >
    <img alt="" height="48" :src="`assets/${category.image}`" width="56" />
    <span> {{ category.name }} </span>
  </button>
</template>

<style>
</style>