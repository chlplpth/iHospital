$(document).ready(function(){
    $('#searchbox').selectize({
        valueField: 'url',
        labelField: 'name',
        searchField: ['name', 'surname'],
        maxOptions: 5,
        options: [],
        create: false,
        render: {
            option: function(item, escape) {
                return '<div>' + escape(item.name + " " + item.surname) +'</div>';
            }
        },
        
        load: function(query, callback) {
            if (!query.length) return callback();
            $.ajax({
                url: root+searchAddress,
                type: 'GET',
                dataType: 'json',
                data: {
                    q: query
                },
                error: function() {
                    callback();
                },
                success: function(res) {
                    callback(res.data);
                }
            });
        },
        onChange: function(){
            window.location = this.items[0];
        }
    });
});