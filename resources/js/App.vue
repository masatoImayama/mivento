<template>
  <div id="nav">
      <router-link to="/index">Index</router-link>
  </div>
  <p>App Vue !!</p>
  <router-view />
</template>

<script>
    export default {
        mounted() {
            console.log('App mounted.')
        }
    }
</script>