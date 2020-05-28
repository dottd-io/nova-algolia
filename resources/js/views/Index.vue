<template>
    <div>
        <heading class="mb-6">Algolia Dashboard</heading>

        <daily-search-operations></daily-search-operations>

        <top-indicies></top-indicies>
    </div>
</template>

<script>
    import DailySearchOperations from '../components/DailySearchOperations.vue';
    import TopIndicies from '../components/TopIndicies.vue'

    export default {
        components: {
            'daily-search-operations': DailySearchOperations,
            'top-indicies': TopIndicies
        }
    }
</script>

<style>
    /* Scoped Styles */
</style>
