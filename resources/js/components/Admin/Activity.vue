<template>
  <tr>
    <td>{{activity.actor_id}}</td>
    <!-- <td>{{activity.actor_type}}</td> -->
    <td>{{activity.action}}</td>
    <td>{{activity.subject_id}}</td>
    <!-- <td>{{activity.subject_type}}</td> -->
    <td v-text="date"></td>
    <td v-text="time"></td>
  </tr>
</template>

<script>
export default {
  props: ["activity"],
  computed: {
    date() {
      var ed = this.toEtc(this.activity.created_at);
      var date = ed.monthGeez + " " + ed.day + ", " + ed.year;

      return date;
    },
    time() {
      var ed = this.toEtc(this.activity.created_at);
      //   return this.activity.created_at;
      var time = `${ed.hour - 6} : ${ed.minute} : ${ed.second} ከቀኑ/ከምሽቱ`;
      return time;
    }
  }
};
</script>