<template>
    <button class="btn btn-success" @click="createUser"><i class="fa fa-plus"></i> Gebruiker Toevoegen</button>
</template>

<script>
    import axios from 'axios'

    export default{
        props: ['api-user-create-url'],
        name: 'AddUser',
        methods: {
            createUser() {
                this.$swal.mixin({
                    confirmButtonText: 'Next &rarr;',
                    showCancelButton: true,
                    progressSteps: ['1', '2', '3']
                }).queue([
                    {
                        title: 'Volledige naam',
                        text: 'Vul hieronder de volledige naam in van de nieuwe gebruiker',
                        input: 'text'
                    },
                    {
                        title: 'E-mail adres',
                        text: 'Vul hieronder het e-mail adres in van de nieuwe gebruiker',
                        input: 'text'
                    },
                    {
                        title: 'Rol',
                        text: 'Kies hier de rol die deze gebuiker heeft',
                        input: 'select',
                        inputOptions: {
                            '1': 'Praeses',
                            '2': 'Ab Actis',
                            '3': 'Questor',
                            '4': 'Voorzitter',
                            '5': 'Secretaris',
                            '6': 'Penningmeester',
                        },
                        inputPlaceholder: 'Selecteer een rol',
                        inputValidator: (value) => {
                            return new Promise((resolve) => {
                                if (value !== '') {
                                    resolve()
                                } else {
                                    resolve('Selecteer aub een rol...')
                                }
                            })
                        }
                    }
                ]).then((result) => {
                    let user = {
                        name: result.value[0],
                        email: result.value[1],
                        role: result.value[2]
                    }
                    axios.post(this.apiUserCreateUrl, {
                        user: user
                    })
                    .then((response) => {
                        this.$swal(
                            response.data.message.title,
                            response.data.message.body,
                            response.data.message.type
                        )
                        this.$emit('created')
                    })
                    .catch(() => this.$swal(
                        'Mislukt',
                        'Er ging iets mis tijdens de aanvraag',
                        'error'
                    ))
                }).catch(() => true)
            }
        }
    }
</script>

<style scoped>

</style>