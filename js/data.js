/**
 * Data layer calling from the API
 * @type {{getCards: data.getCards}}
 */
let data = {
    /**
     * Get cards
     * @param pax
     * @param callback
     * @param selector
     */
    getCards: function(pax, successCallback, failureCallback) {
        axios.get('/api.php?pax_num=' + pax)
            .then(function (response) {
                // handle success
                let data = response.data;
                successCallback(data.data);
            })
            .catch(function (error) {
                // handle error
                let data = error.response.data;
                failureCallback(data.error);
            })
    }
}