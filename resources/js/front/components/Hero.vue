<template>
  <section class="section-hero">
    <div class="container-fluid">
      <div class="row hero_container d-flex">
        <div
          class="
            col-sm-12 col-md-5
            d-flex
            flex-column
            justify-content-center
            text-left
            hero_title
          "
        >
          <h1>I ristoranti che ami, a domicilio in 32 minuti</h1>
        </div>
        <div class="hero_img col-sm-12 col-md-7">
          <img src="../img/hero.png" alt="Hero image" />
        </div>
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

.section-hero {
    // border: 3px solid black;
}
.container-fluid {
  background-color: $mainColor;
  // border: 1px solid red;
  margin-right: 200px;
}
.hero_container {
  @include centered;
//   margin-bottom: 200px;
padding: 100px 0;
  h1 {
    color: $basicColor;
    font-weight: 600;
    padding-bottom: 30px;
    max-width: 100%;
  }
  .hero_img {
    // border: 5px solid red;
    padding: 0;
    img {
      // border: 5px solid blue;
      width: 100%;
      min-height: 100%;
    }
  }
}
.hero_title {
  // border: 5px solid green;
}

</style>