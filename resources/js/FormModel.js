export default class FormModel {
    constructor(){
        this.id = ''
        this.name = ''
        this.code = ''
        this.types_forms_id = ''
        this.status = ''
        this.reg_del = ''
        this.user_mod = ''
    }
    edit(data) {
        this.id = data.id
        this.name = data.name
        this.code = data.code
        this.types_forms_id = data.types_forms_id
        this.status = data.status
        this.reg_del = data.reg_del
        this.user_mod = data.user_mod
    }
    save(name, code, type_id){
        this.name = name
        this.code = code
        this.types_forms_id = type_id
    }

}