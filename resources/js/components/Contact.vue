<template>
    <form action="#" class="php-email-form" role="form" @submit.prevent="sendContact">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="name">Seu nome</label>
                <input id="name" v-model="formData.name" class="form-control" data-msg="Please enter at least 4 chars" data-rule="minlen:4"
                       name="name" type="text"/>
                <div class="validate"></div>
            </div>
            <div class="form-group col-md-6">
                <label for="name">Seu e-mail</label>
                <input id="email" v-model="formData.email" class="form-control" data-msg="Please enter a valid email" data-rule="email"
                       name="email" type="email"/>
                <div class="validate"></div>
            </div>
        </div>
        <div class="form-group">
            <label for="name">Assunto</label>
            <input id="subject" v-model="formData.subject" class="form-control" data-msg="Please enter at least 8 chars of subject" data-rule="minlen:4"
                   name="subject" type="text"/>
            <div class="validate"></div>
        </div>
        <div class="form-group">
            <label for="name">Mensagem</label>
            <textarea v-model="formData.message" class="form-control" data-msg="Please write something for us" data-rule="required" name="message"
                      rows="10"></textarea>
            <div class="validate"></div>
        </div>
        <div class="mb-3">
            <div v-if="preloader" class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
        </div>
        <div class="text-center">
            <button type="submit">Enviar</button>
        </div>
    </form>
</template>

<script>
export default {
    data() {
        return {
            preloader: false,
            formData: {
                name: '',
                email: '',
                subject: '',
                message: '',
            }
        }
    },

    methods: {
        sendContact () {
            this.preloader = true

            axios.post('/api/contact', this.formData, {
                'Accept': 'application/json',
            })
                .then(response => {
                    alert('OK')
                })
                .catch(error => console.log(error))
                .finally(() => {
                    this.preloader = false
                    this.reset()
                });
        },
        reset () {
            this.formData = {
                name: '',
                email: '',
                subject: '',
                message: '',
            }
        }
    }
}
</script>
