var siteUrl=$('meta[name=base-url]').attr("content");
$(document).ready(function()
{
	var siteUrl=$('meta[name=base-url]').attr("content");
	  $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

	//autocomplete search city
	$('input#loc_search').autocomplete({
		serviceUrl: siteUrl + '/getcity',
		type: 'post',
		data:{'city':$(this).val()},
		minChars: 1,
		onSelect: function(suggestion) {
		    $('#l_search').val(suggestion.data);
		}
	});

});






