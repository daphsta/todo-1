$(function() {

    $('.btn-danger').click(function() {
        that = $(this);
        $.ajax({
            url: delUrl + $(this).data('id') + '?ajax=1',
            type: 'post',
            data: {id: $(this).data('id')},
            success: function(data) {
                that.closest('.well').slideUp();
            }
        });

        return false;
    });

    $('.btn-success').click(function() {
        that = $(this);
        $.ajax({
            url: doneUrl,
            type: 'post',
            data: {id: $(this).data('id')},
            success: function(data) {
                that.closest('.well').find('.todoText').addClass('done');
                that.closest('.well').find('.btn-inverse').css('display', '');
                that.hide();
            }
        });

        return false;
    });

    $('.btn-inverse').click(function() {
        that = $(this);
        $.ajax({
            url: undoUrl,
            type: 'post',
            data: {id: $(this).data('id')},
            success: function(data) {
                that.closest('.well').find('.todoText').removeClass('done');
                that.closest('.well').find('.btn-success').css('display', '');
                that.hide();
            }
        });

        return false;
    });

});
