<template>
   <footer>
        <div class="footer text-center container-fluid ">
        <div class="row m-0">

            <div class="col-6 col-md-3">
                <div class="pb-2" href="">Emanuela Mocci</div>
                <a href="https://github.com/EmanuelaMocci" target="_blank"><i class="fab fa-github-square fa-2x pr-1"></i></a>
                <a href="https://www.linkedin.com/in/emanuela-mocci-web-developer/" target="_blank"><i class="fab fa-linkedin fa-2x pl-1"></i></a>
            </div>

            <div class="col-6 col-md-3">
                <div class="pb-2" href="">Nicola Felice</div>
                <a href="https://github.com/nicola-felice" target="_blank"><i class="fab fa-github-square fa-2x pr-1"></i></a>
                <a href="" target="_blank"><i class="fab fa-linkedin fa-2x pl-1"></i></a>
            </div>

            <div class="col-6 col-md-3 mt-3 mt-md-0">
                <div class="pb-2" href="">Manfredi Piraino</div>
                <a href="https://github.com/manfred-commits" target="_blank"><i class="fab fa-github-square fa-2x pr-1"></i></a>
                <a href="https://www.linkedin.com/in/manfredi-piraino/" target="_blank"><i class="fab fa-linkedin fa-2x pl-1"></i></a>
            </div>

            <div class="col-6 col-md-3 mt-3 mt-md-0">
                <div class="pb-2" href="">Elia Raguso</div>
                <a href="https://github.com/eliaraguso" target="_blank"><i class="fab fa-github-square fa-2x pr-1"></i></a>
                <a href="https://www.linkedin.com/in/eliaraguso/" target="_blank"><i class="fab fa-linkedin fa-2x pl-1"></i></a>
            </div>


        </div>
    </div>
   </footer>
</template>

<script>
export default {
    name: "Footer",

}
</script>

<style lang="scss" scoped>
@import "../../../sass/front/variables.scss";
footer{
    width: 100%;
    margin-top: 30px;
    padding: 20px 0;
    background-color: $lightgray;
    color:$gold;
    bottom: 0;
    border-top: 1px solid $lightgray;

    a {
        color: $lightgrey-light;
       
        text-decoration: none;
    }
    
    a:hover 
    {
        color: $silver;
        text-decoration: none; 
        transition: color .2s ease-in-out !important;

    }
    .row{
        margin: 0;
    }

}



</style>