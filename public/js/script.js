$(function () {
  $('#menu-trigger').on('click', function () {
    $(this).toggleClass('active');
    $('#g-navi').toggleClass('active');
  });
});

$(function () {
  $('.js_modal_open').on('click', function () {
    $('.js_modal').fadeIn();

    var post = $(this).attr('post');
    var post_id = $(this).attr('post_id');

    $('.modal_post').val(post);
    $('.modal_id').val(post_id);

    return false;
  });

  $('.js_modal_close').on('click', function () {
    $('.js_modal').fadeOut();
    return false;
  });
});
