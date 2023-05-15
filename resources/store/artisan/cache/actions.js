import { default as api } from '../../../api/artisan';
import { mutationTypes } from './mutations';
import toast from '../../../js/plugins/toast';

export const actionTypes = {
    artisanCacheClear: '[artisan-cache-clear] artisanCacheClear',
}

const actions = {
    [actionTypes.artisanCacheClear](context) {
        context.commit(mutationTypes.clearCacheStart)

        return new Promise(() => {
            api.clearCache()
                .then((response) => {
                    context.commit(mutationTypes.clearCacheSuccess);
                    toast.success(response.data.message)
                })
                .catch((e) => {
                    context.commit(mutationTypes.clearCacheFailure, e.response.data);
                    toast.error(e.response.data.message)
                });
        })
    },
}

export default actions
