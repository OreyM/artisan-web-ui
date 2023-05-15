export const mutationTypes = {
    createNewTableStart: '[artisan-database-table] createNewTableStart',
    createNewTableSuccess: '[artisan-database-table] createNewTableSuccess',
    createNewTableFailure: '[artisan-database-table] createNewTableFailure',
}

const mutations = {
    [mutationTypes.createNewTableStart](state) {
        state.isHandling = true;
        state.error = null;
    },
    [mutationTypes.createNewTableSuccess](state) {
        state.isHandling = false;
    },
    [mutationTypes.createNewTableFailure](state, payload) {
        state.isHandling = false;
        state.error = {
            code: payload.code,
            error: payload.exception,
            message: payload.message,
        };
    },
}

export default mutations
