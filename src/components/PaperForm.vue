<template>
    <div class="container">
        <form @submit.prevent="onSubmit()" @keydown="form.errors.clear($event.target.name)">
            <div class="form-group">
                <input type="text" name="name" placeholder="Name" v-model="form.name">
                <span class="help-block text-error" v-if="form.errors.has('name')"
                      v-text="form.errors.get('name')"></span>
            </div>
            <div class="form-group">
                <textarea name="description" placeholder="Description" class="form-control"
                          v-model="form.description"></textarea>
                <span class="help-block text-error" v-if="form.errors.has('description')"
                      v-text="form.errors.get('description')"></span>
            </div>
            <hr>
            <button type="submit" class="btn btn-default" :disabled="form.errors.any()">Save</button>
        </form>
    </div>
</template>

<script>
    import Form from '../core/Form'
    export default {
        data: () => {
            return {
                form: new Form({
                    name: '',
                    description: ''
                })
            }
        },

        methods: {
            onSubmit(){
                let url = '/api/project/save'
                this.form.submit('post', url)
                this.form.submitHook('post', url)
                    .then(data => console.log(data))
                    .catch(errors => console.log(errors))
            }
        }
    }
</script>

<style lang="sass">

</style>



