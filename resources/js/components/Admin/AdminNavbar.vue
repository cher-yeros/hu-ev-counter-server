<template>
  <nav
    style="background-color:#124984 !important"
    class="navbar navbar-expand-md navbar-light bg-white shadow-sm fixed-top"
  >
    <div class="container">
      <a
        style="color:white"
        class="navbar-brand"
        href="/"
        v-text="user.campus.name + ' Campus Admin'"
      >
        <!-- {{-- {{ config('app.name', 'Laravel') }} --}} -->
        <!-- {{Auth::user()->campus->name}} Campus Admin -->
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
      >
        <!-- aria-label="{{ __('Toggle navigation') }}" -->
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto"></ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->

          <li v-if="!signedIn" class="nav-item">
            <a class="nav-link" href="/logout">Logout</a>
          </li>

          <li v-if="!signedIn" class="nav-item">
            <a class="nav-link" href="/register">Register</a>
          </li>

          <li v-if="signedIn" class="nav-item dropdown">
            <a
              style="color:white"
              id="navbarDropdown"
              class="nav-link dropdown-toggle"
              href="#"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
              v-text="user.name"
            >
              <!-- tyr em -->
              <!-- {{ user.campus.name }} -->
              <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <form action="/logout" method="post">
                <a class="dropdown-item" href="/logout" @click.prevent="logout">{{ "Logout" }}</a>
              </form>
              <a class="dropdown-item" :href="'/profiles/' + user.name">My profile</a>

              <form id="logout-form" action="/logout" method="POST" style="display: none;"></form>
            </div>
          </li>

          <!-- <div class="dropdown">
                        <a
                            style="color:white"
                            class="nav-link dropdown-toggle"
                            href="#"
                            role="button"
                            id="dropdownMenuLink"
                            data-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false"
                            v-text="user.name"
                        >
                        </a>

                        <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownMenuLink"
                        >
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#"
                                >Something else here</a
                            >
                        </div>
          </div>-->

          <!-- Example split danger button -->
          <!-- {{--
                    <div class="btn-group">
                        <button type="button" class="btn btn-danger">
                            Action
                        </button>
                        
                    </div>
          --}} @endguest-->
        </ul>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  data() {
    return {
      user: window.App.user,
      signedIn: window.App.SignedIn,
      name: window.App.user.name
    };
  },
  methods: {
    logout() {
      axios.post("/logout").then(data => {
        location.reload();
      });
    }
  },
  created() {
    // console.log(this.user);
  }
};
</script>
