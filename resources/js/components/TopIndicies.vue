<template>
    <loading-view :loading="initialLoading">
        <loading-card :loading="loading" class="card relative">
            <table
                    v-if="indicies.length > 0"
                    class="table w-full"
                    cellpadding="0"
                    cellspacing="0"
                    data-testid="resource-table"
            >
                <thead>
                <tr>
                    <th class="text-left">
                      <span class="inline-flex items-center">
                         Name
                      </span>
                    </th>
                    <th class="text-left">
                      <span class="inline-flex items-center">
                         Queries
                      </span>
                    </th>
                    <th class="text-left">
                      <span class="inline-flex items-center">
                         Records
                      </span>
                    </th>
                </tr>
                </thead>

                <tbody v-for="index in indicies">
                <tr>
                    <td>{{ index.name }}</td>
                    <td>{{ index.queries }}</td>
                    <td>{{ index.entries }}</td>
                </tr>
                </tbody>
            </table>
        </loading-card>
    </loading-view>
</template>

<script>

export default {
    data() {
        return {
            indicies: {},
            initialLoading: true,
            loading: false,
        }
    },

    methods: {
        moment: moment,

        listIndicies(params) {
            Nova.request().get('/nova-vendor/nova-algolia/algolia/indicies', { params })
                .then((response) => {
                    this.indicies = response.data.indicies
                    this.initialLoading = false
                    this.loading = false
                })
        },
    },
    created() {
        this.listIndicies()
    },
}
</script>

<style>
    /* Scoped Styles */
</style>
