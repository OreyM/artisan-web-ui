import { default as api } from '../../../api/artisan';
import { mutationTypes } from './mutations';
import toast from '../../../js/plugins/toast';

export const actionTypes = {
    artisanDatabaseCreateNewTable: '[artisan-database-cache-clear] artisanDatabaseCreateNewTable',
}

const actions = {
    [actionTypes.artisanDatabaseCreateNewTable](context, credential) {
        context.commit(mutationTypes.createNewTableStart)

        return new Promise(() => {
            api.newTable(credential)
                .then((response) => {
                    context.commit(mutationTypes.createNewTableSuccess);
                    toast.success(response.data.message)
                })
                .catch((e) => {
                    context.commit(mutationTypes.createNewTableFailure, e.response.data);
                    toast.error(e.response.data.message)
                });
        })
    },
}

export default actions
