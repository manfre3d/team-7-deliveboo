<template>
  <section class="section-menu">
  <img src="../img/menu.png" alt="">

  </section>
</template>

<script>
export default {
    name: "Menu"

}
</script>

<style lang="scss" scoped>

section {
    // border: 1px solid;
    display: flex;
    justify-content: center;
    align-items: center;
    padding-top: 80px;
}

@media screen and (max-width: 576px){
    section {
        padding-top: 50px;
    }
    
    img {
        max-width: 400px;
    }
}

@media screen and (max-width: 360px){
    section {
        padding-top: 50px;
    }
    
    img {
        max-width: 350px;
    }
}

@media screen and (max-width: 330px){
    section {
        padding-top: 50px;
    }
    
    img {
        max-width: 300px;
    }
}

@media screen and (min-width: 766px){
    section {
        padding: 50px 0;
    }
}
</style>