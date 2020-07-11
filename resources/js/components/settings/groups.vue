<template>
    <v-card class="mb-2">
        <v-toolbar color="#4d4e53" dark dense>
                <v-toolbar-title>Groups in form</v-toolbar-title>
                <v-spacer></v-spacer>
                <v-btn icon>
                    <v-icon>mdi-plus</v-icon>
                </v-btn>
        </v-toolbar>
        <v-chip-group v-model="selection" active-class="#4d4e53" column dark>
            <v-chip outlined class="mx-2 my-2" @click="alert2(group)" v-for="(group, i) in groups" :key="i">
                <v-icon left>mdi-subtitles</v-icon> GRUPO {{group.id}}
            </v-chip>
        </v-chip-group>
    </v-card>
</template>
<script>
export default {
    props:{
        form: null
    },
    data(){
        return {
            selection:0,
            groups: [],
            inputsGroups:[{code: "AB",name: "Area"}, {code: "AB",name: "Area"}, {code: "AB",name: "Area"},
            {code: "AB",name: "Area"}, {code: "AB",name: "Area"}, {code: "AB",name: "Area"},
            {code: "AB",name: "Area"}, {code: "AB",name: "Area"}, {code: "AB",name: "Area"},
            {code: "AB",name: "Area"}, {code: "AB",name: "Area"}, {code: "AB",name: "Area"}],
        }
    },
    methods:{
        list:async function(){
            const rest = await this.callApi('get', 'app/forms/groups/form/'+this.form.id, null)
            this.dialog = true
            console.log(rest.data)
            this.groups = rest.data
        },
    },
    mounted(){
        this.list()
    }
}
</script>