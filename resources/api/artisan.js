const clearCache = () => axios.get('/artisan/clear-cache');

const newTable = (credential) => axios.post('/artisan/table/create', {table_name: credential});

export default {
    clearCache,
    newTable,
}
