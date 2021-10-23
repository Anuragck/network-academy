<template>
<div>


    <div class="container my-4">

<!--Carousel Wrapper-->
<div id="multi-item-example" class="carousel slide carousel-multi-item" data-ride="carousel">


  <!--Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#multi-item-example" data-slide-to="0" class="active"></li>
    <li data-target="#multi-item-example" data-slide-to="1"></li>

  </ol>
  <!--/.Indicators-->

  <!--Slides-->
  <div class="carousel-inner" role="listbox">

    <!--First slide-->
    <div class="carousel-item active ">

      <div class="col-md-3  " style="float:left">
       <div class="card mb-2 ">
          <img class="card-img-top"
            src="/images/team/member-3.jpg" alt="Card image cap">

          <div class="card-body ">
 <div class=" text-center">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
 </div>
          </div>
        </div>
      </div>

      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="/images/team/member-3.jpg" alt="Card image cap">
          <div class="card-body">
 <div class=" text-center">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
 </div>
          </div>
        </div>
      </div>

      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="/images/team/member-3.jpg" alt="Card image cap">
          <div class="card-body">
 <div class=" text-center">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
 </div>
          </div>
        </div>
      </div>

       <div class="col-md-3" style="float:left">
       <div class="card mb-2">
          <img class="card-img-top"
            src="/images/team/member-3.jpg" alt="Card image cap">
          <div class="card-body">
 <div class=" text-center">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
 </div>
          </div>
        </div>
      </div>

    </div>
    <!--/.First slide-->

    <!--Second slide-->
    <div class="carousel-item">

      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="/images/team/member-1.jpg" alt="Card image cap">
          <div class="card-body">
 <div class=" text-center">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
 </div>
          </div>
        </div>
      </div>

      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="/images/team/member-1.jpg" alt="Card image cap">
          <div class="card-body">
 <div class=" text-center">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
 </div>
          </div>
        </div>
      </div>

      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="/images/team/member-1.jpg" alt="Card image cap">
          <div class="card-body">
 <div class=" text-center">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
 </div>
          </div>
        </div>
      </div>

      <div class="col-md-3" style="float:left">
        <div class="card mb-2">
          <img class="card-img-top"
            src="/images/team/member-1.jpg" alt="Card image cap">
          <div class="card-body">
 <div class=" text-center">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
              card's content.</p>
 </div>
          </div>
        </div>
      </div>

    </div>
    <!--/.Second slide-->



  </div>
  <!--/.Slides-->
 <!--Controls-->
 <!-- <div class="controls-top ">
    <a class="btn-floating" href="#multi-item-example" data-slide="prev"><i class="fas fa-chevron-left"></i></a>
    <a class="btn-floating" href="#multi-item-example" data-slide="next"><i
        class="fas fa-chevron-right"></i></a>
  </div>-->
  <!--/.Controls-->

</div>
<!--/.Carousel Wrapper--></div>

</div>
</template>
<script>
 import axios from 'axios';
export default {

  data() {
    return {


    };
  },

  created() {



  },

  methods:{




  }
};

</script>

<style scoped>

.carousel-indicators li {
margin-top: 200px;
    display: inline-block;
    width: 16px;
    height: 16px;
    margin: 15px;
    text-indent: 1;
    cursor: pointer;
    border: none;
    border-radius: 50%;
    background-color: #0d0d2e;
    box-shadow: inset 1px 1px 1px 1px rgba(17, 30, 66, 0.685);
}
.carousel-indicators .active {
    width: 16px;
    height: 16px;
margin: 15px;

    background-color: #271b46bd;
}
</style>
