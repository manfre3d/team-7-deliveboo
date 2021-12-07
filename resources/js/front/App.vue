<template>
  <div>
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
import axios from "axios";

export default {
  name: "App",

  components: {
    Header,
    Footer,
  },
  methods: {
    getPlates() {
      axios
        .get(
          "http://localhost/phpMyAdmin/sql.php?server=1&db=deliveboo&table=users&pos=15"
        )
        .then((response) => (this.users = response.data))
        .catch((error) => console.log(error.message));
    },
  },
  mounted() {
    axios
      .get("http://localhost/phpMyAdmin/sql.php?server=1&db=deliveboo&table=users&pos=15")
      .then((response) => {
        this.results = response.data[1];
        console.log(this.results);
      })
      .catch((err) => {
        throw err;
      });
  },
};
</script>

<style lang="scss">
</style>