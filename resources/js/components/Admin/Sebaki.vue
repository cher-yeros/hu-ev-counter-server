<template>
  <tr>
    <td>{{ sebaki.name }}</td>
    <td>{{ sebaki.phone }}</td>
    <td>{{ sebaki.campus.name}}</td>
    <td>{{ sebaki.username }}</td>
    <td>
      <button type="submit" :class="classes" class="btn btn-sm" @click="approval" v-text="btnTxt"></button>
    </td>
  </tr>
</template>

<script>
export default {
  data() {
    return {
      approved: this.sebaki.approved,
      campus: window.App.user.campus.slug
    };
  },
  props: ["sebaki"],
  computed: {
    classes() {
      if (this.approved) {
        return "btn-danger";
      } else return "btn-success";
    },
    btnTxt() {
      if (this.approved) {
        return "Disapprove";
      } else return "Approve";
    }
  },
  methods: {
    approval() {
      axios
        .post(
          "/" +
            this.campus +
            "/approve-sebaki/" +
            this.sebaki.id +
            "-" +
            this.sebaki.name
        )
        .then(({ data }) => {
          this.approved = !this.approved;
        });
    }
  }
};
</script>
