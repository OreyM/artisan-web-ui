export const mutationTypes = {
    clearCacheStart: '[artisan-clear-cache] clearCacheStart',
    clearCacheSuccess: '[artisan-clear-cache] clearCacheSuccess',
    clearCacheFailure: '[artisan-clear-cache] clearCacheFailure',
}

const mutations = {
    [mutationTypes.clearCacheStart](state) {
        state.isHandling = true;
        state.error = null;
    },
    [mutationTypes.clearCacheSuccess](state) {
        state.isHandling = false;
    },
    [mutationTypes.clearCacheFailure](state, payload) {
        state.isHandling = false;
        state.error = {
            code: payload.code,
            error: payload.exception,
            message: payload.message,
        };
    },
}

export default mutations
