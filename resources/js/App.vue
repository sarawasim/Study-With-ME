<template>
  <div>
    <navbar/>
    {{message}}
    <router-view/>
  </div>
</template>

<script>
import Navbar from './components/Navbar.vue';

export default {
  components: { Navbar },
  computed: {},
  data() {
      return {
          message:'Hello World :)'
      }
  }
};
</script>