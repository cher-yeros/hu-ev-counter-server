<template>
  <div class="row">
    <div class="col-12 mb-3 mt-1">
      <div class="display-4 dash-board float-left" v-text="title"></div>
      <form class="form-inline my-2 my-lg-0 float-right">
        <input
          style="width:300px"
          class="form-control mr-sm-2"
          type="text"
          :placeholder="placeholder"
          v-model="query"
          @keyup="search"
        />
      </form>
    </div>

    <table v-if="tesebakis" class="table table-bordered table-hover">
      <thead class="thead-light">
        <tr>
          <th>Name</th>
          <th>Preacher</th>
          <th>Campus</th>
          <th>Phone</th>
          <th>Date</th>
          <th>Gender</th>
        </tr>
      </thead>
      <tbody v-for="tesebaki in tesebakis" :key="tesebaki.id">
        <tesebaki :tesebaki="tesebaki"></tesebaki>
      </tbody>
    </table>
    <div v-else>Empty thing</div>
  </div>
</template>

<script>
import Tesebaki from "./Tesebaki.vue";
import { EtDatetime, ETC, BahireHasab } from "abushakir";
export default {
  props: ["type"],
  components: { Tesebaki },
  data() {
    return {
      tesebakis: [],
      query: "",
      id: window.App.user.campus.slug
    };
  },
  computed: {
    title() {
      if (this.type == "yetekebelu") {
        return "የተቀበሉ";
      } else if (this.type == "yetemelesu") {
        return "የተመለሱ";
      } else if (this.type == "tesfa-yesetu") {
        return "ተስፋ የሰጡ";
      } else if (this.type == "yesemu") {
        return "የሰሙ";
      }
    },
    placeholder() {
      return this.title + "ትን ይፈልጉ";
    }
  },
  methods: {
    fetch() {
      axios.get("/" + this.id + "/" + this.type).then(({ data }) => {
        this.tesebakis = data.data;
      });
    },
    search() {
      axios
        .get("/" + this.id + "/" + this.type + "?search=" + this.query)
        .then(({ data }) => {
          this.tesebakis = data.data;
        });
    }
  },
  created() {
    // var now = new EtDatetime();
    // console.log(new Date(Date.now()));
    this.fetch();
    console.log(this.id);
    console.log(this.type);
  }
};
</script>
