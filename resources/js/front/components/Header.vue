<template>
  <header class="container-fluid">
    <nav class="navbar navbar-expand-md navbar-dark">
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse collapse" id="navbarsExample04" style="">
        <ul class="navbar-nav mr-auto flex-grow-1">
          <li class="nav-item active">
            <div class="logo d-flex align-items-center">
              <img src="https://newsmondo.it/wp-content/uploads/2021/08/FB_Deliveroo.jpg" alt="Deliveboo logo">
              <router-link :to="{ name: 'Home' }" class="nav-link text-white">
              <h2>Deliveboo</h2>
              <span class="sr-only">(current)</span>
            </router-link>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav mr-auto login">
          <li class="nav-item back-link">
            <a class="nav-link text-white" href="/login">Accedi</a>
          </li>
          <li class="nav-item back-link">
            <a class="nav-link text-white" href="/register">Registrati</a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
</template>

<script>
export default {
  name: "Header",
};
</script>

<style lang="scss" scoped>
@import "../../../sass/front/variables.scss";
  header {
    background: $mainColor;
  }
.logo {
  img {
    width: 4.37rem;
  }
  h2{
    font-size: 2rem;
  }
}
.login{
  li{
   a{
    color: #fff;
    font-size: 1.06rem;
    font-weight: 500;
  } 
}
}
</style>