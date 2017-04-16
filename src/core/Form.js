import Errors from './Errors'

class Form {

    constructor(data) {
        this.originalData = data
        this.errors       = new Errors()

        for (let field in data) {
            this[field] = data[field]
        }

    }

    reset() {
        for (let field in this.originalData) {
            this[field] = ''
        }
        this.errors.clear()
    }

    data() {
        let data = {}
        for (let property in this.originalData) {
            data[property] = this[property]
        }
        return data
    }

    //return promise then you can hook and continue next steps by yourself
    submitHook(requestType, url) {
        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data())
                .then(response => {
                    this.reset()
                    resolve(response.data)
                })
                .catch(error => {
                    this.errors.record(error.response.data)
                    reject(error.response.data)
                })
        })
    }

    //handles response by itself - not finished yet
    submit(requestType, url) {
        axios[requestType](url, this.data())
            .then(response => {
                this.onSuccess(response.data)
            })
            .catch(error => {
                this.onError(error.response.data)
            })
    }

    onSuccess(data) {
        this.reset()
    }

    onError(data) {
        this.errors.record(data)
    }
}

export default Form
