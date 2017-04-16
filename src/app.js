/**
 * Created by n0m4dz on 2/6/17.
 */
import "./sass/app.scss"
import "./bootstrap"

import PaperForm from "./components/PaperForm.vue"

Vue.component('paper-form', PaperForm);


const app = new Vue({
    el: '#paper',
    data: {
        forums: []
    }
})
