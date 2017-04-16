<template>
    <div class="container">
        <form @submit.prevent="onSubmit()" @keydown="form.errors.clear($event.target.name)">
            <div v-for="s in schema">
                <div v-if="s.type == 'text'">
                    <input type="text" :name="s.model" :placeholder="s.placeholder" v-model="form[s.model]">
                </div>
                <div v-if="s.type == 'checkbox'">
                    <input type="checkbox" :name="s.model" :placeholder="s.placeholder" v-model="form[s.model]">
                </div>
                <span v-if="form.errors.has('title')"
                      v-text="form.errors.get('title')">
                </span>
            </div>
            <hr>
            <button type="submit" class="btn btn-default" :disabled="form.errors.any()">Save</button>
        </form>
    </div>
</template>

<script>
    import Form from '../core/Form'
    export default {
        data: function () {
            return {
                schema: formConfig.schema,
                form: new Form({
                    title: '',
                    is_active: ''
                })
            }
        },

        created: () => {
            console.log(this.config);
        },

        methods: {
            onSubmit(){
                let url = '/paper/create'
                this.form.submit('post', url)
                this.form.submitHook('post', url)
                    .then(data => console.log(data))
                    .catch(errors => console.log(errors))
            }
        }
    }
</script>


