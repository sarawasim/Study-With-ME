<template>
  <div class="container">
    <!-- <navbar /> -->
    <router-view />

  </div>
</template>

<script>
// import Navbar from './components/Navbar.vue';
export default {
  // components: { Navbar },
  computed: {},
  data() {
    return {
      isLoggedIn: '',
    };
  },
  methods: {},
};
</script>

<style>
@import '../css/app.css';
</style>