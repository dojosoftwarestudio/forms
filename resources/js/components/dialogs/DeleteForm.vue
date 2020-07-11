<template>
    <div>
	<v-dialog v-model="dialog" width="400">
		<template v-slot:activator="{ on }">
            <v-icon  v-on="on">mdi-close-circle</v-icon>
		</template>
		<v-card>
			<v-card-title class="headline grey lighten-2" primary-title>BORRAR FORM</v-card-title>
			<v-card-subtitle></v-card-subtitle>
            <v-card-text>{{form.name}}</v-card-text>
			<v-divider></v-divider>
			<v-card-actions>
				<v-spacer></v-spacer>
                <v-btn @click="close()" color="red" dark small fab>
                    <v-icon>mdi-close</v-icon>
                </v-btn>
                <v-btn @click="deleteForm()" color="green" dark small fab>
                    <v-icon>mdi-check</v-icon>
                </v-btn>
			</v-card-actions>
		</v-card>

	</v-dialog>
        <snackbar ref="snackbar"></snackbar>
    </div>
</template>
<script>
import snackbar from '../dialogs/Snackbar'
export default {
    props:{
        form: null
    },
    components:{
        snackbar
    },
    data(){
        return {
            color: '',
            dialog: false,
            message: '',
            configSnack: {
                color: '',
                message: '',
                display: '',
            },
        }
    },
    methods:{
        close: function(){
            this.dialog = false
        },
        deleteForm: async function(){
            const data = {
                id: this.form.id
            }
            const rest = await this.callApi('delete', 'app/forms/delete', data)
            if(rest.status === 200){
                this.message = "Eliminado con exito"
                this.configSnack.color="green"
                this.configSnack.message= `Eliminado con exito el registro ${this.form.name}`
            }
            else{
                this.message = "Error"
                this.configSnack.color="red"
                this.configSnack.message="Error"
            }
            this.dialog = false
            this.$refs.snackbar.open(this.configSnack);
            this.$emit('list')
        }
    }
};
</script>