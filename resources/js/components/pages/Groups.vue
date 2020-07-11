<template>
    <v-row mt-1>
        <v-col cols="10">
            <v-toolbar dense >

                <v-btn icon>
                    <v-icon>mdi-magnify</v-icon>
                </v-btn>
            </v-toolbar>
        </v-col>
        <v-col cols="2">
            <createForm @list="list()"></createForm>
        </v-col>

        <v-col cols="12">
            <v-item-group mandatory>
                <v-container>
                <v-row>
                    <v-sheet v-if="!forms">
                        <v-skeleton-loader class="mx-auto" max-width="300" type="card" ></v-skeleton-loader>
                    </v-sheet>
                    <v-col v-else v-for="(item, i) in forms" :key="i" cols="12" md="4" >
                    <v-item v-slot:default="{ active, toggle }">
                        <v-card :dark="active" :color="active ? '#c13832' : '#d7d3c8'" style="cursor:pointer" class="elevation-5">
                            <div @click="toggle">
                                <v-card-title>
                                    <v-toolbar-title>{{item.name}}</v-toolbar-title>
                                    <v-spacer></v-spacer>
                                    <v-btn :disabled="!active" icon>
                                        <deleteForm :form="item" @list="list()"></deleteForm>
                                    </v-btn>
                                </v-card-title>
                                <v-card-subtitle class="pb-0"><v-icon>mdi-code-array</v-icon> {{item.code}}</v-card-subtitle>
                                <v-card-subtitle>
                                    <v-row>
                                    <v-col md="4" sm="4" xs="12">
                                        <v-list-item-avatar color="grey darken-3">
                                            <v-img :src="avatar"></v-img>
                                        </v-list-item-avatar>
                                    </v-col>
                                    <v-col md="8" sm="8" xs="12">
                                        <v-list-item-content>
                                            <v-list-item-title v-html="item.user_mod"></v-list-item-title>
                                            <v-list-item-subtitle v-html="item.updated_at"></v-list-item-subtitle>
                                        </v-list-item-content>
                                    </v-col>
                                    </v-row>
                                </v-card-subtitle>
                            </div>
                            <v-card-actions light>
                                <v-bottom-navigation horizontal :background-color="active ? '#c13832' : '#d7d3c8'" class="elevation-0" height="50">
                                        <v-btn :disabled="!active" icon>
                                            <editForm :form="item" @list="list()"></editForm>
                                        </v-btn>
                                        <v-btn :disabled="!active" @click="listGroups(item)" icon>
                                            <v-icon>mdi-cogs</v-icon>
                                        </v-btn>
                                        <v-btn :disabled="!active" @click="shareForm(item)" icon>
                                            <v-icon>mdi-share-variant</v-icon>
                                        </v-btn>


                                </v-bottom-navigation>

                            </v-card-actions>
                        </v-card>
                    </v-item>
                    </v-col>
                </v-row>
                </v-container>
            </v-item-group>
        </v-col>
<!-- DIALOG -->
        <v-row justify="center">
            <v-dialog v-model="dialog" fullscreen hide-overlay transition="dialog-bottom-transition">
                <v-card>
                    <v-toolbar dark color="#4d4e53">
                        <v-btn icon dark @click="dialog = false">
                            <v-icon>mdi-close</v-icon>
                        </v-btn>
                        <v-toolbar-title>Settings</v-toolbar-title>
                        <v-spacer></v-spacer>
                        <v-toolbar-items prominent >
                            <v-btn icon dark @click="loadPreview()">
                                <v-icon>mdi-eye</v-icon>
                            </v-btn>
                            <v-btn icon dark @click="close()">
                                <v-icon>mdi-content-save</v-icon>
                            </v-btn>
                        </v-toolbar-items>
                    </v-toolbar>
                    <v-row>
                        <v-col cols="6">
                            <v-card class="mb-2">
                                <v-toolbar color="#4d4e53" dark dense>
                                        <v-toolbar-title>Groups in form</v-toolbar-title>
                                        <v-spacer></v-spacer>
                                        <v-btn icon>
                                            <v-icon>mdi-plus</v-icon>
                                        </v-btn>
                                </v-toolbar>
                                <v-chip-group v-model="selection" column>
                                    <v-chip class="mx-2 my-2" active-class="red darken-4 white--text" @click="listInputs(group)" v-for="(group, i) in groups" :key="i">
                                        <v-icon left>mdi-subtitles</v-icon> {{group.name}}
                                        <v-icon right>mdi-close-circle</v-icon>
                                    </v-chip>
                                </v-chip-group>
                            </v-card>
                            <v-card :loading="loading">
                                <v-toolbar color="#4d4e53" dark dense>
                                        <v-toolbar-title>Inputs in group</v-toolbar-title>
                                        <v-spacer></v-spacer>
                                        <v-btn icon @click="addItem(1)">
                                            <v-icon>mdi-plus</v-icon>
                                        </v-btn>
                                </v-toolbar>

                                <v-chip-group v-model="selectionitem" column >
                                    <v-chip class="ma-2" active-class="red darken-4 white--text"  v-for="(_input, j) in inputsGroups" :key = "j">
                                        <v-icon left>mdi-subtitles</v-icon>
                                        {{_input.name}} - {{_input.code}}
                                        <v-icon right>mdi-close-circle</v-icon>
                                    </v-chip>
                                </v-chip-group>
                            </v-card>
                        </v-col>
                        <v-col  cols="6">
                            <v-card p-2>
                                 <v-toolbar color="#4d4e53" dark dense>
                                        <v-toolbar-title>Preview form</v-toolbar-title>
                                </v-toolbar>
                                <v-card-text>
                                    <v-skeleton-loader class="mx-auto" max-width="300" type="card" ></v-skeleton-loader>
                                </v-card-text>
                            </v-card>
                        </v-col>
                    </v-row>
                </v-card>
            </v-dialog>
        </v-row>
        <!-- DIALOG -->

        <!-- ADDITEM -->
        <v-row>
            <v-dialog v-model="addItemDialog" width="400">
                <v-card>
                    <v-card-title class="headline grey lighten-2" primary-title>AddITEM IN GROUP
                        <v-spacer></v-spacer>
                        <v-btn icon @click="closeAddItem()">
                            <v-icon>mdi-close-circle</v-icon>
                        </v-btn>
                    </v-card-title>
                    <v-card-text>
                        <v-select v-model="addInputInGroup" :items="inputsAdd" label="Input" item-text="name" item-value="id" required ></v-select>
                    </v-card-text>
                    <v-card-actions>
                        <v-spacer></v-spacer>
                        <v-btn @click="closeAddItem()" color="red" dark small fab>
                            <v-icon>mdi-close</v-icon>
                        </v-btn>
                        <v-btn @click="alert()" color="green" dark small fab>
                            <v-icon>mdi-check</v-icon>
                        </v-btn>
                    </v-card-actions>
                </v-card>
            </v-dialog>
        </v-row>
    </v-row>
</template>
<script>
import dialogForm from '../dialogs/FormDialog'
import createForm from '../dialogs/CreateForm'
import editForm from '../dialogs/EditForm'
import deleteForm from '../dialogs/DeleteForm'
import PreviewForm from '../pages/PreviewForm'
export default{
    components:{
        createForm,
        editForm,
        deleteForm,
        dialogForm,
        PreviewForm
    },
    data(){
        return {
            forms:{},
            form: '',
            avatar: "https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairShortCurly&accessoriesType=Prescription02&hairColor=Black&facialHairType=Blank&clotheType=Hoodie&clotheColor=White&eyeType=Default&eyebrowType=DefaultNatural&mouthType=true&skinColor=Light",
            search: '',
            loadingForms: false,
            loading: false,
            dialog: false,
            groups: [],
            inputsGroups:[],
            selection: 0,
            selectionitem: 0,
            _inputs: {},
            inputsAdd:[],
            addInputInGroup:'',
            addItemDialog: false,
        }
    },
    methods:{
        list: async function() {
            const res = await this.callApi("get", "app/forms", this.data)
            this.forms = res.data
        },
        listGroups:async function(form){
            const res = await this.callApi('get', 'app/forms/groups/form/'+form.id, null)
            this.dialog = true
            this.groups = res.data
        },
        listInputs:async function(group){
            this.loading = true
            const res = await this.callApi('get', 'app/groups/inputs/'+group.id, null)
            this.loading = false
            this.inputsGroups = res.data
        },
        listInputsAdd: async function(group){
            const res = await this.callApi('get', 'app/groups/inputs/add'+group.id, null)
            this.inputsAdd = [

                {id:1, code: "AB",name: "Area"},
                {id:2, code: "A1",name: "Area 2"},
                {id:3, code: "A2",name: "Area 3"},

            ]
        },
        close:function(){
            this.selection = 0
            this.selectionitem = 0
            this.dialog = false
        },
        alert:function(){
            console.log("XXX")
        },
        alert2:function(group){
            console.log("AAAA ", group)

        },
        loadPreview: function(){
            console.log("PREVIEW")
        },
        addItem: function(group){
            this.addItemDialog = true
            this.listInputsAdd(group)
        },
        closeAddItem: function(){
            this.addItemDialog = false
        },
        shareForm: function(form){
            console.log("compartir form ", form.id)
        },
        _delete: async function(form){

            this.list()
        },
    },
    created(){
        this.list()
    }
}
</script>