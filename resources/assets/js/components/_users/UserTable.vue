<template>
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
        </table>
    </div>
</template>

<script>
    export default {
        name: "UserTable",
        created() {
            /*`TODO: on create show loader */
            /*`TODO: api call to get all users in system  */
            /*`TODO: loop trough users with (for) and <user-row>  */
        }
    }
</script>

<style scoped>

</style>