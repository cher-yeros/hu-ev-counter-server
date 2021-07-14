<template>
    <div class="row">
        <div class="col-12 mb-3 mt-1">
            <div class="display-4 dash-board float-left">የ አጠቃቀም ታሪክ</div>
            <div class="form-inline my-2 my-lg-0 float-right">
                <!-- <input
          style="width:300px"
          class="form-control mr-sm-2"
          type="text"
          placeholder="Search"
          @keyup="search"
          v-model="query"
        />-->
            </div>
        </div>

        <table v-if="activities" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Actor</th>
                    <!-- <th>Actor Type</th> -->
                    <th>Action</th>
                    <th>Subject</th>
                    <!-- <th>Subject Type</th> -->
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>

            <tbody v-for="activity in activities" :key="activity.id">
                <activity :activity="activity"></activity>
            </tbody>
        </table>

        <div v-else>No result found</div>
    </div>
</template>

<script>
import Activity from "./Activity.vue";
import { EtDatetime, ETC, BahireHasab } from "abushakir";
export default {
    components: { Activity },
    props: ["activities"],
    created() {
      console.log(this.activities);
    }
};
</script>
