<template>
  <div>
    <div class="row">
      <div class="col-md-12 page-header">
        <div class="page-pretitle">Overview</div>
        <h2 class="page-title">Dashboard</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
        <div class="card admin-dashboard-card shadow">
          <div class="content">
            <div class="row">
              <div class="col-sm-4">
                <div class="icon-big text-center">
                 <i class="blue fas fa-users "></i>
                </div>
              </div>
              <div class="col-sm-8">
                <div class="detail">
                  <p class="detail-subtitle">Total Enquires</p>
                  <span class="number">{{ totalCountsData.total_enquires }}</span>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
        <div class="card admin-dashboard-card shadow">
          <div class="content">
            <div class="row">
              <div class="col-sm-4">
                <div class="icon-big text-center">
                  <i class="olive far fa-calendar-check"></i>
                </div>
              </div>
              <div class="col-sm-8">
                <div class="detail">
                  <p class="detail-subtitle">Total Converted/Joined</p>
                  <span class="number">{{ totalCountsData.total_joined }}</span>
                </div>
              </div>
            </div>
            <!-- <div class="admin-dashboard-card-footer">
              <hr />
              <div class="stats">
                <i class="fas fa-calendar"></i> For this Week
              </div>
            </div> -->
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
        <div class="card admin-dashboard-card shadow">
          <div class="content">
            <div class="row">
              <div class="col-sm-4">
                <div class="icon-big text-center">
                  <i class="color-danger fas fa-times-circle"></i>
                </div>
              </div>
              <div class="col-sm-8">
                <div class="detail">
                  <p class="detail-subtitle">Total Dropped</p>
                  <span class="number">{{ totalCountsData.total_dropped }}</span>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
        <div class="card admin-dashboard-card shadow">
          <div class="content">
            <div class="row">
              <div class="col-sm-4">
                <div class="icon-big text-center">
                  <i class="teal fas fa-hourglass-half"></i>
                </div>
              </div>
              <div class="col-sm-8">
                <div class="detail">
                  <p class="detail-subtitle">Total Pending Enquires</p>
                  <span class="number">{{ totalCountsData.total_pending }}</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


 <div class="row">
      <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
        <div class="card admin-dashboard-card shadow">
          <div class="content">
            <div class="row">
              <div class="col-sm-4">
                <div class="icon-big text-center">
                 <i class="orange fas fa-users "></i>
                </div>
              </div>
              <div class="col-sm-8">
                <div class="detail">
                  <p class="detail-subtitle">Today's Enquires</p>
                  <span class="number">{{ totalCountsData.today_enquires }}</span>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
        <div class="card admin-dashboard-card shadow">
          <div class="content">
            <div class="row">
              <div class="col-sm-4">
                <div class="icon-big text-center">
                  <i class="olive fas fa-check-double"></i>
                </div>
              </div>
              <div class="col-sm-8">
                <div class="detail">
                  <p class="detail-subtitle">Today Converted/Joined</p>
                  <span class="number">{{ totalCountsData.today_joined }}</span>
                </div>
              </div>
            </div>
            <!-- <div class="admin-dashboard-card-footer">
              <hr />
              <div class="stats">
                <i class="fas fa-calendar"></i> For this Week
              </div>
            </div> -->
          </div>
        </div>
      </div>


    </div>





</div>






</template>

<script>

export default {

 data() {
    return {

        totalCountsData:{},

    }
 },

  methods:{


        getTotalCounts(){
                axios.get('getCounts').then((data)=>(this.totalCountsData=data.data));
        },


  },

  mounted() {

this.getTotalCounts();

  },
}
</script>

<style scoped>

.admin-dashboard-card{

transition: transform 250ms;
}
 .admin-dashboard-card:hover {
    transform: translateY(-10px);
  }

.color-danger{
color:rgba(255, 0, 0, 0.705);
}

</style>



