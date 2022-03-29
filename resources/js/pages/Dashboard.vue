<template>
  <div class="dashboard-container">
    <profile />
    <room />
  </div>
</template>

<script>
import Room from '../components/Room.vue';
import Profile from '../components/Profile.vue';

export default {
  components: { Room, Profile },
};
</script>

<style>
  @import '../../css/dashboard.css';
</style>