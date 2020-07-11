<template>
    <div>
		<v-dialog v-model="dialog" persistent max-width="600" transition="scale-transition" >
			<template v-slot:activator="{ on }">
                <v-icon  v-on="on">mdi-pencil</v-icon>
			</template>
			<v-card>
				<v-card-title class="headline">Editar {{form.name}}</v-card-title>
				<v-divider></v-divider>
				<v-card-text>
					<v-form ref="form" v-model="valid" lazy-validation>
						<v-row>
						<v-col cols="12" sm="6" md="9">
							<v-text-field class="mt-1" v-model="editName" :counter="100" :rules="nameRules" label="Nombre" required ></v-text-field>
              			</v-col>
              			<v-col cols="12" sm="6" md="3">
    						<v-text-field class="mt-1" v-model="editCode" label="Codigo" :rules="codeRules" required ></v-text-field>
              			</v-col>
						<v-col cols="12" sm="12" md="12">
    						<v-select class="mt-1" v-model="editType" :items="typesForms" item-text="name" item-value="id" :rules="typeRules" label="Tipo Formulario" required dense solo></v-select>
						</v-col>
						<v-divider></v-divider>
						<v-col class="text-right mt-4" cols="12" sm="12" md="12">
							<v-btn @click="close()" color="red" dark small fab>
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
	data() {
		return {
			dialog: false,
			valid:true,
			configSnack: {
                color: '',
                message: '',
                display: '',
            },
            typesForms:[],
            editName: this.form.name,
            editCode: this.form.code,
            editType: this.form.types_forms_id,
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
                    id: this.form.id,
                    name: this.editName,
                    code: this.editCode,
                    types_forms_id: this.editType,
                }
				const rest = await this.callApi('put','app/forms/update', data)
				if(rest.status === 200){
					this.configSnack.color = "green"
                	this.configSnack.message = `Editado con exito el registro ${this.form.name}`
				}
				else{
					this.configSnack.color = "red"
                	this.configSnack.message = `Error al editar el registro ${this.editName}`
				}
				this.dialog = false
				this.$refs.snackbar.open(this.configSnack);
				this.$emit('list')
			}
		},
		close: function(){
            this.editName = this.form.name
            this.editCode = this.form.code
            this.editType = this.form.types_forms_id
			this.dialog = false
		},
	},
	created(){
		this.listType()
	}
};
</script>