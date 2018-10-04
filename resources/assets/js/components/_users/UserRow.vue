<template>
    <tr>
        <td><span v-show="!editing">{{ user.email }}</span> <input class="form-control" type="text" id="email" v-model="user.email" v-show="editing"></td>
        <td><span v-show="!editing">{{ user.name }}</span> <input class="form-control" type="text" id="name" v-model="user.name" v-show="editing"></td>
        <td>{{ user.role }}</td>
        <td><span class="label label-success">{{ user.contracts.length }}</span></td>
        <td>
            <button class="btn btn-sm btn-warning" v-show="!editing" @click="edit"><i class="fa fa-pencil"></i></button>
            <button class="btn btn-sm btn-success" v-show="editing" @click="save"><i class="fa fa-save"></i></button>
        </td>
    </tr>
</template>

<script>
    import axios from 'axios'

    export default {
        props: [
            'user',
            'api-user-save-url'
        ],
        data() {
            return {
                editing: false
            }
        },
        methods: {
            edit() {
                this.editing = true
            },
            save() {
                this.editing = false
                axios.post(this.apiUserSaveUrl, {
                    user: this.user
                })
                .then((response) => {
                    if (response.status === 203) this.editing = true
                    this.$swal(
                        response.data.message.title,
                        response.data.message.body,
                        response.data.message.type
                    )
                })
                .catch(() => this.$swal(
                    'Mislukt',
                    'Er ging iets mis tijdens de aanvraag',
                    'error'
                ))
            }
        }
    }
</script>

<style scoped>

</style>