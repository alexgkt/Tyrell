/**
 * Theming object to format output
 * @type {{cards: theme.cards, card: theme.card}}
 */
let theme = {
    /**
     * Format a player's hand
     * @param data
     * @param selector
     */
    cards: function(data) {
        let output = '<ol>';
        // Iterate a player's hand
        data.forEach(function(row) {
            //console.log(row);
            output += '<li>';
            // Iterate a hand's card
            let hand = [];
            row.forEach(function (item) {
                hand.push(theme.card(item));
            })
            output += hand.join(' ,  ') + "</li>";
        })
        output += '</ol>'
        // populate to dom
        $('#cards').html(output);
    },
    /**
     * Format a single card within a hand
     * @param data
     * @returns {string}
     */
    card: function(data) {
        if (data !== null) {
            // Split returned value to card and suite
            let text = data.split('-');
            console.log(text[0]);
            let output = '';
            // Replace suite letter with relevant unicode
            switch(text[0]) {
                case 'S':
                    output += '<span style="color:black"><small>' + text[1] + '</small> &spadesuit;</span>';
                    break;
                case 'H':
                    output += '<span style="color:red"><small>' + text[1] + '</small> &heartsuit;</span>';
                    break;
                case 'C':
                    output += '<span style="color:black"><small>' + text[1] + '</small> &clubsuit;</span>';
                    break;
                case 'D':
                    output += '<span style="color:red"><small>' + text[1] + '</small> &diamondsuit;</span>';
                    break;
                default:
                    output += '<small>' + text[0] + '</small>';
            }
            return '<span>' + output + '</span>';
        }
    },
    /**
     * Display error message
     * @param error
     */
    error: function(error) {
        let html = '<div class="alert alert-danger" role="alert"><span>'+error+'</span><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        $('.jumbotron').prepend(html);
    }
}