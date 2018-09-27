<template>
    <tr>
        <td>{{ name }}</td>
        <td>{{ email }}</td>
        <td>{{ role }}</td>
        <td><span class="label label-success">{{ countContracts }}</span></td>
        <td><a><i class="fa fa-pencil"></i></a></td>
    </tr>
</template>

<script>
    export default {
        props: [
            'user-id',
            'name',
            'email',
            'role',
            'count-contracts'
        ],
        created() {
            console.log(12);
        }
    }
</script>

<style scoped>

</style>