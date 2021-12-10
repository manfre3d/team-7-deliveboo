<template>
  <div id="app_container">
    <Header />
    <main>
      <router-view></router-view>
    </main>
    <Footer />
  </div>
</template>

<script>
import Header from "./components/Header.vue";
import Footer from "./components/Footer.vue";

export default {
  name: "App",

  components: {
    Header,
    Footer,
  },
    
};
</script>

<style lang="scss">
body{
  height: 100vh;
  #app_container{
    display: flex;
    flex-direction: column;
    height: 100%;
    main{
      flex-grow: 1;
    }
  }
}
</style>