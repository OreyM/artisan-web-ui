<template>
    <div class="d-flex flex-row flex-wrap">
        <div class="col-auto me-4">
            <strong>New table</strong>
        </div>
        <div class="col-6 me-4">
            <label for="form-table-name" class="visually-hidden">Table name</label>
            <input
                type="text"
                class="form-control"
                id="form-table-name"
                placeholder="Table name"
                v-model="tableName"
                name="table_name"
                :disabled="isHandling"
            >
        </div>
        <div class="col-auto">
            <button
                @click="handle"
                class="btn btn-primary mb-3"
                :disabled="isHandling"
            >
                <b-spinner v-if="isHandling" small></b-spinner>
                Create new table
            </button>
        </div>
    </div>
</template>

<script>
import { mapState } from 'vuex'
import {actionTypes as artisanAction} from '../store/artisan/database/actions'

export default {
    name: 'CreateNewTableComponent',

    data() {
        return {
            tableName: '',
        };
    },

    computed: {
        ...mapState({
            isHandling: (state) => state.database.isHandling,
        }),
    },

    methods: {
        handle() {
            this.$store.dispatch(artisanAction.artisanDatabaseCreateNewTable, this.tableName)
        },
    }
}
</script>

<style scoped>

</style>
