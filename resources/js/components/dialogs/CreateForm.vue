<template>
	<v-row justify="center">
		<v-dialog v-model="dialog" persistent max-width="600" transition="scale-transition" >
			<template v-slot:activator="{ on }">
				<v-btn class="mx-2" fab color="success" v-on="on">
					<v-icon dark>mdi-plus</v-icon>
				</v-btn>
			</template>
			<v-card>
				<v-card-title class="headline">Nuevo formulario</v-card-title>
				<v-divider></v-divider>
				<v-card-text>
					<v-form ref="form" v-model="valid" lazy-validation>
						<v-row>
						<v-col cols="12" sm="6" md="9">
							<v-text-field class="mt-1" v-model="name" :counter="100" :rules="nameRules" label="Nombre" required ></v-text-field>
              			</v-col>
              			<v-col cols="12" sm="6" md="3">
    						<v-text-field class="mt-1" v-model="code" label="Codigo" :rules="codeRules" required ></v-text-field>
              			</v-col>
						<v-col cols="12" sm="12" md="12">
    						<v-select class="mt-1" v-model="types_forms_id" :items="typesForms" item-text="name" item-value="id" :rules="typeRules" label="Tipo Formulario" required dense solo></v-select>
						</v-col>
						<v-divider></v-divider>
						<v-col class="text-right mt-4" cols="12" sm="12" md="12">
							<v-btn @click="clear()" color="red" dark small fab>
								<v-icon>mdi-close</v-icon>
							</v-btn>
							<v-btn @click="save()" color="green" dark small fab>
								<v-icon>mdi-check</v-icon>
							</v-btn>
						</v-col>
						</v-row>
					</v-form>
				</v-card-text>
			</v-card>
		</v-dialog>
		<snackbar ref="snackbar"></snackbar>
	</v-row>
</template>
<script>
import snackbar from '../dialogs/Snackbar'
export default {
	components:{
		snackbar
	},
	data() {
		return {
			dialog: false,
			valid:true,
			idForm: '',
			name: '',
			code: '',
			types_forms_id: '',
			typesForms:[],
			configSnack: {
                color: '',
                message: '',
                display: '',
            },
			nameRules    : [
				v          => !!v || 'El nombre es requerido',
				v          => (v && v.length >= 5) || 'El nombre debe tener +5 caracteres'
			],
			codeRules    : [
				v          => !!v || 'Codigo es requerido',
				v          => (v && v.length >= 2) || 'Codigo debe ser menos a 5 caracteres'
			],
			typeRules    : [
				v          => !!v || 'Seleccionar un tipo es requerido',
			],
		}
	},
	methods:{
		listType: async function(){
			const res = await this.callApi('get', 'app/types/forms/list', null)
			this.typesForms = res.data
		},
		save: async function(){
			if(this.$refs.form.validate()){
				const data = {
					name : this.name,
					code :this.code,
					types_forms_id :this.types_forms_id,
				}
				const rest = await this.callApi('post','app/forms/create', data)
				if(rest.status === 200){
					this.configSnack.color = "green"
                	this.configSnack.message = `Creado con exito`
				}
				else{
					this.configSnack.color = "red"
                	this.configSnack.message = `Error al crear el elemento`
				}
				this.dialog = false
				this.clearInputs()
				this.$refs.snackbar.open(this.configSnack);
				this.$emit('list')
			}

		},
		clearInputs: function(){
			this.$refs.form.reset()
			this.name = ''
			this.code = ''
			this.types_forms_id = ''
		},
		clear: function(){
			this.$refs.form.resetValidation()
			this.dialog = false
		},
	},
	created(){
		this.listType()
	}
};
</script>