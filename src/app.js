/**
 * Created by n0m4dz on 2/6/17.
 */
import "./sass/app.scss"
import "./bootstrap"

const app = new Vue({
    el: '#app',
    data: {
        form: new Form({
            name: '',
            description: ''
        })
    },
    methods: {
        onSubmit(){
            //example laravel API url - API has validation handler
            let url = 'http://example.app/api/project/save'

            //Submit function handles everything by itself
            this.form.submit('post', url)

            //SubmitHook function returns promise
            this.form.submitHook('post', url)
                .then(data => console.log(data))
                .catch(errors => console.log(errors))
        }
    }
})
