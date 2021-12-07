<template>
   <header>
       <router-link :to="{ name: 'home' }">Homepage (frontoffice)</router-link>
       <br>
       <br>
       <br>

       <router-link :to="{ name: 'test1' }">Pagina test1 (frontoffice)</router-link>

       <br>
       <br>
       <br>
       <router-link :to="{ name: 'test2' }">Pagina test2(frontoffice)</router-link>
       <h1>sono header</h1>
       <a href="/admin">Admin</a>
   </header>
</template>

<script>
export default {
    name: "Header",

}
</script>

<style lang="scss" scoped>

</style>