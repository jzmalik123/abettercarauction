<script setup lang="ts">
const data: Object[] = [
  { link: "https://modeltheme.ticksy.com/", content: "Get Help" },
  {
    link: "https://modeltheme.com/theme-category/wordpress-plugins/",
    content: "More Plugins",
  },
  {
    link: "https://modeltheme.com/theme-category/wordpress-themes/",
    content: "More Themes",
  },
];
</script>

<template>
  <a-card title="Useful Links">
    <p>Let's keep in touch!</p>
    <br/>
    <a-list bordered :data-source="data">
      <template #renderItem="{ item }">
        <a-list-item>
          <a target="_blank" :href="item.link">{{ item.content }}</a>
        </a-list-item>
      </template>
    </a-list>
  </a-card>
</template>

<style></style>
