import {Bar} from 'vue-chartjs' 
<script>
export default {
  extends: Bar,
  props: {
    labels: {
      type: Array
    },
    data: {
      type: Object
    }
  }
};
</script>