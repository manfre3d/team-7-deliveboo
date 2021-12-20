<template>
  <section class="container-fluid">
      <div class="row hero_container d-flex">
        <div class="col-sm-12 col-md-6 d-flex justify-content-center align-items-center hero_title">
          <h1 data-aos="fade-down" data-aos-duration="800">I ristoranti che ami, a domicilio in 32 minuti</h1>
        </div>
        <div class="hero_img col-sm-12 col-md-6 d-flex justify-content-center">
          <img src="../img/hero.png" alt="Hero image">
        </div>
      </div>
  </section>
</template>

<script>
export default {
  name: "Hero",
};
</script>

<style lang="scss" scoped>
@import "../../../sass/front/variables.scss";
@mixin centered {
  max-width: 85%;
  margin: auto;
}
.container-fluid {
  background-color: $mainColor;
  margin-right: 12.5rem;
}
.hero_container {
  @include centered;
  padding-bottom: 1.25rem;
  h1 {
    color: $basicColor;
    font-weight: 600;
    padding-bottom: 1.87rem;
    max-width: 100%;
  }
  .hero_img {
    padding: 0;
    img {
      max-width: 140%;
      margin-right: 11.25rem;
    }
  }
}


</style>