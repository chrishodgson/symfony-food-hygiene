
$(function()
{
    $('#local_authority_search_form').submit(function(){
        $('#appbundle_local_authority_search_submit', this)
            .html("Please Wait...")
            .attr('disabled', 'disabled');
        return true;
    });
});