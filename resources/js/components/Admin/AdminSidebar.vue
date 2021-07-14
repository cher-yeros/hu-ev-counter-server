<template>
  <div>
    <div id="menu">
      <i class="fa fa-sliders" aria-hidden="true"></i>
    </div>

    <div id="sidebar-wrapper">
      <div class="top text-center">
        <div class="p-2">
          <img class="avatar" :src="user.avatar" alt />
        </div>
        <div>
          <h1 class="lead m-1">{{ user.name }}</h1>
          <h1 class="lead m-1">ድርሻ : Campus Admin</h1>
        </div>
      </div>

      <ul class="sidebar-nav row">
        <li class="col-12">
          <a class="nav-link" :href="'/'+campus">
            <i class="fa fa-home" aria-hidden="true"></i>
            <span>ሆም ፔጅ</span>
          </a>
        </li>

        <div id="collapser">
          <li class="col-12">
            <a class="nav-link" href="#">
              <i class="fa fa-caret-down" aria-hidden="true"></i>
              <span>ተሰባኪዎች</span>
            </a>
          </li>

          <div id="collapsible" class="collapse">
            <li class="col-12 li">
              <a class="nav-link" :href="'/'+campus + '/yetekebelu'">
                <i class="fa fa-users" aria-hidden="true"></i>
                <span>የተቀበሉ ዝርዝር</span>
              </a>
            </li>
            <li id="li" class="col-12 li">
              <a class="nav-link" :href="'/'+campus + '/yetemelesu'">
                <i class="fa fa-users" aria-hidden="true"></i>
                <span>የተመለሱ ዝርዝር</span>
              </a>
            </li>
            <li id="li" class="col-12 li">
              <a class="nav-link" :href="'/'+campus + '/tesfa-yesetu'">
                <i class="fa fa-users" aria-hidden="true"></i>
                <span>ተስፋ የሰጡ ዝርዝር</span>
              </a>
            </li>

            <li id="li" class="col-12 li">
              <a class="nav-link" :href="'/'+campus + '/yesemu'">
                <i class="fa fa-users" aria-hidden="true"></i>
                <span>የሰሙ ዝርዝር</span>
              </a>
            </li>
          </div>
        </div>

        <li class="col-12">
          <a class="nav-link" :href="'/'+campus+'/sebaki-request'">
            <i class="fa fa-briefcase" aria-hidden="true"></i>
            <span>ሪቈስት</span>
          </a>
        </li>
        <li class="col-12">
          <a class="nav-link" :href="'/'+campus+'/activity-log'">
            <i class="fa fa-lock" aria-hidden="true"></i>
            <span>ድርጊቶች</span>
          </a>
        </li>

        <li class="col-12">
          <a class="nav-link" :href="'/'+campus+'/my-profile'">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            <span>ማይ ፕሮፋይል</span>
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: window.App.user,
      signedIn: window.App.SignedIn,
      name: window.App.user.name,
      campus: window.App.user.campus.slug
    };
  },
  created() {
    // console.log(this.user);
  },
  mounted() {
    $(document).ready(function() {
      $("#menu").click(function(e) {
        $("#wrapper").toggleClass("menu-displayed");
      });

      $("#collapser").click(function() {
        $("#collapsible").collapse("toggle");
      });
      let vs = $(".li");
      // console.log(v);

      vs.click(function() {
        $("#collapsible").addClass("show");
      });

      // for (var x in vs) {
      //     x.click(function(){
      //         console.log('df');
      //     })
      // }

      // $("#li").click(function() {
      //     $("#collapsible").addClass('show');
      // });
    });
  }
};
</script>
