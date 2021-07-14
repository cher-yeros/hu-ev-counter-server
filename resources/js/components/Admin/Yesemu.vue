<template>
    <table v-if="yesemus" class="table table-bordered table-hover">
        <thead class="thead-light">
        <tr>
            <th>Preacher</th>
<!--            <th>Campus</th>-->
            <th>Date</th>
            <th>Number</th>
        </tr>
        </thead>
        <tbody v-for="yesema in yesemus" :key="yesema.id">
        <td>
            <a class="dropdown-item" href="/sebaki-profile/Francisca Jenkins">
                {{
                yesema.sebaki.name
                }}
            </a>
        </td>
<!--        <td>{{yesema.campusId}}</td>-->
        <td>{{yesema.created_at}}</td>
<!--        <td v-text="date"></td>-->
        <td>{{ yesema.number }}</td>
        </tbody>
    </table>


</template>

<script>
    import { EtDatetime, ETC, BahireHasab } from "abushakir";
    export default {
        props: ["yesemu"],
        data() {
            return {
                id: window.App.user.campus.slug,
                yesemus: []
            }
        },

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
        created() {
                // axios.get("/" + this.id + "/yesemu").then(({ data }) => {
                //     this.yesemus = data.data;
                // });

                this.yesemus = JSON.parse(this.yesemu);
                console.log(this.yesemus);
        }
    };
</script>
