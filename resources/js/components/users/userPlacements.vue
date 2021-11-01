<template>
  <div>

    <!-- partial:index.partial.html -->
    <div class="slider">
      <div class="slide-track">
        <div v-for="placement in placements" :key="placement.id">
          <div class="slide">
            <div class="card" style="width: 18rem">
              <img src="" class="card-img-top" alt="..." />
              <div class="card-body">
                <p class="card-text">
                  Some quick example text to build on the card title and make up
                  the bulk of the card's content.
                </p>
              </div>
            </div>
            <!--{{ placement.id }}
			<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/557257/1.png" height="100" width="250" alt="" />-->
          </div>
        </div>
      </div>
    </div>
    <!-- partial -->
  </div>
</template>
<script>
import axios from "axios";
export default {
  data() {
    return {
      placements: {},
    };
  },

  created() {
    this.getPlacements();
  },

  methods: {
    getPlacements() {
      axios
        .get("get-placements")
        .then((response) => {
          this.placements = response.data;
          console.log(this.placements);
        })
        .catch((err) => {});
    },
  },
};
</script>

<style scoped>
/***************************/

@-webkit-keyframes scroll {
  0% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }
  100% {
    -webkit-transform: translateX(calc(-250px * 7));
    transform: translateX(calc(-250px * 7));
  }
}

@keyframes scroll {
  0% {
    -webkit-transform: translateX(0);
    transform: translateX(0);
  }
  100% {
    -webkit-transform: translateX(calc(-250px * 7));
    transform: translateX(calc(-250px * 7));
  }
}
.slider {
  background: pr;
  box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.125);
  height: 200px;
  margin: auto;
  overflow: hidden;
  position: relative;
  width: 960px;
}
.slider::before,
.slider::after {
  background: linear-gradient(to right, white 0%, rgba(255, 255, 255, 0) 100%);
  content: "";
  height: 100px;
  position: absolute;
  width: 200px;
  z-index: 2;
}
.slider::after {
  right: 0;
  top: 0;
  -webkit-transform: rotateZ(180deg);
  transform: rotateZ(180deg);
}
.slider::before {
  left: 0;
  top: 0;
}
.slider .slide-track {
  -webkit-animation: scroll 40s linear infinite;
  animation: scroll 40s linear infinite;
  display: flex;
  width: calc(250px * 14);
}
.slider .slide {
  height: 100px;
  width: 250px;
}
</style>

