<template>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark">
      <button
        class="navbar-toggler collapsed"
        type="button"
        data-toggle="collapse"
        data-target="#navbarsExample04"
        aria-controls="navbarsExample04"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse collapse" id="navbarsExample04" style="">
        <ul class="navbar-nav mr-auto flex-grow-1">
          <li class="nav-item active">
            <div class="logo d-flex align-items-center">
              <img src="https://newsmondo.it/wp-content/uploads/2021/08/FB_Deliveroo.jpg" alt=""/>
              <router-link :to="{ name: 'Home' }" class="nav-link text-white">
              Homepage
              <span class="sr-only">(current)</span>
            </router-link>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav mr-auto">
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

.nav-link {
  &:hover {
    color: blue!important;
  }
}
.logo {
  img {
    width: 70px;
  }
}

</style>