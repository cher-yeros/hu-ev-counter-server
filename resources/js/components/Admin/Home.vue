<template>
  <div>
    <div class="row">
      <div class="col-sm-12 col-md-6 col-lg-3 p-3">
        <div class="card user-card">
          <div class="card-body text-center">
            <h5 class="card-title">
              <strong>
                የተቀበሉ :
                <span class="badge badge-light">
                  {{
                  yetekebelu_count
                  }}
                </span>
              </strong>
            </h5>

            <a :href="'/'+campus + '/yetekebelu'" class="btn btn-block btn-outline-light">ተጨማሪ ይመልከቱ</a>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-3 p-3">
        <div class="card thread-card">
          <div class="card-body text-center">
            <h5 class="card-title">
              <strong>
                የተመለሱ :
                <span class="badge badge-light">
                  {{
                  yetemelesu_count
                  }}
                </span>
              </strong>
            </h5>

            <a :href="'/'+campus + '/yetemelesu'" class="btn btn-block btn-outline-light">ተጨማሪ ይመልከቱ</a>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-3 p-3">
        <div class="card reply-card">
          <div class="card-body text-center">
            <h5 class="card-title">
              <strong>
                ተስፋ የሰጡ :
                <span class="badge badge-light">
                  {{
                  tesfa_yesetu_count
                  }}
                </span>
              </strong>
            </h5>
            <!-- --
                        <p cl{{ass="card-text">Number :</p>
            --}}-->
            <a
              :href="'/'+campus + '/tesfa-yesetu'"
              class="btn btn-block btn-outline-light"
            >ተጨማሪ ይመልከቱ</a>
          </div>
        </div>
      </div>

      <div class="col-sm-12 col-md-6 col-lg-3 p-3">
        <div class="card activity-card">
          <div class="card-body text-center">
            <h5 class="card-title">
              <strong>
                የሰሙ :
                <span class="badge badge-light">
                  {{
                  yesemu_count
                  }}
                </span>
              </strong>
            </h5>

            <a :href="'/'+campus + '/yesemu'" class="btn btn-block btn-outline-light">ተጨማሪ ይመልከቱ</a>
          </div>
        </div>
      </div>
    </div>

<!--    <home-graph></home-graph>-->
      <div class="container">
          <div class="row">
              <div class="col">
                  Select
                  <div class="form-check">
                      <label class="form-check-label">
                          <input type="radio" class="form-check-input" v-model="evangeon" value="off" selected>Evange week off
                      </label>
                  </div>
                  <div class="form-check">
                      <label class="form-check-label">
                          <input type="radio" class="form-check-input" v-model="evangeon" value="on">Evange week on
                      </label>
                  </div>
                  <div class="form-group">
                      <label for="comment">Comment:</label>
                      <textarea :disabled="evangeon == 'on'?true:false" class="form-control" rows="5" id="comment" v-model="comment"></textarea>
                  </div>
                  <button type="button" class="btn btn-primary" @click="changeEvange">Update</button>
              </div>
              <div class="col"></div>
              <div class="col"></div>
          </div>

      </div>

  </div>
</template>

<script>
export default {
  data() {
    return {
      campus: window.App.user.campus.slug,
      tesfa_yesetu_count: 0,
      yetekebelu_count: 0,
      yesemu_count: 0,
      yetemelesu_count: 0,
        evangeon: 'off',
        comment: ''
    };
  },
  
  methods: {
    fetchData() {
      console.log("here");
      axios.get("/" + this.campus + "/counts").then(({ data }) => {

console.log(data);

        this.yesemu_count = data.yesemu_count;
        this.yetekebelu_count = data.yetekebelu_count;
        this.tesfa_yesetu_count = data.tesfa_yesetu_count;
        this.yetemelesu_count = data.yetemelesu_count;
      });
    },
      fetchInfo() {
        axios.get("/" +this.campus + "/evange").then(({data}) => {
            // console.log(data.evange);
            if(data.evange.started == 1) {
                this.evangeon = "on";
            } else {
                this.evangeon = "off";
            }
            this.comment = data.evange.messege;
        });
      },
      changeEvange() {
        axios.post('/'+this.campus+"/evange", {
            'messege':this.comment,
            'started': this.evangeon=='off'?0:1,
            'campus_id': window.App.user.campus.id,
            'user_id': window.App.user.id
        }).then(({data}) => {
            console.log(data);
        });
        console.log("on",this.evangeon);
        console.log("comment", this.comment);
      }
  },
    watch: {
      evangeon(value)
        {
          console.log(this.evangeon)
        }
    },
    created() {
      this.fetchData();
      this.fetchInfo();
    }
};
</script>
