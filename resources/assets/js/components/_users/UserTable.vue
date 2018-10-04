<template>
    <div>
        <div class="row" style="margin-bottom: 20px; float: right;">
            <div class="col-md-12">
                <button-add-user :api-user-create-url="apiUserCreateUrl" @created="getUsers"></button-add-user>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Gebruikers</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Gebruikersnaam</th>
                                <th>Naam</th>
                                <th>Functie</th>
                                <th>Gemaakte Contracten</th>
                                <th>Wijzigen</th>
                            </tr>
                            </thead>
                            <tbody>
                            <trow-user
                                    v-for="user in users"
                                    :key="user.id"
                                    :user="user"
                                    :api-user-save-url="apiUserSaveUrl"></trow-user>
                            </tbody>
                        </table>
                        <loader v-show="this.loading"></loader>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        props: ['api-users-url', 'api-user-save-url', 'api-user-create-url'],
        name: "UsersTable",
        data() {
            return {
                loading: true,
                users: []
            }
        },
        methods: {
            getUsers() {
                axios.get(this.apiUsersUrl)
                    .then((response) => {
                        let m_data = response.data
                        this.users = m_data.data
                        this.loading = false;
                    })
                    .catch(() => this.$swal(
                        'Mislukt',
                        'Er ging iets mis tijdens de aanvraag',
                        'error'
                    ))
            }
        },
        created() {
            this.getUsers()
        }
    }
</script>

<style scoped>

</style>