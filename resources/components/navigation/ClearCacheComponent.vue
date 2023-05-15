<template>
    <div>
        <button
            type="button"
            class="btn btn-warning"
            @click="handle"
            :disabled="isHandling"
        >
            <b-spinner v-if="isHandling" small></b-spinner>
            Clear Cache
        </button>
    </div>
</template>

<script>
import { mapState } from 'vuex'
import {actionTypes as artisanAction} from '../../store/artisan/cache/actions'

export default {
    name: 'ClearCacheComponent',

    computed: {
        ...mapState({
            isHandling: (state) => state.cache.isHandling,
        }),
    },

    methods: {
        handle() {
            this.$store.dispatch(artisanAction.artisanCacheClear);
        }
    },
}
</script>

<style scoped>

</style>
