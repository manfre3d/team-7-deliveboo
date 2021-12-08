<template>
<div class="container-xxl">
<!-- Hero section -->
  <section id="hero" class="d-flex align-items-center">
    <div
      class="
        container
        position-relative
        text-center text-lg-start
        aos-init aos-animate
      "
      data-aos="zoom-in"
      data-aos-delay="100"
    >
      <div class="row">
        <div class="col-lg-8">
          <h1>Benvenuto all'<span>Antica locanda</span></h1>
          <h2>2 stelle Michelin dal 1983</h2>

          <div class="btns">
            <a href="#menu" class="btn-menu animated fadeInUp scrollto"
              >Our Menu</a
            >
          </div>
        </div>
        <div
          class="
            col-lg-4
            d-flex
            align-items-center
            justify-content-center
            position-relative
            aos-init aos-animate
          "
          data-aos="zoom-in"
          data-aos-delay="200"
        >
          <a
            href="https://www.youtube.com/watch?v=u6BOC7CDUTQ"
            class="glightbox play-btn"
          ></a>
        </div>
      </div>
    </div>
  </section>
<!-- End Hero section -->

<!-- Menu section -->
<section id="menu" class="menu section-bg">
      <div class="container aos-init aos-animate" data-aos="fade-up">

        <div class="section-title">
          <h2>Menu</h2>
          <p>Ecco le nostre specialità</p>
        </div>

    
        <div class="row menu-container aos-init aos-animate" data-aos="fade-up" data-aos-delay="200" style="position: relative; height: 600px;">

          <div class="col-lg-6 menu-item " >
            <img src="../img/lobster-bisque.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Lobster Bisque</a><span>$5.95</span>
            </div>
            <div class="menu-ingredients">
              Lorem, deren, trataro, filede, nerada
            </div>
          </div>

          <div class="col-lg-6 menu-item">
            <img src="../img/bread-barrel.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Bread Barrel</a><span>$6.95</span>
            </div>
            <div class="menu-ingredients">
              Lorem, deren, trataro, filede, nerada
            </div>
          </div>

          <div class="col-lg-6 menu-item">
            <img src="../img/cake.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Crab Cake</a><span>$7.95</span>
            </div>
            <div class="menu-ingredients">
              A delicate crab cake served on a toasted roll with lettuce and tartar sauce
            </div>
          </div>

          <div class="col-lg-6 menu-item">
            <img src="../img/caesar.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Caesar Selections</a><span>$8.95</span>
            </div>
            <div class="menu-ingredients">
              Lorem, deren, trataro, filede, nerada
            </div>
          </div>

          <div class="col-lg-6 menu-item">
            <img src="../img/lobster-bisque.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Tuscan Grilled</a><span>$9.95</span>
            </div>
            <div class="menu-ingredients">
              Grilled chicken with provolone, artichoke hearts, and roasted red pesto
            </div>
          </div>

          <div class="col-lg-6 menu-item">
            <img src="../img/lobster-bisque.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Mozzarella Stick</a><span>$4.95</span>
            </div>
            <div class="menu-ingredients">
              Lorem, deren, trataro, filede, nerada
            </div>
          </div>

          <div class="col-lg-6 menu-item">
            <img src="../img/lobster-bisque.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Greek Salad</a><span>$9.95</span>
            </div>
            <div class="menu-ingredients">
              Fresh spinach, crisp romaine, tomatoes, and Greek olives
            </div>
          </div>

          <div class="col-lg-6 menu-item">
            <img src="../img/lobster-bisque.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Spinach Salad</a><span>$9.95</span>
            </div>
            <div class="menu-ingredients">
              Fresh spinach with mushrooms, hard boiled egg, and warm bacon vinaigrette
            </div>
          </div>

          <div class="col-lg-6 menu-item">
            <img src="../img/lobster-bisque.jpg" class="menu-img" alt="">
            <div class="menu-content">
              <a href="#">Lobster Roll</a><span>$12.95</span>
            </div>
            <div class="menu-ingredients">
              Plump lobster meat, mayo and crisp lettuce on a toasted bulky roll
            </div>
          </div>

        </div>

      </div>
    </section>
<!-- End menu section -->
</div>

</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
/*--------------------------------------------------------------
# Hero Section
--------------------------------------------------------------*/
#hero {
  width: 100%;
  height: 100vh;
  background: url("../img/hero-bg.jpg") top center;
  background-size: cover;
  position: relative;
  padding: 0;
}
#hero:before {
  content: "";
  background: rgba(0, 0, 0, 0.5);
  position: absolute;
  bottom: 0;
  top: 0;
  left: 0;
  right: 0;
}
#hero .container {
  padding-top: 110px;
}
@media (max-width: 992px) {
  #hero .container {
    padding-top: 98px;
  }
}
#hero h1 {
  margin: 0;
  font-size: 48px;
  font-weight: 700;
  line-height: 56px;
  color: #fff;
  font-family: "Poppins", sans-serif;
}
#hero h1 span {
  color: #cda45e;
}
#hero h2 {
  color: #eee;
  margin-bottom: 10px 0 0 0;
  font-size: 22px;
}
#hero .btns {
  margin-top: 30px;
}
#hero .btn-menu, #hero .btn-book {
  font-weight: 600;
  font-size: 13px;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  display: inline-block;
  padding: 12px 30px;
  border-radius: 50px;
  transition: 0.3s;
  line-height: 1;
  color: white;
  border: 2px solid #cda45e;
}
#hero .btn-menu:hover, #hero .btn-book:hover {
  background: #cda45e;
  color: #fff;
}
#hero .btn-book {
  margin-left: 15px;
}
#hero .play-btn {
  width: 94px;
  height: 94px;
  background: radial-gradient(#cda45e 50%, rgba(205, 164, 94, 0.4) 52%);
  border-radius: 50%;
  display: block;
  position: relative;
  overflow: hidden;
}
#hero .play-btn::after {
  content: "";
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translateX(-40%) translateY(-50%);
  width: 0;
  height: 0;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  border-left: 15px solid #fff;
  z-index: 100;
  transition: all 400ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
}
#hero .play-btn::before {
  content: "";
  position: absolute;
  width: 120px;
  height: 120px;
  -webkit-animation-delay: 0s;
  animation-delay: 0s;
  -webkit-animation: pulsate-btn 2s;
  animation: pulsate-btn 2s;
  -webkit-animation-direction: forwards;
  animation-direction: forwards;
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite;
  -webkit-animation-timing-function: steps;
  animation-timing-function: steps;
  opacity: 1;
  border-radius: 50%;
  border: 5px solid rgba(205, 164, 94, 0.7);
  top: -15%;
  left: -15%;
  background: rgba(198, 16, 0, 0);
}
#hero .play-btn:hover::after {
  border-left: 15px solid #cda45e;
  transform: scale(20);
}
#hero .play-btn:hover::before {
  content: "";
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translateX(-40%) translateY(-50%);
  width: 0;
  height: 0;
  border: none;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
  border-left: 15px solid #fff;
  z-index: 200;
  -webkit-animation: none;
  animation: none;
  border-radius: 0;
}
@media (min-width: 1024px) {
  #hero {
    background-attachment: fixed;
  }
}
@media (max-width: 992px) {
  #hero .play-btn {
    margin-top: 30px;
  }
}
@media (max-height: 500px) {
  #hero {
    height: auto;
  }
  #hero .container {
    padding-top: 130px;
    padding-bottom: 60px;
  }
}
@media (max-width: 768px) {
  #hero h1 {
    font-size: 28px;
    line-height: 36px;
  }
  #hero h2 {
    font-size: 18px;
    line-height: 24px;
  }
}

@-webkit-keyframes pulsate-btn {
  0% {
    transform: scale(0.6, 0.6);
    opacity: 1;
  }
  100% {
    transform: scale(1, 1);
    opacity: 0;
  }
}

@keyframes pulsate-btn {
  0% {
    transform: scale(0.6, 0.6);
    opacity: 1;
  }
  100% {
    transform: scale(1, 1);
    opacity: 0;
  }
}

/*--------------------------------------------------------------
# Sections General
--------------------------------------------------------------*/
section {
  padding: 60px 0;
  overflow: hidden;
}

.section-bg {
  background-color: #1a1814;
}

.section-title {
  padding-bottom: 40px;
}
.section-title h2 {
  font-size: 14px;
  font-weight: 500;
  padding: 0;
  line-height: 1px;
  margin: 0 0 5px 0;
  letter-spacing: 2px;
  text-transform: uppercase;
  color: #aaaaaa;
  font-family: "Poppins", sans-serif;
}
.section-title h2::after {
  content: "";
  width: 120px;
  height: 1px;
  display: inline-block;
  background: rgba(255, 255, 255, 0.2);
  margin: 4px 10px;
}
.section-title p {
  margin: 0;
  margin: 0;
  font-size: 36px;
  font-weight: 700;
  font-family: "Playfair Display", serif;
  color: #cda45e;
}


/*--------------------------------------------------------------
# Menu Section
--------------------------------------------------------------*/
.menu #menu-flters {
  padding: 0;
  margin: 0 auto 0 auto;
  list-style: none;
  text-align: center;
  border-radius: 50px;
}
.menu #menu-flters li {
  cursor: pointer;
  display: inline-block;
  padding: 8px 12px 10px 12px;
  font-size: 16px;
  font-weight: 500;
  line-height: 1;
  color: #fff;
  margin-bottom: 10px;
  transition: all ease-in-out 0.3s;
  border-radius: 50px;
  font-family: "Playfair Display", serif;
}
.menu #menu-flters li:hover, .menu #menu-flters li.filter-active {
  color: #cda45e;
}
.menu #menu-flters li:last-child {
  margin-right: 0;
}
.menu .menu-item {
  margin-top: 50px;
}
.menu .menu-img {
  width: 70px;
  border-radius: 50%;
  float: left;
  border: 5px solid rgba(255, 255, 255, 0.2);
}
.menu .menu-content {
  margin-left: 85px;
  overflow: hidden;
  display: flex;
  justify-content: space-between;
  position: relative;
}
.menu .menu-content::after {
  content: "......................................................................" "...................................................................." "....................................................................";
  position: absolute;
  left: 20px;
  right: 0;
  top: -4px;
  z-index: 1;
  color: #bab3a6;
  font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
}
.menu .menu-content a {
  padding-right: 10px;
  background: #1a1814;
  position: relative;
  z-index: 3;
  font-weight: 700;
  color: white;
  transition: 0.3s;
}
.menu .menu-content a:hover {
  color: #cda45e;
}
.menu .menu-content span {
  background: #1a1814;
  position: relative;
  z-index: 3;
  padding: 0 10px;
  font-weight: 600;
  color: #cda45e;
}
.menu .menu-ingredients {
  margin-left: 85px;
  font-style: italic;
  font-size: 14px;
  font-family: "Poppins", sans-serif;
  color: rgba(255, 255, 255, 0.5);
}

</style>