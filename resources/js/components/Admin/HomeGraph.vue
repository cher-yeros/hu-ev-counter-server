<template>
  <div>
    <div class="row mt-4">
      <div :class="!isLoading? 'display-none': 'display-block'" class="col-md-12 col-lg-6">
        <div id="loader">
          <div>Graph Loading...</div>
        </div>
      </div>
      <div :class="isLoading? 'display-none': 'display-block'" class="col-md-12 col-lg-6">
        <canvas id="bar-chart"></canvas>
      </div>

      <div class="col-md-12 col-lg-6">
        <div class="jumbotron">
          <h1 class="display-4">Show by</h1>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <label class="input-group-text" for="selectBy">Options</label>
            </div>
            <select v-model="time" class="custom-select" id="selectBy">
              <option value="Y" selected>Year</option>
              <option value="M">Month</option>
              <option value="D">Day</option>
            </select>
          </div>

          <div class="form-row">
            <div class="col-5">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="from">From</label>
                </div>
                <select v-model="from" class="custom-select" id="from">
                  <option selected disabled>Choose...</option>
                  <option v-for="limit in labels" :value="limit" :key="limit">{{limit}}</option>
                </select>
              </div>
            </div>
            <div class="col-5">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="to">To</label>
                </div>
                <select v-model="to" class="custom-select" id="to">
                  <option selected disabled>Choose...</option>
                  <option v-for="limit in labels" :value="limit" :key="limit">{{limit}}</option>
                </select>
              </div>
            </div>
            <div class="col-2 mr-auto">
              <button type="button" class="btn btn-primary btn-block">Show</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <random-chart></random-chart>
  </div>
</template>

<script>
import { EtDatetime, ETC, BahireHasab } from "abushakir";
import moment from "moment";
import Chart from "chart.js";
import RandomChart from "./Graph/RandomChart";

export default {
  components: { RandomChart },
  data() {
    return {
      isLoading: true,
      from: "",
      to: "",
      kenoch: ["እሁድ", "ሰኞ", "ማግሰኞ", "ረቡዕ", "ሐሙስ", "አርብ", "ቅዳሜ"],
      yetemelesu: [],
      yetekebelu: [],
      tesfa_yesetu: [],
      yesemu: [],
      labels: [],
      campus: window.App.user.campus.slug,
      dateF: [],
      str: {
        melesu: "የተመለሱ",
        kebelu: "የተቀበሉ",
        semu: "የሰሙ",
        setu: "ተስፋ የሰጡ"
      },
      time: "Y",
      chart: null
      // allData: this.$data.time
    };
  },
  watch: {
    time() {
      this.fetchData();
    }
  },
  methods: {
    updateChart() {
      // console.log(this.time);
    },
    fetchData() {
      this.yetemelesu = [];
      this.yetekebelu = [];
      this.tesfa_yesetu = [];
      this.yesemu = [];

      this.isLoading = true;
      axios
        .get("/" + this.campus + "/tesebakis?timely=" + this.time)
        .then(({ data }) => {
          this.isLoading = false;
          console.log(data);
          let allData = data;
          // console.log(allData);
          var j = 0;
          this.dateF = [];
          for (var i in data) {
            // console.log(data[i]);
            // this.labels.push(i);

            // this.dateF.push(data[i][0].created_at);
            //   for (var type in data[i]) {
            //     if (data[i][type]) {
            //       type.push(data[i][type].length);
            //     } else {
            //       type.push(0);
            //     }
            //   }

            if (data[i].yetemelese == undefined) {
              this.yetemelesu[j] = 0;
            } else {
              this.yetemelesu[j] = data[i].yetemelese.length;
              this.dateF[j] = data[i].yetemelese
                ? data[i].yetemelese[0].created_at
                : 0;
            }
            if (data[i].yetekebele == undefined) {
              this.yetekebelu[j] = 0;
            } else {
              this.yetekebelu[j] = data[i].yetekebele.length;
              this.dateF[j] = data[i].yetekebele
                ? data[i].yetekebele[0].created_at
                : 0;
            }
            if (data[i].yesema == undefined) {
              this.yesemu[j] = 0;
            } else {
              this.yesemu[j] = data[i].yesema.length;
              this.dateF[j] = data[i].yesema ? data[i].yesema[0].created_at : 0;
            }

            if (data[i].tesfa_yesete == undefined) {
              this.tesfa_yesetu[j] = 0;
            } else {
              this.tesfa_yesetu[j] = data[i].tesfa_yesete.length;
              this.dateF[j] = data[i].tesfa_yesete
                ? data[i].tesfa_yesete[0].created_at
                : 0;
            }
            j++;
          }
          // console.log(`data loop ${j} times`);
          // this.labels = [];
          var k = 0;
          this.labels = [];
          // console.log(this.dateF);
          this.dateF.forEach(date => {
            // console.log(this.toEtc(date));
            if (this.time == "Y") {
              this.labels[k] = this.toEtc(date).date.year;
            }
            if (this.time == "M") {
              this.labels[k] =
                this.toEtc(date).monthGeez + " " + this.toEtc(date).date.year;
            }
            if (this.time == "D") {
              console.log(date);
              console.log(this.toEtc(date).weekday);
              this.labels[k] =
                this.kenoch[this.toEtc(date).weekday] +
                ", " +
                this.toEtc(date).monthGeez +
                " " +
                this.toEtc(date).day +
                ", " +
                this.toEtc(date).date.year;
            }

            k++;
          });
          // console.log(`Label set runs ${k} times`);

          console.log(this.labels);
          console.log(this.yetemelesu);
          console.log(this.yetekebelu);
          console.log(this.yesemu);
          console.log(this.tesfa_yesetu);
          // this.isLoading = false;
          this.createBarChart();
        });
    },
    createBarChart() {
      if (this.chart != null) {
        this.chart.destroy();
        // console.log("destroy ran");
      }
      // console.log(this.yetekebelu);
      var ctx = document.getElementById("bar-chart");
      var datasets = [
        {
          label: this.str.kebelu,
          data: this.yetekebelu,
          backgroundColor: "#4caf50",
          // borderColor: "#4caf5073",
          fill: false,
          lineTension: 0,
          borderWidth: 2
          // pointRadius:
        },
        {
          label: this.str.melesu,
          data: this.yetemelesu,
          backgroundColor: "#008cba",
          // borderColor: "red",
          fill: false,
          lineTension: 0,
          borderWidth: 2
          // pointRadius:
        },
        {
          label: this.str.setu,
          data: this.tesfa_yesetu,
          backgroundColor: "#f44336",
          // borderColor: "red",
          fill: false,
          lineTension: 0,
          borderWidth: 2
          // pointRadius:
        },
        {
          label: this.str.semu,
          data: this.yesemu,
          backgroundColor: "#39b9b9",
          // borderColor: "red",
          fill: false,
          lineTension: 0,
          borderWidth: 2
          // pointRadius:
        }
      ];
      var data = {
        labels: this.labels,
        datasets: datasets
      };

      var options = {
        title: {
          display: true,
          text: "Gospel Preaching per month",
          fontSize: 20,
          fontWeight: "bold"
        },
        legend: {
          display: true,
          position: "bottom"
        },
        xAxes: {
          type: "date"
        }
      };
      this.chart = new Chart(ctx, {
        type: "bar",
        data: data,
        options: options
      });

      // chart.update();
    }
  },
  created() {
    console.log("created is fired!");

    // this.fetchData();
    let d = JSON.parse(JSON.stringify(this.yetekebelu));
    // console.log(this.allData);
    // console.log(d);
  },
  mounted() {
    this.fetchData();

    // this.createBarChart();
  }
};
</script>

<style>
#loader {
  width: 100%;
  height: 400px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 50px;
}

.display-none {
  display: none;
}
.display-block {
  display: block;
}
</style>
