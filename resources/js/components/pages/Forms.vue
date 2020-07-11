<template>
  <v-data-table :headers="headersTable" :items="elementsTable" sort-by="name" class="elevation-1">
    <template v-slot:top>
      <v-toolbar flat color="white">
        <v-toolbar-title>FORMULARIOS</v-toolbar-title>
        <v-spacer></v-spacer>
        <!-- NEW MODAL -->
        <v-dialog v-model="modal" max-width="500px">
          <template v-slot:activator="{ on }">
            <v-btn color="primary" dark outlined class="mb-2" v-on="on">Nuevo formulario</v-btn>
          </template>
          <v-card>
            <v-card-title>
              <span class="headline">Nuevo registro</span>
            </v-card-title>
            <v-card-text>
              <v-container>
                <v-form ref="form" v-model="valid" lazy-validation>
                  <v-text-field v-model="fields.name" :rules="nameRules" label="Name" required ></v-text-field>
                  <v-text-field v-model="fields.code" :counter="10" :rules="codeRules" label="Code" required ></v-text-field>
                  <v-select v-model="fields.types_forms_id" :items="typesForms" item-text="name" item-value="id" data-vv-name="select" :rules="typeRules" label="select" required ></v-select>
                  <v-btn color="error" @click="close" outlined> Cancel</v-btn>
                  <v-btn color="success" @click="save" outlined> Save </v-btn>
                </v-form>
              </v-container>
            </v-card-text>
          </v-card>
        </v-dialog>
        <!-- END NEW MODAL -->

      </v-toolbar>
    </template>
    <template v-slot:item.actions="{ item }">

            <v-btn small class="ma-2" tile outlined color="teal" @click="editItem(item)" >
              <v-icon left>mdi-pencil</v-icon> Edit
            </v-btn>
            <v-btn small class="ma-2" tile outlined color="red" @click="deleteItem(item)" >
              <v-icon left>mdi-delete</v-icon> Delete
            </v-btn>
    </template>
    <template v-slot:no-data>
      <v-btn color="primary" @click="list">Reset</v-btn>
    </template>
  </v-data-table>
</template>

<script>
export default {
  data() {
    return {
      headersTable : [
        { text: "Name", align: "start", value: "name"},
        { text: "Code", value: "code" },

        { text: "Usuario", value: "user_mod" },
        { text: 'Actions', value: 'actions', sortable: false },
      ],
      elementsTable: [],
      valid        : true,
      switch1      : 'activo',
      modal        : false,
      fields       : { id: '', name: '', code: '', types_forms_id: ''},
      typesForms   : [],
      codeRules    : [
        v          => !!v || 'Code es requerido',
        v          => (v && v.length >= 2) || 'Code must have 5+ characters'
      ],
      nameRules    : [
        v          => !!v || 'Name is required',
        v          => (v && v.length >= 5) || 'Name must have 5+ characters'
      ],
      typeRules    : [
        v          => !!v || 'El tipo es required',
      ],
    }
  },
  methods: {
    listTypesForms: async function(){
      const res = await this.callApi("get", "app/types/forms/list", this.data)
      this.typesForms = res.data
    },
    list: async function() {
      const res = await this.callApi("get", "app/forms", this.data)
      this.elementsTable = res.data
    },
    editItem: async function (item) {
      const url = "app/forms/edit/"+item.id
      const res = await this.callApi("get", url, null)
      this.fields = res.data
      this.listTypesForms()
      this.modal = true
    },
    deleteItem: async (item) => {
    },
    close: function () {
      this.modal = false
      this.fields = { name: '', code: '', types_forms_id: ''}
      this.$refs.form.resetValidation()
    },
    save: async function() {
      if(this.$refs.form.validate()){
        const res = await this.callApi('post','app/forms/create', this.fields)
        this.fields = { id: '', name: '', code: '', types_forms_id: ''}
        this.close()
        this.list()
        this.$refs.form.resetValidation()
      }
    },
  },
  computed: {
    formTitle () {
      return this.editing === -1 ? 'Nuevo Formulario' : 'Editar Formulario'
    },
  },
  watch: {
    dialog (val) {
      val || this.close()
    },
  },
  created() {
    this.list()
    this.listTypesForms()
  }
}
</script>