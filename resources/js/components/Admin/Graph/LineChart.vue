
<script>
import { Chart } from "chart.js";
import { Line } from "vue-chartjs";
export default {
  extends: Line,
  //   props: ["chartData"],
  data() {
    return {
      chartdata: {
        labels: ["January", "February"],
        datasets: [
          {
            label: "Data One",
            backgroundColor: "#f87979",
            data: [40, 20]
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false
      }
    };
  },
  mounted() {
    this.renderChart(this.chartdata, this.options);
    this.renderChart(this.chartData, this.options);
  }
};
</script>