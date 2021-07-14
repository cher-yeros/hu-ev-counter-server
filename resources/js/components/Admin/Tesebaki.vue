<template>
  <tr>
    <td>{{ tesebaki.name }}</td>
    <td>
      <a class="dropdown-item" href="/sebaki-profile/Francisca Jenkins">
        {{
        tesebaki.sebaki.name
        }}
      </a>
    </td>
    <td>{{tesebaki.campus_id}}</td>
    <td>{{ tesebaki.phone }}</td>
    <td v-text="date"></td>
    <td>{{ tesebaki.gender }}</td>
  </tr>
</template>

<script>
import { EtDatetime, ETC, BahireHasab } from "abushakir";
export default {
  props: ["tesebaki"],
  computed: {
    date() {
      var ed = this.toEtc(this.tesebaki.created_at);

      // console.log(ed);
      var date = ed.monthGeez + " " + ed.day + ", " + ed.year;
      // var ds = ed.year + ", " + ed.month + ", " + ed.day;
      // console.log(ds);
      // var etc = new ETC(ed.year + ", " + ed.month + ", " + ed.day + 2);
      // // var etc = new ETC(2012, 9, 3);
      // // 2013, 12, 4;
      // console.log(etc);
      return date;
    }
  },
  created() {}
};
</script>
