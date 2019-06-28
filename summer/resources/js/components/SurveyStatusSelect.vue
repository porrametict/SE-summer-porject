<template>
    <div >
        <label class="switch">
            <input type="checkbox" v-model="s_status" @change="change_status">
            <span class="slider round"></span>

        </label>
        <label class="h5">ปิดรับการตอบ</label>

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
    /* The switch - the box around the slider */
    .switch {
        position: relative;
        display: inline-block;
        width: 55px;
        height: 30px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* The slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 20px;
        width: 20px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked + .slider {
        background-color: #2196F3;
    }

    input:focus + .slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

</style>