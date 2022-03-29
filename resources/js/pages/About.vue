<template>
  <div class="home">
    <h1>After Login</h1>

    <div v-if="!isLogging">
      <h2>Hi, User</h2>

    </div>

  </div>
</template>

<script>
export default {
  data() {
    return {
      data: {
        email: 'hi',
        password: 'pass',
      },
      isLogging: false,
    };
  },
  methods: {},
};
</script>