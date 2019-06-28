<template>
    <div >
        <div class="pretty p-switch  p-toggle">
            <input type="checkbox" v-model="s_status" @change="change_status"/>
            <div class="state p-success p-on">
                <label>เปิดรับการตอบ</label>
            </div>
            <div class="state p-danger p-off">
                <label>ปิดรับการตอบ</label>
            </div>
        </div>

    </div>
</template>

<script>
    export default {
        name: "SurveyStatusSelect",
        props :
            {s_id : String,
            status : Number}
        ,
        mounted () {
          if(this.status == 0)
          {
              this.s_status = false
          }else {
              this.s_status = true
          }
        },
        data () {return {
            s_status : true
        }},
        methods : {
            change_status () {
                let status = 1
                console.log("status",this.s_status)
                if(this.s_status == false)
                {
                    status=0
                }
                axios.put('/api/survey/'+this.s_id, {status : status})
                    .then(function (response) {
                        console.log(response.data);
                    }.catch( (err) => {
                        console.log('err');
                    }))
            }
        }
    }
</script>
<style scoped>

</style>