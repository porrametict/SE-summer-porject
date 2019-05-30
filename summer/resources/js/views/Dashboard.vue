<template>
    <div>
        <h1>Dashboard</h1>
        <hr>

        <input v-model="name"/>
        <select v-model="sex">
            <option :value="sex.id" v-for="sex in sexes">{{sex.text}}</option>
        </select>
        <button class="btn btn-primary btn-lg" v-on:click="alertuser()">GO TO PAGE 2</button>
        <button class="btn btn-primary btn-lg" v-on:click="loadSex()">Sex</button>
        <button @click="getUser()">Submit</button>
    <ul v-if="listUser.length > 0">
        <li v-for="user in listUser">{{user.name}}-{{user.sex}}</li>
    </ul>
    <h1 v-else>
        No Data
    </h1>
    </div>
</template>
<script>
    export default {

        data: () => ({
            name:"",
            listUser:[
                {name : "France",sex : "ชาย"}
            ],
            sex:"",
            sexes : null
        }),
        created(){
            this.loadSex();
        },
        methods : {
            getUser() {
                let name = this.name;
                let sex = this.sexes[this.sex-1].text;

                this.listUser.push({"name":name,"sex":sex})
                console.log(this.listUser)
            },

            alertuser() {
                this.$router.push({name:"page2"})
            },
            async loadSex (){
                let data =await axios.get('/api/sexes')
                    .then(function (response) {
                        console.log(response.data);
                        return response.data;
                    })
                    .catch(function (error) {
                        console.log(error.data);
                        return null;
                    })
                this.sexes=data;
            }


        }
    }
</script>