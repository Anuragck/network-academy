<template>
<div>

 <!--
  Start Preloader
  ==================================== -->

    <div class='preloader'>
      <span></span>
      <span></span>
<span></span>
      <span></span>
<span></span>
      <span></span>
      <span></span>
      <span></span>

    </div>

  <!--
  End Preloader
  ==================================== -->







</div>
</template>
<script>
export default{
props:{
text:{
    required:false,
    type:String,
    default:'Loading',

},
},




};


</script>
<style scoped>



/******************************* */

/*#preloader {
  background: rgb(255, 255, 255);
  height: 100%;
  left: 0;
  opacity: 1;
  filter: alpha(opacity=100);
  position: fixed;
  text-align: center;
  top: 0;
  width: 100%;
  z-index: 999999999;
}*/


.preloader {
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  text-align: center;
  position: absolute;
}

.preloader span {
  position: absolute;
  display: block;
  bottom: 0;
  width: 8px;
  height: 2px;
  border-radius: 6px;
  background: #fff;
  -webkit-animation: preloader 2s infinite ease-in-out;
  animation: preloader 2s infinite ease-in-out;
}

.preloader span:nth-child(2) {
  left: 11px;
  -webkit-animation-delay: 200ms;
  animation-delay: 200ms;
}

.preloader span:nth-child(3) {
  left: 22px;
  -webkit-animation-delay: 400ms;
  animation-delay: 400ms;
}

.preloader span:nth-child(4) {
  left: 33px;
  -webkit-animation-delay: 600ms;
  animation-delay: 600ms;
}

.preloader span:nth-child(5) {
  left: 44px;
  -webkit-animation-delay: 800ms;
  animation-delay: 800ms;
}

.preloader span:nth-child(6) {
  left: 55px;
  -webkit-animation-delay: 1000ms;
  animation-delay: 1000ms;
}

@-webkit-keyframes preloader {
  0% {
    height: 5px;
    -webkit-transform: translateY(0);
    transform: translateY(0);
    background: rgba(0, 0, 0, 0.1);
  }
  25% {
    height: 30px;
    -webkit-transform: translateY(15px);
    transform: translateY(15px);
    background: #3498db;
  }
  50%, 100% {
    height: 5px;
    -webkit-transform: translateY(0);
    transform: translateY(0);
    background: rgba(0, 0, 0, 0.1);
  }
}

@keyframes preloader {
  0% {
    height: 5px;
    -webkit-transform: translateY(0);
    transform: translateY(0);
    background: #fff;
  }
  25% {
    height: 10px;
    -webkit-transform: translateY(15px);
    transform: translateY(15px);
    background: #264284;
  }
  50%, 100% {
    height: 5px;
    -webkit-transform: translateY(0);
    transform: translateY(0);
    background: #fff;
  }
}


</style>
