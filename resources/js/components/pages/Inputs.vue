<template>
   <v-card cols="12">
        <v-toolbar >
            <v-toolbar-title>Available inputs</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn fab dark color="teal" small>
                <v-icon>mdi-plus</v-icon>
            </v-btn>
        </v-toolbar>
        <v-data-table :headers="headersTable" :items="elementsTable">
          <template v-slot:item.actions="{ item }">
            <v-icon color="teal" small class="mr-2" @click="editItem(item)" >
              mdi-pencil
            </v-icon>
            <v-icon color="red" small @click="deleteItem(item)" >
              mdi-delete
            </v-icon>

            <v-btn class="ma-2" small dense outlined fab color="teal">
              <v-icon>mdi-pencil</v-icon>
            </v-btn>
            <v-btn class="ma-2" small dense outlined fab color="red">
              <v-icon>mdi-delete</v-icon>
            </v-btn>
          </template>

          <template v-slot:no-data>
            <v-btn color="primary" @click="list()">reload</v-btn>
          </template>
        </v-data-table>

    </v-card>
</template>

<script>
export default {
    data() {
      return {
        headersTable : [
          { text: "Name", align: "start", value: "name"},
          { text: "Code", value: "code" },
          { text: "status", value: "status" },
          { text: "Usuario", value: "user_mod" },
          { text: 'Actions', value: 'actions', sortable: false },
        ],
        elementsTable: [],
    }
  },
  methods: {

    list: async function() {
      const res = await this.callApi("get", "app/inputs/list", this.data)
      console.log(res.data)
      this.elementsTable = res.data
    },
    editItem (item) {
    },

    deleteItem (item) {
    },

    close () {

    },

  },
  computed: {

  },
  watch: {

  },
  created() {
    this.list()
  }
}
</script>