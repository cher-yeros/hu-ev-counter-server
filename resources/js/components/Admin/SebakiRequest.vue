<template>
  <div class="row">
    <div class="col-12 mb-3 mt-1">
      <div class="display-4 dash-board float-left">ሪቈስት የላኩ የ ሰባኪዎች</div>
      <div class="form-inline my-2 my-lg-0 float-right">
        <input
          style="width:300px"
          class="form-control mr-sm-2"
          type="text"
          placeholder="Search"
          @keyup="search"
          v-model="query"
        />
      </div>
    </div>

    <table v-if="sebakis" class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Phone</th>
          <th>campus</th>
          <th>Username</th>
          <th>Status</th>
        </tr>
      </thead>

      <tbody v-for="sebaki in sebakis" :key="sebaki.id">
        <sebaki :sebaki="sebaki"></sebaki>
      </tbody>
    </table>

    <div v-else>No result found</div>
  </div>
</template>

<script>
import Sebaki from "./Sebaki.vue";
export default {
  components: { Sebaki },
  data() {
    return {
      sebakis: [],
      query: "",
      campus: window.App.user.campus.slug
    };
  },
  methods: {
    fetch() {
      axios.get("/" + this.campus + "/sebaki-request").then(({ data }) => {
        this.sebakis = data.data;
      });
    },
    search() {
      axios
        .get("/" + this.campus + "/sebaki-request?search=" + this.query)
        .then(({ data }) => {
          this.sebakis = data.data;
        });
    }
  },
  created() {
    this.fetch();
  }
};
</script>
