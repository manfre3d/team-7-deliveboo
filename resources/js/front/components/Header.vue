<template>
   <header>
       <router-link :to="{ name: 'home' }">Homepage</router-link>
     
       <!-- <router-link :to="{ name: 'test1' }">Pagina test1 (frontoffice)</router-link> -->
       <!-- <router-link :to="{ name: 'test2' }">Pagina test2(frontoffice)</router-link> -->
       <a href="/login">Accedi</a>
       <a href="/register">Registrati</a>

   </header>
</template>

<script>
export default {
    name: "Header",

}
</script>

<style lang="scss" scoped>
@import "../../../sass/front/variables.scss";
header {
    background-color: $greenMain;
    display: flex;
    justify-content: space-evenly;
    padding: 30px;
}

router-link,
a {
    font-size: 26px;
}

</style>