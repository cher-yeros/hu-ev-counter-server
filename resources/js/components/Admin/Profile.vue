<template>
  <div class="row justify-content-center align-items-center">
    <div class="col-lg-6 wrapper-contain">
      <div class="row justify-content-center">
        <div class="col-lg-4 my-2 mx-2">
          <img class="avatar-img" :src="avatar" alt srcset />
        </div>

        <div class="col-lg-8 my-2">
          <div class="input-group mb-3" :class="!editing?'display-none':'display-block'">
            <div class="input-group-prepend">
              <span class="input-group-text" id="inputGroupFileAddon01">Avatar</span>
            </div>
            <div class="custom-file">
              <input accept="image/*" type="file" class="custom-file-input" @change="updateAvatar" />
              <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Campus</span>
            </div>
            <input
              required
              v-model="user.campus.name"
              type="text"
              class="form-control"
              :disabled="editing ? false : true"
            />
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Name</span>
            </div>
            <input
              required
              v-model="user.name"
              type="text"
              class="form-control"
              placeholder="Full name"
              :disabled="editing ? false : true"
            />
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Phone</span>
            </div>
            <input
              required
              v-model="user.phone"
              type="text"
              class="form-control"
              placeholder="Phone"
              :disabled="editing ? false : true"
            />
          </div>

          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text" id="basic-addon1">Email</span>
            </div>
            <input
              required
              v-model="user.email"
              type="text"
              class="form-control"
              placeholder="Email"
              :disabled="editing ? false : true"
            />
          </div>
          <div class="row">
            <div class="col-lg-12 mb-1">
              <button
                v-if="!editing"
                @click="editing = !editing"
                type="button"
                class="btn btn-info btn-block"
              >Edit</button>
              <v-btn class="cyan">Edit</v-btn>
              <v-toolbar></v-toolbar>
            </div>
            <div class="col-lg-12">
              <button
                @click="updateUser"
                v-if="editing"
                type="button"
                class="btn btn-success btn-block"
              >Update</button>
            </div>
          </div>
        </div>
        <br />
        <br />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: window.App.user,
      avatar: window.App.user.avatar,
      campus: window.App.user.campus.slug,
      editing: false,
    };
  },
  methods: {
    updateUser() {
      axios
        .put("/" + this.campus + "/edit-profile", {
          name: this.user.name,
          phone: this.user.phone,
          email: this.user.email,
        })
        .then(({ data }) => {
          console.log(data);
        })
        .catch((error) => {
          // console.log(error.response.data.errors);
        });
    },
    updateAvatar(ev) {
      var image = ev.target.files[0];

      var reader = new FileReader();

      reader.readAsDataURL(image);

      reader.onload = (ev) => {
        this.avatar = ev.target.result;
      };

      this.persist(image);
    },
    persist(avatar) {
      var data = new FormData();

      data.append("avatar", avatar);

      var endpoint = "/" + this.campus + "/admin-avatar/" + this.user.id;

      axios.post(endpoint, data).then(({ data }) => {
        // console.log(data);
      });
    },
  },
};
</script>

<style>
.input-group-text {
  /* background: #bbbbbb; */
  color: white;

  background: #616161;
  /* color: white; */
}

.display-none {
  visibility: hidden;
}
.display-block {
  visibility: visible;
}

.avatar-img {
  width: 200px;
  height: 200px;
  border-radius: 50%;
  position: relative;
  left: 50%;
  transform: translateX(-50%);
  border: 5px solid #c3c3c3;
}
.wrapper-contain {
  border: 10px solid pink;
  padding: 10px;
  margin-top: -15px;
}

input-group {
  margin: 15px 0px;
}
</style>
